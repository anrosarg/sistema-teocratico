<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegePublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Ejemplo: asignar el privilegio 1 (Anciano) a los publicadores 1 y 2
        DB::table('privilege_publisher')->insert([
            ['publisher_id' => 1, 'privilege_id' => 1],
            ['publisher_id' => 2, 'privilege_id' => 1],
            // Agrega aquí más relaciones según tus necesidades
        ]);
    }
}
