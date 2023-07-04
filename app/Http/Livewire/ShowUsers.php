<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ShowUsers extends Component
{

    public $users;

    public function mount()
    {
        $this->users = Role::where('name', 'user')->first()->users;
    }

    public function render()
    {
        return view('livewire.show-users');
    }
}
