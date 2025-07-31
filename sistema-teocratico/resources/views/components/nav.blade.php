<nav x-data="{ open: false }" class="bg-gray-100 shadow-sm border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo / Título -->
            <div class="flex-shrink-0 flex items-center font-bold text-gray-800 text-xl">
                Sistema Teocrático
            </div>

            <!-- Navegación principal (oculta en móviles) -->
            <div class="hidden sm:flex sm:items-center sm:space-x-6 text-lg font-medium text-gray-700">
                <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Publicadores</a>
                <a href="{{ route('reunion-entre-semana.index') }}" class="hover:text-blue-600">Asignaciones</a>
                <a href="{{ route('reunion-fin-de-semana.index') }}" class="hover:text-blue-600">Reunión fin de semana</a>
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
    <div x-show="open" @click.outside="open = false" class="sm:hidden mt-2 px-4 pb-4 space-y-2 text-lg text-gray-700 bg-white shadow-md border-t border-gray-200">
        <a href="{{ route('dashboard') }}" class="block hover:text-blue-600">Publicadores</a>
        <a href="{{ route('reunion-entre-semana.index') }}" class="block hover:text-blue-600">Reunión entre semana</a>
        <a href="{{ route('reunion-fin-de-semana.index') }}" class="block hover:text-blue-600">Reunión fin de semana</a>
    </div>
</nav>