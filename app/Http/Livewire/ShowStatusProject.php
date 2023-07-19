<?php

namespace App\Http\Livewire;

use App\Models\StatusDocumentos;
use App\Models\StatusProjet;
use Livewire\Component;

class ShowStatusProject extends Component
{
    public function render()
    {
        $statusProject = StatusProjet::all();
        $statusDocumentos = StatusDocumentos::all();
        return view('livewire.show-status-project')->with(compact('statusProject', 'statusDocumentos'));
    }
}
