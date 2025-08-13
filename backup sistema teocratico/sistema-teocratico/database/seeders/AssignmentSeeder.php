<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Assignment;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assignments = [
            'Encargado de acomodadores',
            'Acomodador',
            'Micrófonos',
            'Plataforma',
            'Audio',
            'Video',
            'Coordinador de apoyo de audio y video',
            'Tablero',
            'Contabilidad',
            'Publicaciones',
            'Territorios',
            'Auxiliar de territorios',
            'Jardinería',
            'Limpieza',
            'Encargado de la caja de mantenimiento',
            'Retiro de publicaciones',
            'Arreglo de micros',
        ];

        foreach ($assignments as $assignment) {
            Assignment::create(['name' => $assignment]);
        }
    }
}
