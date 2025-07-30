<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Reunión de fin de semana') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded p-6">
                <h3 class="text-lg font-bold text-gray-700 mb-4">Vista de reunión de fin de semana</h3>
                <p class="text-gray-600">Aquí se mostrará el contenido de la reunión de fin de semana.</p>
            </div>
        </div>
    </div>
</x-app-layout>
