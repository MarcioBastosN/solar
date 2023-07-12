<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowProjectUser extends Component
{
    public function render()
    {
        $register = auth()->user()->register()->get();
        return view('livewire.show-project-user')->with(compact('register'));
    }
}
