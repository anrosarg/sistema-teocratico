<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            'Grupo 1',
            'Grupo 2',
            'Grupo 3',
            'Grupo 4',
            'Grupo 5',
            'Grupo 6',
            'Grupo 7',
            'Grupo 8',
        ];

        foreach ($groups as $group) {
            Group::create([
                'name' => $group,
                'congregation_id' => 1, // Asegúrate que la congregación con id 1 exista
            ]);
        }
    }
}
