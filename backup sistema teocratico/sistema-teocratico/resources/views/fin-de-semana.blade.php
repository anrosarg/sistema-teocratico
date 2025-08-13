@extends('welcome')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Reunión de Fin de Semana</h2>
    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-gray-200 text-center text-lg font-semibold">
            <tr>
                <th class="p-2 border">Fecha</th>
                <th class="p-2 border">Presidente</th>
                <th class="p-2 border">Orador</th>
                <th class="p-2 border">Congregación</th>
                <th class="p-2 border">Tema</th>
                <th class="p-2 border">La Atalaya</th>
                <th class="p-2 border">Lector</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reuniones as $reunion)
                <tr class="text-lg text-gray-800 text-center">
                    <td class="p-2 border font-bold">{{ \Carbon\Carbon::parse($reunion->fecha)->format('d/m/Y') }}</td>
                    <td class="p-2 border">{{ $reunion->presidente?->nombre_completo ?? '—' }}</td>
                    <td class="p-2 border">{{ $reunion->orador }}</td>
                    <td class="p-2 border">{{ $reunion->congregacion }}</td>
                    <td class="p-2 border">{{ $reunion->tema }}</td>
                    <td class="p-2 border">{{ $reunion->la_atalaya }}</td>
                    <td class="p-2 border">{{ $reunion->lector?->nombre_completo ?? '—' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
