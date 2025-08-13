<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Publisher;

class ReunionEntreSemana extends Model
{
    protected $table = 'reunion_entre_semana';

    protected $fillable = [
        'fecha',
        'acomodador_puerta_id',
        'acomodador_auditorio_id',
        'microfono_1_id',
        'microfono_2_id',
        'encargado_audio_id',
        'encargado_video_id',
        'plataforma_id',
    ];

    public function acomodadorPuerta()
    {
        return $this->belongsTo(Publisher::class, 'acomodador_puerta_id');
    }

    public function acomodadorAuditorio()
    {
        return $this->belongsTo(Publisher::class, 'acomodador_auditorio_id');
    }

    public function microfono1()
    {
        return $this->belongsTo(Publisher::class, 'microfono_1_id');
    }

    public function microfono2()
    {
        return $this->belongsTo(Publisher::class, 'microfono_2_id');
    }

    public function encargadoAudio()
    {
        return $this->belongsTo(Publisher::class, 'encargado_audio_id');
    }

    public function encargadoVideo()
    {
        return $this->belongsTo(Publisher::class, 'encargado_video_id');
    }

    public function plataforma()
    {
        return $this->belongsTo(Publisher::class, 'plataforma_id');
    }
}
