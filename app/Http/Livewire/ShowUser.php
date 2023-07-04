<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowUser extends Component
{

    public $message;
    public User $user;

    public function mount()
    {
        $this->message = 'Hello World!';
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.show-user');
    }
}
