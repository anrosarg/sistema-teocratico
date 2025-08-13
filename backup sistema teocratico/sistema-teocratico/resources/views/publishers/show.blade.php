<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalles del Publicador
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8 bg-white rounded shadow">
        <div class="mb-6">
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">
                ← Volver al listado
            </a>
        </div>

        <h3 class="text-xl font-bold text-gray-800 mb-4">
            {{ $publisher->first_name }} {{ $publisher->last_name }}
        </h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
            <div><strong>Grupo:</strong> {{ $publisher->group->name ?? '-' }}</div>
            <div><strong>Circuito:</strong> {{ $publisher->circuit->name ?? '-' }}</div>
            <div><strong>Congregación:</strong> {{ $publisher->congregation->name ?? '-' }}</div>
            <div><strong>Estado:</strong> {{ ucfirst($publisher->status) }}</div>
            <div><strong>Condición:</strong> {{ ucfirst($publisher->condition) }}</div>
        </div>

        <hr class="my-6">

        <div class="mb-4">
            <h4 class="text-md font-semibold text-gray-700 mb-2">Privilegios</h4>
            @if($publisher->privileges->isNotEmpty())
                <ul class="list-disc list-inside text-gray-800">
                    @foreach($publisher->privileges as $privilegio)
                        <li>{{ $privilegio->name }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">Sin privilegios asignados.</p>
            @endif
        </div>

        <div class="mb-4">
            <h4 class="text-md font-semibold text-gray-700 mb-2">Asignaciones</h4>
            @if($publisher->assignments->isNotEmpty())
                <ul class="list-disc list-inside text-gray-800">
                    @foreach($publisher->assignments as $asignacion)
                        <li>{{ $asignacion->name }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">Sin asignaciones registradas.</p>
            @endif
        </div>

        <div class="mt-6">
            <a href="{{ route('publishers.edit', $publisher) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded">
                Editar
            </a>
        </div>
    </div>
</x-app-layout>
