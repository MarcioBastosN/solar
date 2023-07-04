<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('livewire.show-user')->with(compact('user'));
    }
}
