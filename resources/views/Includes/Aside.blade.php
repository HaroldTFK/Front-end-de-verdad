<aside id="sidebar" class="sidebar" aria-label="Navegación principal">
    <div class="sidebar-cabecera">
        <a href="{{ route('/') }}" class="logo" aria-label="Ir al inicio de AdminPanel">
            <span class="logo-marca">A</span>
            <span class="logo-texto">
                <strong>AdminPanel</strong>
                <small>Centro de formación</small>
            </span>
        </a>
        <button id="cerrar-menu" class="cerrar-menu" type="button" aria-label="Cerrar menú">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M6 6l12 12M18 6L6 18" />
            </svg>
        </button>
    </div>

    <nav class="menu">
        <span class="menu-titulo">Menú principal</span>
        <a href="{{ route('/') }}" class="{{ request()->routeIs('/') ? 'activo' : '' }}"
            @if (request()->routeIs('/')) aria-current="page" @endif>
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1V10Z" />
            </svg>
            <span>Inicio</span>
        </a>
        <a href="{{ route('students.index') }}" class="{{ request()->routeIs('students.*') ? 'activo' : '' }}"
            @if (request()->routeIs('students.*')) aria-current="page" @endif>
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M16 20v-1a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v1M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm13 9v-1a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
            <span>Estudiantes</span>
        </a>
        <a href="{{ route('teachers.index') }}" class="{{ request()->routeIs('teachers.*') ? 'activo' : '' }}"
            @if (request()->routeIs('teachers.*')) aria-current="page" @endif>
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2M12 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" />
            </svg>
            <span>Profesores</span>
        </a>
        <a href="{{ route('modules.index') }}" class="{{ request()->routeIs('modules.*') ? 'activo' : '' }}"
            @if (request()->routeIs('modules.*')) aria-current="page" @endif>
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 19.5A2.5 2.5 0 0 0 6.5 22H20V2H6.5A2.5 2.5 0 0 0 4 4.5v15Z" />
            </svg>
            <span>Módulos</span>
        </a>
    </nav>

    <div class="usuario">
        <div class="usuario-avatar">JC<span></span></div>
        <div class="usuario-info">
            <strong>Jonathan Chantre</strong>
            <small>Administrador</small>
        </div>
        <span class="usuario-menu" aria-hidden="true">•••</span>
    </div>
</aside>
