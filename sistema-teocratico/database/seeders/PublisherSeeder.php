<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publishers = [
            // Grupo 1
            ['last_name' => 'Rossi', 'first_name' => 'Marcelo', 'group_id' => 1],
            ['last_name' => 'de Felipe', 'first_name' => 'Ricardo', 'group_id' => 1],
            ['last_name' => 'Cabrera', 'first_name' => 'Victoria', 'group_id' => 1],
            ['last_name' => 'de Felipe', 'first_name' => 'Marina', 'group_id' => 1],
            ['last_name' => 'fusca', 'first_name' => 'María Inés', 'group_id' => 1],
            ['last_name' => 'Girat', 'first_name' => 'Gladys', 'group_id' => 1],
            ['last_name' => 'Girat', 'first_name' => 'Valeria', 'group_id' => 1],
            ['last_name' => 'imbergamo', 'first_name' => 'Elizabeth', 'group_id' => 1],
            ['last_name' => 'miño', 'first_name' => 'Gabriel', 'group_id' => 1],
            ['last_name' => 'miño', 'first_name' => 'Laura', 'group_id' => 1],
            ['last_name' => 'ortegui', 'first_name' => 'Verónica', 'group_id' => 1],
            ['last_name' => 'Papeschi', 'first_name' => 'Mirta', 'group_id' => 1],
            ['last_name' => 'Papeschi', 'first_name' => 'Roberto', 'group_id' => 1],
            ['last_name' => 'Rossi', 'first_name' => 'Ana', 'group_id' => 1],
            ['last_name' => 'Rossi', 'first_name' => 'Silvia', 'group_id' => 1],
            ['last_name' => 'Suarez', 'first_name' => 'Amador', 'group_id' => 1],

            // Grupo 2
            ['last_name' => 'Fretes', 'first_name' => 'Gabriel', 'group_id' => 2],
            ['last_name' => 'Pietro Paolo', 'first_name' => 'Gabriel', 'group_id' => 2],
            ['last_name' => 'Ayala', 'first_name' => 'Norma', 'group_id' => 2],
            ['last_name' => 'Cicarelli', 'first_name' => 'Graciela', 'group_id' => 2],
            ['last_name' => 'Cicarelli', 'first_name' => 'Mercedes', 'group_id' => 2],
            ['last_name' => 'cositto', 'first_name' => 'Emiliano', 'group_id' => 2],
            ['last_name' => 'fletes', 'first_name' => 'Vanina', 'group_id' => 2],
            ['last_name' => 'Heredia', 'first_name' => 'Alexis', 'group_id' => 2],
            ['last_name' => 'Maldonado', 'first_name' => 'Ana', 'group_id' => 2],
            ['last_name' => 'Muñoz', 'first_name' => 'Pilar', 'group_id' => 2],
            ['last_name' => 'palacios', 'first_name' => 'Rosa', 'group_id' => 2],
            ['last_name' => 'payero', 'first_name' => 'Rosa', 'group_id' => 2],
            ['last_name' => 'Pietro Paolo', 'first_name' => 'Gladys', 'group_id' => 2],
            ['last_name' => 'romero', 'first_name' => 'Gladys', 'group_id' => 2],
            ['last_name' => 'romero', 'first_name' => 'Omar', 'group_id' => 2],
            ['last_name' => 'Vázquez', 'first_name' => 'Ruth', 'group_id' => 2],

            // Grupo 3
            ['last_name' => 'Ruiz', 'first_name' => 'Daniel', 'group_id' => 3],
            ['last_name' => 'Lucero', 'first_name' => 'Gonzalo', 'group_id' => 3],
            ['last_name' => 'Agüero', 'first_name' => 'Gabriela', 'group_id' => 3],
            ['last_name' => 'Álvarez', 'first_name' => 'Estela', 'group_id' => 3],
            ['last_name' => 'Castillo', 'first_name' => 'Adolfo', 'group_id' => 3],
            ['last_name' => 'Castillo', 'first_name' => 'Jorge', 'group_id' => 3],
            ['last_name' => 'Castillo', 'first_name' => 'Yoalix', 'group_id' => 3],
            ['last_name' => 'cedolini', 'first_name' => 'Adriana', 'group_id' => 3],
            ['last_name' => 'espejo', 'first_name' => 'Fanny', 'group_id' => 3],
            ['last_name' => 'gay', 'first_name' => 'Patricia', 'group_id' => 3],
            ['last_name' => 'Gómez', 'first_name' => 'Jorge Luis', 'group_id' => 3],
            ['last_name' => 'Lucero', 'first_name' => 'Luana', 'group_id' => 3],
            ['last_name' => 'rubinowicz', 'first_name' => 'Nilda', 'group_id' => 3],
            ['last_name' => 'Ruiz', 'first_name' => 'Florencia', 'group_id' => 3],
            ['last_name' => 'Ruiz', 'first_name' => 'Lorena', 'group_id' => 3],
            ['last_name' => 'salinas', 'first_name' => 'Patricia', 'group_id' => 3],
            ['last_name' => 'San Martín', 'first_name' => 'Yolanda', 'group_id' => 3],

            // Grupo 4
            ['last_name' => 'Narváez', 'first_name' => 'Antonio', 'group_id' => 4],
            ['last_name' => 'Lozano', 'first_name' => 'Daniel', 'group_id' => 4],
            ['last_name' => 'calisti', 'first_name' => 'Sabrina', 'group_id' => 4],
            ['last_name' => 'Argüello', 'first_name' => 'Delia', 'group_id' => 4],
            ['last_name' => 'Castro', 'first_name' => 'Ana', 'group_id' => 4],
            ['last_name' => 'Castro', 'first_name' => 'Mariana', 'group_id' => 4],
            ['last_name' => 'franco', 'first_name' => 'Esteban', 'group_id' => 4],
            ['last_name' => 'Giracca', 'first_name' => 'Graciela', 'group_id' => 4],
            ['last_name' => 'González', 'first_name' => 'Erna', 'group_id' => 4],
            ['last_name' => 'Lozano', 'first_name' => 'Silvana', 'group_id' => 4],
            ['last_name' => 'Martínez', 'first_name' => 'Mirta', 'group_id' => 4],
            ['last_name' => 'Miño', 'first_name' => 'Alejandra', 'group_id' => 4],
            ['last_name' => 'Narváez', 'first_name' => 'Rosa', 'group_id' => 4],
            ['last_name' => 'Salazar', 'first_name' => 'Emiliano', 'group_id' => 4],
            ['last_name' => 'Salazar', 'first_name' => 'Federicos', 'group_id' => 4],
            ['last_name' => 'torres', 'first_name' => 'Beatriz', 'group_id' => 4],

            // Grupo 5
            ['last_name' => 'Archilla', 'first_name' => 'Matías', 'group_id' => 5],
            ['last_name' => 'recobsky', 'first_name' => 'Adolfo', 'group_id' => 5],
            ['last_name' => 'archilla', 'first_name' => 'Paola', 'group_id' => 5],
            ['last_name' => 'carinsi', 'first_name' => 'Martín', 'group_id' => 5],
            ['last_name' => 'Carinci', 'first_name' => 'Miguel', 'group_id' => 5],
            ['last_name' => 'Carinci', 'first_name' => 'Susana', 'group_id' => 5],
            ['last_name' => 'figueredo', 'first_name' => 'Julia', 'group_id' => 5],
            ['last_name' => 'irusta', 'first_name' => 'Mercedes', 'group_id' => 5],
            ['last_name' => 'ludeña', 'first_name' => 'Elsa', 'group_id' => 5],
            ['last_name' => 'Núñez', 'first_name' => 'Marta', 'group_id' => 5],
            ['last_name' => 'Quiroz', 'first_name' => 'Nancy', 'group_id' => 5],
            ['last_name' => 'recobsky', 'first_name' => 'Lautaro', 'group_id' => 5],
            ['last_name' => 'recobsky', 'first_name' => 'Marta', 'group_id' => 5],
            ['last_name' => 'sittner', 'first_name' => 'Eliana', 'group_id' => 5],
            ['last_name' => 'sittner', 'first_name' => 'Felipe', 'group_id' => 5],
            ['last_name' => 'sittner', 'first_name' => 'Luca', 'group_id' => 5],
            ['last_name' => 'sittner', 'first_name' => 'Tomás', 'group_id' => 5],
            ['last_name' => 'sittner', 'first_name' => 'Walter', 'group_id' => 5],

            // Grupo 6
            ['last_name' => 'Gómez', 'first_name' => 'Jorge', 'group_id' => 6],
            ['last_name' => 'Muñoz', 'first_name' => 'Juan Carlos', 'group_id' => 6],
            ['last_name' => 'cagneta', 'first_name' => 'Rosa', 'group_id' => 6],
            ['last_name' => 'cartaya', 'first_name' => 'Johnny', 'group_id' => 6],
            ['last_name' => 'cartaya', 'first_name' => 'Luis Fernando', 'group_id' => 6],
            ['last_name' => 'cartaya', 'first_name' => 'Mari Carmen', 'group_id' => 6],
            ['last_name' => 'espejo', 'first_name' => 'Máximo', 'group_id' => 6],
            ['last_name' => 'espejo', 'first_name' => 'Natalia', 'group_id' => 6],
            ['last_name' => 'Gómez', 'first_name' => 'Cristian', 'group_id' => 6],
            ['last_name' => 'Gómez', 'first_name' => 'Gonzalo', 'group_id' => 6],
            ['last_name' => 'Gómez', 'first_name' => 'Nancy', 'group_id' => 6],
            ['last_name' => 'Gómez', 'first_name' => 'Patricia', 'group_id' => 6],
            ['last_name' => 'Muñoz', 'first_name' => 'Juan Francisco', 'group_id' => 6],
            ['last_name' => 'Muñoz', 'first_name' => 'Juan Pablo', 'group_id' => 6],
            ['last_name' => 'Muñoz', 'first_name' => 'Iraifer suahil', 'group_id' => 6],
            ['last_name' => 'Suárez', 'first_name' => 'María Cristina', 'group_id' => 6],
            ['last_name' => 'tamasi', 'first_name' => 'Angélica', 'group_id' => 6],

            // Grupo 7
            ['last_name' => 'macri', 'first_name' => 'Daniel', 'group_id' => 7],
            ['last_name' => 'Martínez', 'first_name' => 'Joaquín', 'group_id' => 7],
            ['last_name' => 'Archilla', 'first_name' => 'Edith', 'group_id' => 7],
            ['last_name' => 'Archilla', 'first_name' => 'Yanella', 'group_id' => 7],
            ['last_name' => 'Etchepare', 'first_name' => 'Raquel', 'group_id' => 7],
            ['last_name' => 'Galván', 'first_name' => 'Mirtha', 'group_id' => 7],
            ['last_name' => 'González', 'first_name' => 'Adrián', 'group_id' => 7],
            ['last_name' => 'González', 'first_name' => 'Melisa', 'group_id' => 7],
            ['last_name' => 'macri', 'first_name' => 'Martín', 'group_id' => 7],
            ['last_name' => 'macri', 'first_name' => 'Rosana', 'group_id' => 7],
            ['last_name' => 'Martínez', 'first_name' => 'Elena', 'group_id' => 7],
            ['last_name' => 'Martínez', 'first_name' => 'Hilda', 'group_id' => 7],
            ['last_name' => 'Martínez', 'first_name' => 'María', 'group_id' => 7],
            ['last_name' => 'Martínez', 'first_name' => 'Sonia', 'group_id' => 7],
            ['last_name' => 'miño', 'first_name' => 'Miriam', 'group_id' => 7],
            ['last_name' => 'Pereira', 'first_name' => 'Berta', 'group_id' => 7],
            ['last_name' => 'Ramírez', 'first_name' => 'Génesis', 'group_id' => 7],
            ['last_name' => 'Ramírez', 'first_name' => 'Henry', 'group_id' => 7],

            // Grupo 8
            ['last_name' => 'Cortés', 'first_name' => 'David', 'group_id' => 8],
            ['last_name' => 'Muñoz', 'first_name' => 'Juan Carlos hijo', 'group_id' => 8],
            ['last_name' => 'andino', 'first_name' => 'Noemí', 'group_id' => 8],
            ['last_name' => 'Barragán', 'first_name' => 'Miguel', 'group_id' => 8],
            ['last_name' => 'Barragán', 'first_name' => 'Raquel', 'group_id' => 8],
            ['last_name' => 'bourdeta', 'first_name' => 'Gladys', 'group_id' => 8],
            ['last_name' => 'carrión', 'first_name' => 'Brenda', 'group_id' => 8],
            ['last_name' => 'carrión', 'first_name' => 'Erick', 'group_id' => 8],
            ['last_name' => 'Cáceres', 'first_name' => 'Julio', 'group_id' => 8],
            ['last_name' => 'Cáceres', 'first_name' => 'Priscila', 'group_id' => 8],
            ['last_name' => 'Cáceres', 'first_name' => 'Yanina', 'group_id' => 8],
            ['last_name' => 'Cortés', 'first_name' => 'Inés', 'group_id' => 8],
            ['last_name' => 'Duarte', 'first_name' => 'Hilda', 'group_id' => 8],
            ['last_name' => 'Jiménez', 'first_name' => 'Regina', 'group_id' => 8],
            ['last_name' => 'oliva', 'first_name' => 'Rafael', 'group_id' => 8],
            ['last_name' => 'oliva', 'first_name' => 'Roxana', 'group_id' => 8],
            ['last_name' => 'Sánchez', 'first_name' => 'Noemí', 'group_id' => 8],
            ['last_name' => 'Serulle', 'first_name' => 'Miguel', 'group_id' => 8],
        ];

        foreach ($publishers as $publisher) {
            Publisher::create([
                'last_name' => $publisher['last_name'],
                'first_name' => $publisher['first_name'],
                'circuit_id' => 1,
                'congregation_id' => 1,
                'group_id' => $publisher['group_id'],
                'status' => 'bautizado',
                'condition' => 'ejemplar',
            ]);
        }
    }
}
