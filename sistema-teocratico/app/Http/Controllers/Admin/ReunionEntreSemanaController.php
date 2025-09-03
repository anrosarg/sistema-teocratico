<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReunionEntreSemana;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReunionEntreSemanaController extends Controller
{
    public function index()
    {
        $reuniones = ReunionEntreSemana::with([
            'acomodadorPuerta','acomodadorAuditorio','microfono1','microfono2',
            'encargadoAudio','encargadoVideo','plataforma',
        ])
        ->orderBy('fecha', 'desc')
        ->paginate(20);

        return view('admin.reunion_entre_semana.index', compact('reuniones'));
    }

    public function create()
    {
        return view('admin.reunion_entre_semana.create', $this->listas());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fecha'                   => ['required','date','unique:reunion_entre_semana,fecha'],
            'acomodador_puerta_id'    => ['required','exists:publishers,id'],
            'acomodador_auditorio_id' => ['required','exists:publishers,id'],
            'microfono_1_id'          => ['required','exists:publishers,id'],
            'microfono_2_id'          => ['required','exists:publishers,id'],
            'encargado_audio_id'      => ['required','exists:publishers,id'],
            'encargado_video_id'      => ['required','exists:publishers,id'],
            'plataforma_id'           => ['required','exists:publishers,id'],
        ]);

        ReunionEntreSemana::create($data);

        return redirect()
            ->route('admin.reunion_entre_semana.index')
            ->with('success', 'Reunión creada correctamente.');
    }

    public function edit(ReunionEntreSemana $reunion_entre_semanum) // <- binding del resource
    {
        return view('admin.reunion_entre_semana.edit', array_merge(
            ['reunion' => $reunion_entre_semanum],
            $this->listas()
        ));
    }

    public function update(Request $request, ReunionEntreSemana $reunion_entre_semanum)
    {
        $data = $request->validate([
            'fecha' => [
                'required','date',
                Rule::unique('reunion_entre_semana','fecha')->ignore($reunion_entre_semanum->id),
            ],
            'acomodador_puerta_id'    => ['required','exists:publishers,id'],
            'acomodador_auditorio_id' => ['required','exists:publishers,id'],
            'microfono_1_id'          => ['required','exists:publishers,id'],
            'microfono_2_id'          => ['required','exists:publishers,id'],
            'encargado_audio_id'      => ['required','exists:publishers,id'],
            'encargado_video_id'      => ['required','exists:publishers,id'],
            'plataforma_id'           => ['required','exists:publishers,id'],
        ]);

        $reunion_entre_semanum->update($data);

        return redirect()
            ->route('admin.reunion_entre_semana.index')
            ->with('success', 'Reunión actualizada correctamente.');
    }

    public function destroy(ReunionEntreSemana $reunion_entre_semanum)
    {
        $reunion_entre_semanum->delete();

        return redirect()
            ->route('admin.reunion_entre_semana.index')
            ->with('success', 'Reunión eliminada correctamente.');
    }

    /**
     * Listas de publicadores por tipo de asignación.
     * Filtramos por nombre de asignación, con "like" para tolerar variantes.
     */
    private function listas(): array
    {
        $acomodadores = Publisher::whereHas('assignments', function ($q) {
            $q->where('name', 'like', 'Acomodador%');
        })->orderBy('last_name')->orderBy('first_name')->get();

        $micros = Publisher::whereHas('assignments', function ($q) {
            $q->where('name', 'like', 'Micr%'); // “Micrófono” / “Microfono”
        })->orderBy('last_name')->orderBy('first_name')->get();

        $audio = Publisher::whereHas('assignments', function ($q) {
            $q->where('name', 'like', 'Audio%');
        })->orderBy('last_name')->orderBy('first_name')->get();

        $video = Publisher::whereHas('assignments', function ($q) {
            $q->where('name', 'like', 'Video%');
        })->orderBy('last_name')->orderBy('first_name')->get();

        $plataforma = Publisher::whereHas('assignments', function ($q) {
            $q->where('name', 'like', 'Plataforma%');
        })->orderBy('last_name')->orderBy('first_name')->get();

        return [
            'puerta'     => $acomodadores,
            'auditorio'  => $acomodadores,
            'mic1'       => $micros,
            'mic2'       => $micros,
            'audio'      => $audio,
            'video'      => $video,
            'plataforma' => $plataforma,
        ];
    }
}