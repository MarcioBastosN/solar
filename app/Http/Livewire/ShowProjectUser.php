<?php

namespace App\Http\Livewire;

use App\Models\Register;
use Livewire\Component;

class ShowProjectUser extends Component
{

    public $infoCard, $register;

    public function detalhes($id)
    {
        $this->infoCard = Register::find($id);
    }

    public function mount()
    {
        $this->register = auth()->user()->register()->get();
    }

    public function render()
    {
        return view('livewire.show-project-user');
    }
}
