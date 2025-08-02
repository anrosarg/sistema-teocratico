<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Publisher;

class ReunionFinDeSemana extends Model
{
    protected $table = 'reunion_fin_de_semana';

    protected $fillable = [
        'fecha',
        'presidente_id',
        'orador',
        'congregacion',
        'tema',
        'la_atalaya',
        'lector_id',
    ];

    // Relaciones

    public function presidente()
    {
        return $this->belongsTo(Publisher::class, 'presidente_id');
    }

    public function lector()
    {
        return $this->belongsTo(Publisher::class, 'lector_id');
    }
}
