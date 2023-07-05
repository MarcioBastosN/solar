<?php

namespace App\Http\Livewire;

use App\Models\Dijuntor;
use Livewire\Component;
use Livewire\WithFileUploads;

class HomeUser extends Component
{

    use WithFileUploads;
    // arquivos
    public $photo, $identidade, $cnpj, $procuracao;
    //
    public $kwp, $fotovoltaico, $inversor, $datasheet;
    //
    public $dijuntores;

    protected $rules = [
        'photo' => 'image|max:1024',
    ];

    protected $messages = [
        'photo.max' => 'Arquivo e maior que 1 mb',
        'photo.image' => 'Arquivo dev ser uma imagem'
    ];

    public function save()
    {
        $this->validate();
    }


    public function mount()
    {
        $this->dijuntores = Dijuntor::all();
    }

    public function render()
    {
        return view('livewire.home-user');
    }
}
