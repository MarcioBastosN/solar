<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class addAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Qual o seu nome completo?');
        $email = $this->ask('Qual o seu email?');
        $pwd = $this->secret('Qual a sua senha?');
        $pwd_confirmation = $this->secret('Confirme sua senha');
        while ($pwd != $pwd_confirmation) {
            $this->error('Suas senhas não conferem, informe novamente');
            $pwd = $this->secret('Qual a sua senha?');
            $pwd_confirmation = $this->secret('Confirme sua senha');
        }

        if ($this->confirm('Seus dados acima estão corretos?')) {
            $permissions = Permission::all();
            $role = Role::firstOrCreate(['name' => 'super-suport']);
            $role->syncPermissions($permissions);
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($pwd),
            ]);
            $user->assignRole('super-suport');

            $this->info("Usuário: {$name} criado com sucesso");
        }
    }
}
