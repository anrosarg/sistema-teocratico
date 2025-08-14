<x-admin-layout
    title="Editar circuito"
    :breadcrumbs="[
        ['name' => 'Inicio', 'route' => 'admin.dashboard'],
        ['name' => 'Circuitos', 'route' => 'admin.circuits.index'],
        ['name' => 'Editar'],
    ]"
>
    <div class="bg-white rounded-lg shadow p-6 max-w-xl">
        <form method="POST" action="{{ route('admin.circuits.update', $circuit) }}" class="space-y-4">
            @csrf
            @method('PUT')
            @include('admin.circuits._form', ['circuit' => $circuit])
        </form>
    </div>
</x-admin-layout>