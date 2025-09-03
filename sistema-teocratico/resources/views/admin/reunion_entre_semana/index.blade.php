@extends('layouts.admin')

@section('content')
<div class="p-4 sm:p-6">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl sm:text-2xl font-semibold">Reunión entre semana</h1>
        <a href="{{ route('admin.reunion_entre_semana.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded">
            Nueva reunión
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 rounded bg-green-50 border border-green-200 text-green-800 px-4 py-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow-sm">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase">
                <tr>
                    <th class="px-4 py-3">Fecha</th>
                    <th class="px-4 py-3">Puerta</th>
                    <th class="px-4 py-3">Auditorio</th>
                    <th class="px-4 py-3">Mic 1</th>
                    <th class="px-4 py-3">Mic 2</th>
                    <th class="px-4 py-3">Audio</th>
                    <th class="px-4 py-3">Video</th>
                    <th class="px-4 py-3">Plataforma</th>
                    <th class="px-4 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($reuniones as $r)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 font-medium">{{ \Illuminate\Support\Carbon::parse($r->fecha)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2">{{ $r->acomodadorPuerta->nombre_completo ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $r->acomodadorAuditorio->nombre_completo ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $r->microfono1->nombre_completo ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $r->microfono2->nombre_completo ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $r->encargadoAudio->nombre_completo ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $r->encargadoVideo->nombre_completo ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $r->plataforma->nombre_completo ?? '—' }}</td>
                        <td class="px-4 py-2 text-right">
                            <a href="{{ route('admin.reunion_entre_semana.edit', $r) }}" class="text-blue-700 hover:underline mr-3">Editar</a>
                            <form action="{{ route('admin.reunion_entre_semana.destroy', $r) }}" method="POST" class="inline"
                                  onsubmit="return confirm('¿Eliminar esta reunión?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="9" class="px-4 py-10 text-center text-gray-500">No hay registros.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $reuniones->links() }}
    </div>
</div>
@endsection