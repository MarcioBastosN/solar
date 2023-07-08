<?php

namespace App\Http\Livewire;

use App\Models\Dijuntor;
use Livewire\Component;

class ShowDijuntor extends Component
{

    public $dijuntores;

    public function mount()
    {
        $this->dijuntores = Dijuntor::all();
        // session()->flash('message', 'Post successfully updated.');
    }

    public function render()
    {
        return view('livewire.show-dijuntor');
    }
}
