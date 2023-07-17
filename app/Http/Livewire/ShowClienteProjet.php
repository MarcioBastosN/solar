<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Livewire\Component;

class ShowClienteProjet extends Component
{
    public $projetos;

    public function mount(HttpRequest $request)
    {
        $this->projetos = User::find($request->cliente)->register()->get();
    }

    public function render()
    {
        return view('livewire.show-cliente-projet');
    }
}
