<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ShowUsers extends Component
{

    public $search;

    protected $queryString = ['search'];

    public function paginaDetalhes($id)
    {
        return redirect()->route('admin.cliente.project', ['cliente' => $id]);
    }

    public function render()
    {
        $users = User::with('roles')->where('email', 'ilike', '%' . $this->search . '%')->get();
        return view('livewire.show-users')->with(compact('users'));
    }
}
