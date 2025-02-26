<?php

namespace Database\Seeders;

use App\Models\Dijuntor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DijuntorsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $dijuntores = [
            'MONOFÁSICO',
            'BIFÁSICO',
            'TRIFÁSICO',
        ];

        foreach ($dijuntores as $dijuntor) {
            Dijuntor::firstOrCreate(['name' => $dijuntor]);
        }
    }
}
