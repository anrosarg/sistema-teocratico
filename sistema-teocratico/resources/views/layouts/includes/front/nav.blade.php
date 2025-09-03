<nav class="bg-white border-b border-gray-200 dark:bg-gray-900 dark:border-gray-700">
  @php
    use Illuminate\Support\Facades\Route as R;

    // Resuelve URLs con fallback a '#' si la ruta no existe o no la pasaste por props
    $asignacionesHref = R::has('front.asignaciones.index') ? route('front.asignaciones.index') : ($asignacionesUrl ?? '#');
    $entreSemanaHref  = R::has('front.asignaciones.index') ? route('front.asignaciones.index') : ($entreSemanaUrl ?? '#'); // usa misma página por ahora
    $finSemanaHref    = $finSemanaUrl ?? '#';
    $contactoHref     = $contactoUrl ?? '#';
  @endphp

  <div class="max-w-screen-xl mx-auto flex flex-wrap items-center justify-between p-4">
    {{-- Brand / Logo --}}
    <a href="{{ url('/') }}" class="flex items-center gap-3">
      <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">
        {{ $brand ?? 'Congregación OVB' }}
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
        <li>
          <a href="{{ url('/') }}"
             class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
            Home
          </a>
        </li>

        <li>
          <a href="{{ $asignacionesHref }}"
             class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
            Asignaciones
          </a>
        </li>

        {{-- Dropdown: Reuniones --}}
        <li class="relative">
          <button id="dropdownReunionesButton"
                  data-dropdown-toggle="dropdownReuniones"
                  class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
            Reuniones
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
          </button>
          <div id="dropdownReuniones"
               class="z-10 hidden w-44 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400">
              <li>
                <a href="{{ $entreSemanaHref }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                  Entre semana
                </a>
              </li>
              <li>
                <a href="{{ $finSemanaHref }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                  Fin de semana
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li>
          <a href="{{ $contactoHref }}"
             class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
            Contacto
          </a>
        </li>

        {{-- Auth links --}}
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
              <li>
                <a href="{{ route('register') }}"
                   class="block py-2 px-3 rounded-sm border border-gray-200 hover:border-gray-400 text-gray-900 md:p-0 dark:text-white">
                  Register
                </a>
              </li>
            @endif
          @endauth
        @endif
      </ul>
    </div>
  </div>
</nav>