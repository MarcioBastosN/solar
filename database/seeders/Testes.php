<?php

namespace Database\Seeders;

use App\Models\DadosProject;
use App\Models\Register;
use App\Models\StatusProjet;
use App\Models\User;
use App\Models\UserRequest;
use App\Models\ValidaDocumento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Testes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {

            // Parte do usuario

            // cria o usario
            $user = User::create(
                [
                    'name' => fake()->name(),
                    'email' => fake()->unique()->safeEmail(),
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10)
                ]
            );
            // adiciona a role de user
            $user->assignRole('user');

            // cria um projeto
            $register = Register::create([
                'user_id' => $user->id,
                'telefone' => "89654789654",
                'identificacao_pf_pj' => "documentos/4/QhJ7aEwtbk5bOf8IhZbSGdbhzUKz1cC43zoylsTB.png",
                'procuracao' => "documentos/4/QhJ7aEwtbk5bOf8IhZbSGdbhzUKz1cC43zoylsTB.png",
                'fatura_da_uc' => "documentos/4/QhJ7aEwtbk5bOf8IhZbSGdbhzUKz1cC43zoylsTB.png",
                'padrao_de_entrada' => "documentos/4/QhJ7aEwtbk5bOf8IhZbSGdbhzUKz1cC43zoylsTB.png",
                'dijuntor_id' => 1,
                'observacao' => null,
                'kwp' => "6543",
                'fotovoltaico' => "alksdjl",
                'inversor' => "123sad",
                'datasheet' => "documentos/4/QhJ7aEwtbk5bOf8IhZbSGdbhzUKz1cC43zoylsTB.png",
            ]);

            // adiciona o responsavel


            $status_do_projeto = StatusProjet::find(1);

            $requestUser = UserRequest::create([
                'customer_id' => $user->id,
                'register_id' => $register->id,
                'status_id' => $status_do_projeto->id,
            ]);

            $inicia_projeto  = DadosProject::create([
                'projects_id' =>  $register->id,
                'status_project_id' => $status_do_projeto->id,
            ]);

            $documentos = ['identificacao_pf_pj', 'procuracao', 'padrao_de_entrada', 'fatura_da_uc', 'datasheet'];

            // adiciona o status dos arquivos
            foreach ($documentos as $doc) {
                DB::transaction(fn () => ValidaDocumento::create([
                    'register_id' => $register->id,
                    'documento' => $doc,
                    'status_id' => 1,
                ]));
            }
        }
    }
}
