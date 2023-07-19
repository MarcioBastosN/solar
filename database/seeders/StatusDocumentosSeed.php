<?php

namespace Database\Seeders;

use App\Models\StatusDocumentos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusDocumentosSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusDocumentos = [
            'Aguardando revisão',
            'Invalido',
            'Aprovado',
        ];
        foreach ($statusDocumentos as $status) {
            StatusDocumentos::firstOrCreate(['label' => $status]);
        }
    }
}
