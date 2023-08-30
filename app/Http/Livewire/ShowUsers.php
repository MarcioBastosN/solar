<?php

namespace App\Http\Livewire;

use App\Models\DesabilitaRegistro;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class ShowUsers extends Component
{
    use Actions, WithPagination;

    public $search;

    protected $queryString = ['search'];

    public function paginaDetalhes($id)
    {
        return redirect()->route('admin.cliente.project', $id);
    }

    public function desativar($id)
    {
        DB::beginTransaction();
        try {
            DB::transaction(fn () => DesabilitaRegistro::create(['user_id' => $id]));
        } catch (Exception $e) {
            DB::rollBack();
        }
        DB::commit();
        $this->notification()->success(
            $title = 'Desabilitado',
            $description = 'Acesso do usuario suspenso com sucesso'
        );
        $this->render();
    }

    public function ativar($id)
    {
        DB::beginTransaction();
        try {
            DB::transaction(fn () => DesabilitaRegistro::where(['user_id' => $id])->delete());
        } catch (Exception $e) {
            DB::rollBack();
            $this->notification()->error(
                $title = 'Ops!, algo deu errado',
                $description = $e->getMessage(),
            );
        }
        DB::commit();
        $this->notification()->success(
            $title = 'Reativado',
            $description = 'Acesso reabilitado com sucesso'
        );
        $this->render();
    }

    public function render()
    {
        $users = User::with('roles')->where(function ($query) {
            $query->where('email', 'ilike', '%' . $this->search . '%')
                ->orWhere('name', 'ilike', '%' . $this->search . '%');
        })->orderBy('created_at', "DESC")->paginate(5);
        return view('livewire.show-users')->with(compact('users'));
    }
}
