<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ReunionEntreSemana;

class Asignaciones extends Component
{
    public function render()
    {
        $reuniones = ReunionEntreSemana::with([
            'acomodadorPuerta',
            'acomodadorAuditorio',
            'microfono1',
            'microfono2',
            'encargadoAudio',
            'encargadoVideo',
            'plataforma'
        ])->orderBy('fecha', 'desc')->get();

        return view('livewire.asignaciones', compact('reuniones'));
    }
}
