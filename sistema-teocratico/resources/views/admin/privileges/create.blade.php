<x-admin-layout
  title="Nuevo privilegio"
  :breadcrumbs="[
    ['name' => 'Inicio', 'route' => 'admin.dashboard'],
    ['name' => 'Privilegios', 'route' => 'admin.privileges.index'],
    ['name' => 'Nuevo'],
  ]"
>
  <div class="bg-white rounded-lg shadow p-6 max-w-xl">
    <form method="POST" action="{{ route('admin.privileges.store') }}" class="space-y-4">
      @csrf
      @include('admin.privileges._form')
    </form>
  </div>
</x-admin-layout>