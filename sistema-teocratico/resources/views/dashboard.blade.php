<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex flex-col sm:flex-row items-center justify-between mb-6 gap-4">
                    <h1 class="text-2xl font-bold text-gray-800 text-center w-full sm:w-auto">Publicadores</h1>
                    <a href="{{ route('publishers.create') }}"
                       class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow transition w-full sm:w-auto text-center">
                        Agregar
                    </a>
                </div>
                {{-- Componente Livewire para búsqueda y tabla --}}
                <livewire:publisher-search />
            </div>
        </div>
    </div>
</x-app-layout>