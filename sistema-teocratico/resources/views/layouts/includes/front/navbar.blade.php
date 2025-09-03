@php
  use Illuminate\Support\Facades\Route as R;

  // Marca por defecto
  $brand = $brand ?? 'Congregación OVB';

  // Menú por defecto (si no pasas $links desde la vista)
  $links = $links ?? [
  ['type' => 'link', 'name' => 'Inicio', 'href' => '/', 'pattern' => '/'],
    //['type' => 'link', 'name' => 'Asignaciones', 'route' => 'front.asignaciones.index', 'href' => '/asignaciones', 'pattern' => 'asignaciones*'],//
    [
      'type'  => 'dropdown',
      'name'  => 'Asignaciones',
      'items' => [
        ['name' => 'Acomodadores, Audio y Video, Plataforma', 'route' => 'front.asignaciones.index', 'href' => '/asignaciones', 'pattern' => 'asignaciones*'],
        ['name' => 'Presidentes, Lectores y Oradores', 'route' => 'front.asignaciones.fin_de_semana',   'href' => '/asignaciones/fin_de_semana',  'pattern' => 'asignaciones/fin_de_semana*'],
      ],
    ],
    ['type' => 'link', 'name' => 'Informes', 'route' => 'front.informes', 'href' => '/informes', 'pattern' => 'informes*'],
    ['type' => 'link', 'name' => 'Reuunión Vida', 'route' => 'front.vida', 'href' => '/vida', 'pattern' => 'Vida*'],
  ];

  // Helpers para href y "activo"
  $href = function(array $item) {
    return isset($item['route']) && R::has($item['route'])
            ? route($item['route'])
            : ($item['href'] ?? '#');
  };

  $isActive = function(array $item) {
    if (!empty($item['pattern'])) return request()->is($item['pattern']);
    if (!empty($item['route']))   return request()->routeIs($item['route']);
    return false;
  };
@endphp

<nav class="bg-white border-b border-gray-200 dark:bg-gray-900 dark:border-gray-700">
  <div class="max-w-screen-xl mx-auto flex flex-wrap items-center justify-between p-4">

    {{-- Brand / Logo --}}
    <a href="{{ url('/') }}" class="flex items-center gap-3">
      <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">
        {{ $brand }}
      </span>
    </a>

    {{-- Mobile toggle --}}
    <button
      data-collapse-toggle="navbar-main"
      type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
      aria-controls="navbar-main"
      aria-expanded="false"
    >
      <span class="sr-only">Abrir menú</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
      </svg>
    </button>

    {{-- Menu --}}
    <div class="hidden w-full md:block md:w-auto" id="navbar-main">
      <ul
        class="flex flex-col md:flex-row md:items-center md:space-x-8 rtl:space-x-reverse
               p-4 md:p-0 mt-4 md:mt-0 rounded-lg md:rounded-none
               border border-gray-100 md:border-0
               bg-gray-50 md:bg-transparent
               dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700
               md:ml-10 lg:ml-16"
      >
        @foreach ($links as $i => $link)
          @if (($link['type'] ?? 'link') === 'dropdown' && !empty($link['items']) && is_array($link['items']))
            @php
              $dropdownId = 'dd-' . $i;
              $anyActive  = collect($link['items'])->contains(fn($it) => $isActive($it));
            @endphp

            <li class="relative">
              <button id="btn-{{ $dropdownId }}"
                      data-dropdown-toggle="{{ $dropdownId }}"
                      class="flex items-center justify-between w-full py-2 px-3 rounded-sm
                             md:border-0 md:w-auto
                             {{ $anyActive ? 'text-blue-700 md:dark:text-blue-500' : 'text-gray-900 dark:text-white' }}
                             hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700
                             dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                {{ $link['name'] ?? 'Menú' }}
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
              </button>
              <div id="{{ $dropdownId }}"
                   class="z-10 hidden w-48 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400">
                  @foreach ($link['items'] as $item)
                    <li>
                      <a href="{{ $href($item) }}"
                         class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        {{ $item['name'] ?? '' }}
                      </a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </li>

          @else
            <li>
              @php $active = $isActive($link); @endphp
              <a href="{{ $href($link) }}"
                 @if($active) aria-current="page" @endif
                 class="block py-2 px-3 rounded-sm md:p-0 md:border-0
                        {{ $active
                            ? 'text-blue-700 md:dark:text-blue-500'
                            : 'text-gray-900 dark:text-white' }}
                        hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700
                        dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                {{ $link['name'] ?? '' }}
              </a>
            </li>
          @endif
        @endforeach

        {{-- Auth --}}
        @if (Route::has('login'))
          @auth
            <li class="md:ml-6">
              <a href="{{ url('/admin') }}"
                 class="block py-2 px-3 rounded-sm border border-transparent hover:border-[#19140035] text-gray-900 md:p-0 dark:text-white">
                Dashboard
              </a>
            </li>
          @else
            <li class="md:ml-6">
              <a href="{{ route('login') }}"
                 class="block py-2 px-3 rounded-sm border border-transparent hover:border-[#19140035] text-gray-900 md:p-0 dark:text-white">
                Log in
              </a>
            </li>
            @if (Route::has('register'))
              {{--<li>
                <a href="{{ route('register') }}"
                   class="block py-2 px-3 rounded-sm border border-gray-200 hover:border-gray-400 text-gray-900 md:p-0 dark:text-white">
                  Register
                </a>
              </li>--}}
            @endif
          @endauth
        @endif
      </ul>
    </div>
  </div>
</nav>