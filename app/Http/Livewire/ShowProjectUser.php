<?php

namespace App\Http\Livewire;

use App\Models\Register;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProjectUser extends Component
{
    use WithPagination;

    public $infoCard;

    public function detalhes($id)
    {
        $this->infoCard = Register::find($id);
    }

    public function render()
    {
        $register = auth()->user()->register()->orderBy('created_at', 'DESC')->paginate(2);
        return view('livewire.show-project-user')->with(compact('register'));
    }
}
