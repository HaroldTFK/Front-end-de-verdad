<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel') · AdminPanel SENA</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    @include('Includes.Aside')

    <div id="sidebar-backdrop" class="sidebar-backdrop"></div>

    <div class="barra-movil">
        <button id="abrir-menu" type="button" aria-label="Abrir menú" aria-expanded="false">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <div>
            <strong>AdminPanel</strong>
            <small>Centro de formación</small>
        </div>
    </div>

    <main class="contenido">
        @if (session('success'))
            <div class="alerta alerta-ok">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alerta alerta-error">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>

    <script>
        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('sidebar-backdrop');
        const openButton = document.getElementById('abrir-menu');
        const closeButton = document.getElementById('cerrar-menu');

        function setSidebarState(isOpen) {
            sidebar.classList.toggle('abierto', isOpen);
            backdrop.classList.toggle('visible', isOpen);
            openButton.setAttribute('aria-expanded', String(isOpen));
        }

        openButton.addEventListener('click', function () {
            setSidebarState(!sidebar.classList.contains('abierto'));
        });

        closeButton.addEventListener('click', function () {
            setSidebarState(false);
        });

        backdrop.addEventListener('click', function () {
            setSidebarState(false);
        });

        sidebar.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                setSidebarState(false);
            });
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                setSidebarState(false);
            }
        });
    </script>
</body>

</html>
