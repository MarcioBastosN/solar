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
    // nao obrigatorios
    public $kwp, $fotovoltaico, $inversor, $datasheet;
    //
    public $dijuntores;

    protected $rules = [
        'photo' => 'required|max:1024|file',
        'telefone' => "required|min:10",
    ];

    protected $messages = [
        'photo.max' => 'Arquivo e maior que 1 mb',
        'photo.file' => 'Arquivo dev ser uma imagem',
        'photo.required' => 'Arquivo de imagem obrigatorio',
        'telefone.required' => 'Necessario informar o telefone',
        'telefone.min' => 'Telefone deve ter no minimo 11 digitos'
    ];

    public function formatPhoneNumber()
    {
        // $this->telefone Manny::mask();
    }

    public function save()
    {
        $this->validate();
        $path = $this->photo->store('documentos');
        //
        dd($path);
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
