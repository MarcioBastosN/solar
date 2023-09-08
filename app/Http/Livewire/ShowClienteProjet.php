<?php

namespace App\Http\Livewire;

use App\Mail\EmailController;
use App\Models\DadosProject;
use App\Models\Project;
use App\Models\User;
use App\Models\ValidaDocumento;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use WireUi\Traits\Actions;

class ShowClienteProjet extends Component
{
    use Actions;
    public $user_id;

    public function mount($user_id)
    {
        $this->user_id = $user_id;
    }

    public function export($path)
    {
        return Storage::disk('public')->download($path);
    }

    public function InicioProjeto($id_projeto, $registro_id)
    {
        DB::beginTransaction();
        try {
            DB::transaction(fn () => DadosProject::create([
                'projects_id' => $id_projeto,
                'status_project_id' => 1
            ]));
        } catch (Exception $e) {
            DB::rollBack();
            $this->notification()->error(
                $title = "Error",
                $description = $e->getMessage()
            );
        }
        DB::commit();

        $user_email = User::find($this->user_id)->email;
        try {
            Mail::to($user_email, "Solar-Project")->send(new EmailController([
                'fromName' => auth()->user()->name,
                'fromEmail' => auth()->user()->email,
                'subject' => "Projeto iniciado",
                'message' => "Novas etapas em processo",
            ]));
        } catch (Exception $e) {
            $this->notification()->error(
                $title = "Error",
                $description = "Não foi possivel enviar o E-mail"
            );
        }

        $this->viewProjeto($registro_id);
    }

    public function viewProjeto($registro_id)
    {
        return redirect()->route('admin.start.project', $registro_id);
    }

    public function validar($documento, $registro)
    {
        $this->dialog()->confirm([
            'title'       => 'Altera status do Documento',
            'description' => 'aprove ou rejeite o Documento',
            'icon'        => 'info',
            'accept'      => [
                'label'  => 'Aprovar arquivo',
                'method' => 'valide',
                'params' => [$documento, $registro, 3],
            ],
            'reject' => [
                'label'  => 'Rejeitar arquivo',
                'method' => 'valide',
                'params' => [$documento, $registro, 2],
            ],
        ]);
    }

    public function validarTodos($registro)
    {
        DB::beginTransaction();
        try {
            DB::transaction(fn () => ValidaDocumento::where('register_id', $registro)->update(['status_id' => 3]));
        } catch (Exception $e) {
            DB::rollBack();
        }
        DB::commit();
        $this->render();
    }

    public function valide($documento, $registro, $status)
    {
        DB::beginTransaction();
        try {
            DB::transaction(fn () => ValidaDocumento::where('register_id', $registro)->where('documento', 'ilike', "%" . $documento . "%")->update(['status_id' => $status]));
        } catch (Exception $e) {
            DB::rollBack();
        }
        DB::commit();
        $this->render();
    }

    public function showObs($obs)
    {
        $this->dialog()->show([
            'title'       => 'Observação',
            'description' => $obs,
            'icon'        => 'info'
        ]);
    }

    public function trabalhar($projeto_id)
    {
        DB::beginTransaction();
        try {
            DB::transaction(fn () => Project::create([
                'manager_id' => auth()->user()->id,
                'user_request_id' => $projeto_id,
            ]));
        } catch (Exception $e) {
            DB::rollBack();
        }
        DB::commit();
        $this->notification()->success(
            $title = 'Registro realizado',
            $description = 'Você e o responsavel deste projeto'
        );

        $user_email = User::find($this->user_id)->email;
        try {
            Mail::to($user_email, "Solar-Project")->send(new EmailController([
                'fromName' => auth()->user()->name,
                'fromEmail' => auth()->user()->email,
                'subject' => "Seu projeto foi visualizado e esta sendo iniciado.",
                'message' => auth()->user()->name . ", deu inicio ao seu projeto",
            ]));
        } catch (Exception $e) {
            $this->notification()->error(
                $title = "Error",
                $description = "Não foi possivel enviar o E-mail"
            );
        }

        $this->render();
    }

    public function render()
    {
        $registros = User::find($this->user_id)->register()->with('statusRequest.status', 'possuiProjeto')->get();
        return view('livewire.show-cliente-projet')->with(compact('registros'));
    }
}
