@extends('layouts.admin')

@section('title', 'Reunión fin de semana')
@section('header', 'Reunión fin de semana')

@section('content')
<div class="mb-4 flex items-center justify-between">
    <h2 class="text-xl font-semibold">Listado (mes actual y siguiente)</h2>
    <a href="{{ route('admin.reunion_fin_de_semana.create') }}"
       class="inline-flex items-center px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
        Nueva
    </a>
</div>

<div class="relative overflow-x-auto bg-white shadow-sm sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-700">
        <thead class="text-xs uppercase bg-gray-100 text-gray-700">
        <tr>
            <th class="px-4 sm:px-6 py-3">Fecha</th>
            <th class="px-4 sm:px-6 py-3">Presidente</th>
            <th class="px-4 sm:px-6 py-3">Orador</th>
            <th class="px-4 sm:px-6 py-3">Congregación</th>
            <th class="px-4 sm:px-6 py-3">Tema</th>
            <th class="px-4 sm:px-6 py-3">La Atalaya</th>
            <th class="px-4 sm:px-6 py-3">Lector</th>
            <th class="px-4 sm:px-6 py-3 text-right">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse($reuniones as $r)
            <tr class="odd:bg-white even:bg-gray-50 border-b">
                <td class="px-4 sm:px-6 py-3 font-medium text-gray-900">
                    {{ \Illuminate\Support\Carbon::parse($r->fecha)->translatedFormat('D d/m/Y') }}
                </td>
                <td class="px-4 sm:px-6 py-3">{{ optional($r->presidente)->nombre_completo ?? '—' }}</td>
                <td class="px-4 sm:px-6 py-3">{{ $r->orador }}</td>
                <td class="px-4 sm:px-6 py-3">{{ $r->congregacion }}</td>
                <td class="px-4 sm:px-6 py-3">{{ $r->tema }}</td>
                <td class="px-4 sm:px-6 py-3">{{ $r->la_atalaya }}</td>
                <td class="px-4 sm:px-6 py-3">{{ optional($r->lector)->nombre_completo ?? '—' }}</td>
                <td class="px-4 sm:px-6 py-3 text-right">
                    <a href="{{ route('admin.reunion_fin_de_semana.edit', $r->id) }}"
                       class="text-indigo-600 hover:underline mr-3">Editar</a>
                    <form action="{{ route('admin.reunion_fin_de_semana.destroy', $r->id) }}"
                          method="POST" class="inline"
                          onsubmit="return confirm('¿Eliminar esta reunión?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="8" class="px-6 py-6 text-center text-gray-500">No hay reuniones en el período.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>

@if(method_exists($reuniones, 'links'))
    <div class="mt-4">{{ $reuniones->links() }}</div>
@endif
@endsection
