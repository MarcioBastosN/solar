<?php

namespace App\Http\Livewire;

use App\Models\DesabilitaRegistro;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\Actions;

class ShowUsers extends Component
{
    use Actions;

    public $search;

    protected $queryString = ['search'];

    public $users;

    public function paginaDetalhes($id)
    {
        // ['cliente' => $id]
        return redirect()->route('admin.cliente.project', $id);
    }

    public function mount()
    {
        $this->users = User::with('roles')->where('email', 'ilike', '%' . $this->search . '%')->get();
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
        $this->mount();
        $this->render();
    }

    public function ativar($id)
    {
        DB::beginTransaction();
        try {
            DB::transaction(fn () => DesabilitaRegistro::where(['user_id' => $id])->delete());
        } catch (Exception $e) {
            DB::rollBack();
        }
        DB::commit();
        $this->notification()->success(
            $title = 'Reativado',
            $description = 'Acesso reabilitado com sucesso'
        );
        $this->mount();
        $this->render();
    }

    public function render()
    {
        return view('livewire.show-users');
    }
}
