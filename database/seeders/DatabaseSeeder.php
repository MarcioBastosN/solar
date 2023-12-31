<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\StatusProjet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(PermissionSeeders::class);
        $this->call(DijuntorsSeeders::class);
        $this->call(StatusProjetcSeed::class);
        $this->call(StatusProjetcSeed::class);
        $this->call(StatusDocumentosSeed::class);
        $this->call(AdminSeeders::class);
    }
}
