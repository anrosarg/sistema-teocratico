<x-admin-layout
  title="Editar congregación"
  :breadcrumbs="[
    ['name' => 'Inicio', 'route' => 'admin.dashboard'],
    ['name' => 'Congregaciones', 'route' => 'admin.congregations.index'],
    ['name' => 'Editar'],
  ]"
>
  <div class="bg-white rounded-lg shadow p-6 max-w-xl">
    <form method="POST" action="{{ route('admin.congregations.update', $congregation) }}" class="space-y-4">
      @csrf @method('PUT')
      @include('admin.congregations._form', ['congregation' => $congregation, 'circuits' => $circuits])
    </form>
  </div>
</x-admin-layout>