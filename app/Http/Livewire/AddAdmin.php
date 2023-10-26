<?php

namespace App\Http\Livewire;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class AddAdmin extends Component
{

    use Actions, WithPagination;

    public $search;
    //
    public $name, $email, $password;

    protected $queryString = ['search'];

    protected $rules = [
        "name" => "required|min:3",
        "email" => "required|email",
        "password" => "required",
    ];

    protected $messages = [
        "name.required" => "Nome e obrigatorio",
        "name.min" => "Nome deve conter no minimo 3 letras",
        "email.required" => "E-mail e obrigatorio",
        "email.email" => "E-mail deve ser valido",
        "password.required" => "Senha e obrigatorio",
    ];

    public function clear()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function save()
    {

        $this->validate();

        DB::beginTransaction();
        try {
            DB::transaction(function () {
                $user = User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                ]);
                $user->assignRole('admin');
            });

            $this->notification()->success(
                $title = "Sucesso",
                $description = "usuario registrado"
            );
            $this->clear();
        } catch (Exception $e) {
            DB::rollBack();
            $this->notification()->error(
                $title = "Error",
                $description = $e->getMessage()
            );
        }
        DB::commit();
    }


    public function render()
    {
        $users = User::role('admin')->with('roles')->where(function ($query) {
            $query->where('email', 'ilike', '%' . $this->search . '%')
                ->orWhere('name', 'ilike', '%' . $this->search . '%');
        })->orderBy('created_at', "DESC")->paginate(5);

        return view('livewire.add-admin')->with(compact('users'));
    }
}
