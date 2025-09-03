@php
use Illuminate\Support\Facades\Route;

// Config de links del sidebar
$links = [
    // Link simple
    [
        'type'   => 'link',
        'name'   => 'Dashboard',
        'icon'   => 'fa-solid fa-gauge',
        'route'  => 'admin.dashboard',
        'active' => request()->routeIs('admin.dashboard'),
    ],

    // Encabezado de sección
    [
        'type'  => 'header',
        'label' => 'Administrar página',
    ],

    // Menú con subitems
    [
        'type'  => 'menu',
        'name'  => 'Cargas',
        'icon'  => 'fa-solid fa-gear',
        'items' => [
            [ 'name' => 'Circuitos',                   'route' => 'admin.circuits.index' ],
            [ 'name' => 'Congregaciones',             'route' => 'admin.congregations.index',       'active' => request()->routeIs('admin.congregations.*') ],
            [ 'name' => 'Privilegios',                'route' => 'admin.privileges.index',          'active' => request()->routeIs('admin.privileges.*') ],
            [ 'name' => 'Asignaciones',               'route' => 'admin.assignments.index',         'active' => request()->routeIs('admin.assignments.*') ],
            [ 'name' => 'Grupos',                     'route' => 'admin.groups.index',              'active' => request()->routeIs('admin.groups.*') ],
            [ 'name' => 'Publicadores',               'route' => 'admin.publishers.index',          'active' => request()->routeIs('admin.publishers.*') ],
            [ 'name' => 'Reunión entre semana',       'route' => 'admin.reunion_entre_semana.index','active' => request()->routeIs('admin.reunion_entre_semana.*') ],
            [ 'name' => 'Reunión fin de semana',      'route' => 'admin.reunion_fin_de_semana.index','active'=> request()->routeIs('admin.reunion_fin_de_semana.*') ],
        ],
    ],

    // Otro link de ejemplo
    [
        'type'   => 'link',
        'name'   => 'Usuarios',
        'icon'   => 'fa-solid fa-users',
        'route'  => 'admin.users.index',
        'active' => request()->routeIs('admin.users.*'),
    ],
];

// Helper: ¿algún subitem activo en un menú?
$menuHasActive = function(array $menuItems) {
    foreach ($menuItems as $it) {
        $calc = $it['active'] ?? false;
        if (!$calc && isset($it['route'])) {
            $calc = request()->routeIs($it['route']) || request()->routeIs($it['route'] . '.*');
        }
        if ($calc) return true;
    }
    return false;
};
@endphp

<aside
  id="logo-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen pt-16 transition-transform -translate-x-full
         bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
  aria-label="Sidebar"
>
  <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
    <ul class="space-y-2 font-medium">
      @foreach ($links as $link)
        <li>
          {{-- HEADER --}}
          @if(($link['type'] ?? 'link') === 'header')
            <div class="px-2 py-2 text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">
              {{ $link['label'] ?? '' }}
            </div>
            @continue
          @endif

          {{-- MENÚ CON SUBMENÚ --}}
          @if(($link['type'] ?? 'link') === 'menu' && is_array($link['items'] ?? null))
            @php
              $dropdownId = 'dropdown-' . $loop->index;  // id único
              $isOpen     = $menuHasActive($link['items']);
            @endphp

            <button
              type="button"
              class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group
                     hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
              aria-controls="{{ $dropdownId }}"
              data-collapse-toggle="{{ $dropdownId }}"
              aria-expanded="{{ $isOpen ? 'true' : 'false' }}"
            >
              <span class="w-6 h-6 inline-flex justify-center items-center">
                <i class="{{ $link['icon'] ?? 'fa-regular fa-circle' }}"></i>
              </span>
              <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">
                {{ $link['name'] ?? '' }}
              </span>
              <svg class="w-3 h-3 transition-transform {{ $isOpen ? 'rotate-180' : '' }}" aria-hidden="true"
                   xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 4 4 4-4"/>
              </svg>
            </button>

            <ul id="{{ $dropdownId }}" class="{{ $isOpen ? '' : 'hidden' }} py-2 space-y-2">
              @foreach ($link['items'] as $item)
                @php
                  $itemHref = isset($item['route'])
                              ? (Route::has($item['route']) ? route($item['route']) : '#')
                              : ($item['href'] ?? '#');

                  $itemActive = $item['active'] ?? (
                      isset($item['route'])
                        ? (request()->routeIs($item['route']) || request()->routeIs($item['route'] . '.*'))
                        : false
                  );
                @endphp
                <li>
                  <a href="{{ $itemHref }}"
                     class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group
                            hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                            {{ $itemActive ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    {{ $item['name'] ?? '' }}
                  </a>
                </li>
              @endforeach
            </ul>
            @continue
          @endif

          {{-- LINK SIMPLE --}}
          @php
            $href = isset($link['route'])
                    ? (Route::has($link['route']) ? route($link['route']) : '#')
                    : ($link['href'] ?? '#');
          @endphp
          <a href="{{ $href }}"
             class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                    {{ ($link['active'] ?? false) ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
            <span class="w-6 h-6 inline-flex justify-center items-center">
              <i class="{{ $link['icon'] ?? 'fa-regular fa-circle' }}"></i>
            </span>
            <span class="ms-3">{{ $link['name'] ?? '' }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</aside>