<?php

namespace App\Http\Livewire;

use App\Models\Dijuntor;
use Livewire\Component;
use Livewire\WithFileUploads;

class HomeUser extends Component
{

    use WithFileUploads;
    // arquivos
    public $photo, $identidade, $cnpj, $procuracao, $telefone;
    //
    public $kwp, $fotovoltaico, $inversor, $datasheet;
    //
    public $dijuntores;

    protected $rules = [
        'photo' => 'required|image|max:1024',
        'telefone' => "required|min:10"
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
