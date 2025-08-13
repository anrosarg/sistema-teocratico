<nav x-data="{ open: false, dropdownOpen: false }" class="bg-gray-100 shadow-sm border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo / Título -->
            <div class="flex-shrink-0 flex items-center font-bold text-gray-800 text-xl">
                Sistema Teocrático
            </div>

            <!-- Navegación principal (oculta en móviles) -->
            <div class="hidden sm:flex sm:items-center sm:space-x-6 text-lg font-medium text-gray-700 relative">
                <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Publicadores</a>
                <a href="{{ route('reunion-entre-semana.index') }}" class="hover:text-blue-600">Reunión entre semana</a>
                <a href="{{ route('reunion-fin-de-semana.index') }}" class="hover:text-blue-600">Reunión fin de semana</a>

                <!-- Dropdown Cargar -->
                <div @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false" class="relative">
                    <button class="hover:text-blue-600 focus:outline-none">
                        Cargar ▾
                    </button>
                    <div x-show="dropdownOpen"
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-md shadow-lg z-50"
                         @click.away="dropdownOpen = false">
                        <a href="{{ route('assignments.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 whitespace-nowrap">Asignaciones</a>
                        <a href="{{ route('privileges.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 whitespace-nowrap">Privilegios</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 whitespace-nowrap">Congregaciones</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 whitespace-nowrap">Circuitos</a>
                    </div>
                </div>
            </div>

            <!-- Botón hamburguesa -->
            <div class="sm:hidden">
                <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menú desplegable en móviles -->
    <div x-show="open" x-transition @click.outside="open = false" class="sm:hidden mt-2 px-4 pb-4 space-y-2 text-lg text-gray-700 bg-white shadow-md border-t border-gray-200">
        <a href="{{ route('dashboard') }}" class="block hover:text-blue-600">Publicadores</a>
        <a href="{{ route('reunion-entre-semana.index') }}" class="block hover:text-blue-600">Reunión entre semana</a>
        <a href="{{ route('reunion-fin-de-semana.index') }}" class="block hover:text-blue-600">Reunión fin de semana</a>

        <!-- Dropdown para móviles -->
        <div x-data="{ dropdownOpen: false }" class="pt-2 border-t border-gray-200">
            <button @click="dropdownOpen = !dropdownOpen" class="flex justify-between items-center w-full text-left hover:text-blue-600">
                <span>Cargar</span>
                <svg class="h-5 w-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="dropdownOpen" x-transition class="mt-2 space-y-1 pl-4 text-base">
                <a href="{{ route('assignments.index') }}" class="block hover:text-blue-600">Asignaciones</a>
                <a href="{{ route('privileges.index') }}" class="block hover:text-blue-600">Privilegios</a>
                <a href="#" class="block hover:text-blue-600">Congregaciones</a>
                <a href="#" class="block hover:text-blue-600">Circuitos</a>
            </div>
        </div>
    </div>
</nav>