<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Welcome extends Component
{

    public $name, $email;

    public function redirectCadastro()
    {
        return redirect()->route('register', ['name' => $this->name, 'email' => $this->email]);
    }

    public function render()
    {
        return view('livewire.welcome')
            ->layout('layouts.welcomepage');
    }
}
