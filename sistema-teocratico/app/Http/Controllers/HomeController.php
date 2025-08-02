<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReunionEntreSemana;
use App\Models\ReunionFinDeSemana;


class HomeController extends Controller
{
    public function asignaciones()
    {
        $reuniones = ReunionEntreSemana::with([
            'acomodadorPuerta',
            'acomodadorAuditorio',
            'microfono1',
            'microfono2',
            'encargadoAudio',
            'encargadoVideo',
            'plataforma',
        ])->orderBy('fecha', 'asc')->get();

        return view('asignaciones', compact('reuniones'));
    }

public function finDeSemana()
{
    $reuniones = \App\Models\ReunionFinDeSemana::with(['presidente', 'lector'])
        ->orderBy('fecha', 'asc')
        ->get();

    return view('fin-de-semana', compact('reuniones'));
}
}