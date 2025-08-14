<x-admin-layout
  title="Nueva congregación"
  :breadcrumbs="[
    ['name' => 'Inicio', 'route' => 'admin.dashboard'],
    ['name' => 'Congregaciones', 'route' => 'admin.congregations.index'],
    ['name' => 'Nueva'],
  ]"
>
  <div class="bg-white rounded-lg shadow p-6 max-w-xl">
    <form method="POST" action="{{ route('admin.congregations.store') }}" class="space-y-4">
      @csrf
      @include('admin.congregations._form', ['circuits' => $circuits])
    </form>
  </div>
</x-admin-layout>