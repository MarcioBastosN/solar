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
            'Recebimento da Documentação',
            'Emissão e pagamento de ART',
            'Elaboração do projeto',
            'Solicitação de parecer de acesso na concessionária',
            'Aprovação do projeto',
            'Recebimento das fotos da instalação',
            'Solicitação de vistoria na concessionária',
            'conclusão'
        ];

        foreach ($status as $item) {
            StatusProjet::firstOrCreate(["label" => $item]);
        }
    }
}
