<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignmentPublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ejemplo: asignar la asignación 1 a los publicadores 1 y 3
        DB::table('assignment_publisher')->insert([
            ['publisher_id' => 1, 'assignment_id' => 1],
            ['publisher_id' => 3, 'assignment_id' => 1],
            // Agrega aquí más relaciones según tus necesidades
        ]);
    }
}
