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
            'Aprovado',
            'Aguardando',
            'Em Desenvolvimento',
            'Negado',
        ];

        foreach ($status as $item) {
            StatusProjet::firstOrCreate(["label" => $item]);
        }
    }
}
