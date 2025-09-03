<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Privilege;

class PrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $privileges = [
            'Anciano',
            'Siervo ministerial',
            'Precursor regular',
            'Precursor auxiliar',
            'Coordinador',
            'Secretario',
            'Superintendente de servicio',
            'Conductor de la Atalaya',
            'Superintendente de la reunión vida y ministerio cristianos',
            'Superintendente de grupo',
            'Auxiliar de grupo',
            'Comité de mantenimiento',
            'Consejero auxiliar',
            'Coordinador de conferencias',
            
        ];

        foreach ($privileges as $privilege) {
            Privilege::create(['name' => $privilege]);
        }
    }
}
