<x-admin-layout
    title="Nuevo circuito"
    :breadcrumbs="[
        ['name' => 'Inicio', 'route' => 'admin.dashboard'],
        ['name' => 'Circuitos', 'route' => 'admin.circuits.index'],
        ['name' => 'Nuevo'],
    ]"
>
    <div class="bg-white rounded-lg shadow p-6 max-w-xl">
        <form method="POST" action="{{ route('admin.circuits.store') }}" class="space-y-4">
            @csrf
            @include('admin.circuits._form')
        </form>
    </div>
</x-admin-layout>