<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class ShowProjectUser extends Component
{
    use WithPagination, Actions;

    public $infoProjet;

    public function detalhes($id)
    {
        $this->infoProjet = Project::where('user_request_id', $id)->get();
    }

    public function export($path)
    {
        return Storage::disk('public')->download($path);
    }

    public function showObs($obs)
    {
        $this->dialog()->show([
            'title'       => 'Observação',
            'description' => $obs,
            'icon'        => 'info'
        ]);
    }


    public function render()
    {
        $register = auth()->user()->register()->orderBy('created_at', 'DESC')->paginate(2);
        $pendencia = auth()->user()->pendencia;
        return view('livewire.show-project-user')->with(compact('register', 'pendencia'));
    }
}
