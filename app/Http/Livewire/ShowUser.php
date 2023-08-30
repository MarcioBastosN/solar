<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShowUser extends Component
{

    use WithFileUploads;

    public User $user;
    public $photo;
    public $path;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function export()
    {
        return Storage::download($this->path);
    }

    public function save()
    {
        $this->validate(
            [
                'photo' => 'image|max:1024', // 1MB Max
            ],
            [
                'photo.max' => 'Arquivo e maior que 1 mb',
                'photo.image' => 'Arquivo dev ser uma imagem'
            ]
        );

        $this->path = $this->photo->store("photos");

        $this->photo = null;
    }

    public function render()
    {
        return view('livewire.show-user');
    }
}
