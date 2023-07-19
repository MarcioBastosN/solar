<?php

namespace Database\Seeders;

use App\Models\StatusProjet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusProjetcSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            'Recebimento da Documentacao',
            'Emissão e pagamento de ART',
            'Elaboraçao do projeto',
            'Solicitação de parecer de acesso na concessionária',
            'Aprovação do projeto',
            'Recebimento das fotos da instalação',
            'Solicitação de vistoria na concessionaria',
            'conclusao'
        ];

        foreach ($status as $item) {
            StatusProjet::firstOrCreate(["label" => $item]);
        }
    }
}
