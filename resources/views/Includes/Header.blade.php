<header
    class="sticky top-0 z-40 flex items-center justify-between h-16 px-4 bg-white border-b border-gray-100 shadow-sm md:px-8 md:ml-64">

    <!-- Lado Izquierdo: Botón Menú Móvil + Buscador -->
    <div class="flex items-center flex-1 gap-4">
        <!-- Botón para abrir el sidebar en pantallas pequeñas -->
        <button id="toggle-sidebar" class="p-2 text-gray-500 rounded-xl hover:bg-gray-100 md:hidden focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Barra de Búsqueda -->
        <div class="relative w-full max-w-md hidden sm:block">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </span>
            <input type="search" placeholder="Buscar estudiantes, módulos, profesores..."
                class="w-full py-2 pl-9 pr-4 text-xs font-medium text-gray-700 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#39A900] focus:ring-1 focus:ring-[#39A900] transition-colors placeholder-gray-400">
        </div>
    </div>

    <!-- Lado Derecho: Notificaciones + Perfil -->
    <div class="flex items-center gap-3">

        <!-- Botón de Notificaciones -->
        <button class="relative p-2.5 text-gray-500 rounded-xl hover:bg-gray-100 hover:text-gray-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                </path>
            </svg>
            <!-- Punto indicador de notificación -->
            <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-[#39A900] ring-2 ring-white"></span>
        </button>

        <!-- Separador -->
        <div class="h-6 w-px bg-gray-200 mx-1"></div>

        <!-- Menú Perfil del Usuario -->
        <div class="flex items-center gap-3 pl-2">
            <div
                class="flex items-center justify-center w-9 h-9 font-bold text-xs text-[#39A900] bg-[#39A900]/10 border border-[#39A900]/20 rounded-xl">
                JC
            </div>
            <div class="hidden text-left md:block">
                <p class="text-xs font-semibold text-gray-800 leading-snug">Jonathan Chantre</p>
                <p class="text-[10px] font-medium text-gray-400">Desarrollador Lead</p>
            </div>
        </div>

    </div>
</header>
