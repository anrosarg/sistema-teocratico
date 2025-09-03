@php
    use Illuminate\Support\Carbon;

    // $reuniones viene desde la ruta (colección Eloquent)
    $porMes = collect($reuniones)
        ->sortBy('fecha')
        ->groupBy(fn ($r) => Carbon::parse($r->fecha)->translatedFormat('F Y'));
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asignaciones — Fin de semana</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">

    {{-- MISMO NAVBAR QUE EN WELCOME --}}
    @include('layouts.includes.front.navbar', ['brand' => 'Congregación OVB'])

    <div class="max-w-6xl mx-auto p-4 sm:p-6">
        <h1 class="text-2xl font-semibold mb-4">Asignaciones — Fin de semana</h1>

        @if ($porMes->isEmpty())
            <div class="rounded-lg bg-white shadow-sm p-6">
                <p class="text-gray-600">
                    No hay asignaciones para el <strong>mes actual</strong> ni para el <strong>mes siguiente</strong>.
                </p>
            </div>
        @else
            @foreach ($porMes as $mes => $items)
                <h2 class="text-xl font-medium mt-8 mb-3">{{ ucfirst($mes) }}</h2>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs uppercase bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 sm:px-6 py-3">Fecha</th>
                            <th class="px-4 sm:px-6 py-3">Presidente</th>
                            <th class="px-4 sm:px-6 py-3">Orador</th>
                            <th class="px-4 sm:px-6 py-3">Congregación</th>
                            <th class="px-4 sm:px-6 py-3">Tema</th>
                            <th class="px-4 sm:px-6 py-3">La Atalaya</th>
                            <th class="px-4 sm:px-6 py-3">Lector</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $fila)
                            @php $fecha = Carbon::parse($fila->fecha); @endphp
                            <tr class="odd:bg-white even:bg-gray-50 border-b">
                                <td class="px-4 sm:px-6 py-3 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $fecha->translatedFormat('D d/m') }}
                                </td>
                                <td class="px-4 sm:px-6 py-3">
                                    {{ optional($fila->presidente)->nombre_completo ?? '—' }}
                                </td>
                                <td class="px-4 sm:px-6 py-3">
                                    {{ $fila->orador ?? '—' }}
                                </td>
                                <td class="px-4 sm:px-6 py-3">
                                    {{ $fila->congregacion ?? '—' }}
                                </td>
                                <td class="px-4 sm:px-6 py-3">
                                    {{ $fila->tema ?? '—' }}
                                </td>
                                <td class="px-4 sm:px-6 py-3">
                                    {{ $fila->la_atalaya ?? '—' }}
                                </td>
                                <td class="px-4 sm:px-6 py-3">
                                    {{ optional($fila->lector)->nombre_completo ?? '—' }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        @endif
    </div>

    {{-- JS para dropdowns/toggle del navbar (Flowbite) --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>