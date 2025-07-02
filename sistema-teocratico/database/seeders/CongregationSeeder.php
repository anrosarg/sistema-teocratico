<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Congregation;

class CongregationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Congregation::create([
            'name' => 'Oeste VillaBosch',
            'circuit_id' => 1, // Asegúrate que el circuito con id 1 exista (por ejemplo, Circuito 40)
        ]);
    }
}
