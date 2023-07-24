<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\Register;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProjectUser extends Component
{
    use WithPagination;

    public $infoProjet;

    public function detalhes($id)
    {
        $this->infoProjet = Project::where('user_request_id', $id)->get();
    }

    public function render()
    {
        $register = auth()->user()->register()->orderBy('created_at', 'DESC')->paginate(2);
        $pendencia = auth()->user()->pendencia;
        return view('livewire.show-project-user')->with(compact('register', 'pendencia'));
    }
}
