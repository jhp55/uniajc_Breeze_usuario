<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

    {{-- Navbar --}}
    <nav class="app-header navbar navbar-expand bg-body">

        <div class="container-fluid">

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link"
                       data-lte-toggle="sidebar"
                       href="#"
                       role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>

                <li class="nav-item d-none d-md-block">
                    <a href="{{ url('/') }}" class="nav-link">
                        Inicio
                    </a>
                </li>

            </ul>

        </div>

    </nav>

    {{-- Sidebar --}}
    <aside class="app-sidebar bg-body-secondary shadow"
           data-bs-theme="dark">

        <div class="sidebar-brand">

            <a href="{{ url('/') }}" class="brand-link">

                <span class="brand-text fw-light">
                    Mi Admin
                </span>

            </a>

        </div>

        <div class="sidebar-wrapper">

            <nav class="mt-2">

                <ul class="nav sidebar-menu flex-column"
                    data-lte-toggle="treeview"
                    role="menu"
                    data-accordion="false">

                    <li class="nav-item">

                        <a href="{{ url('/') }}" class="nav-link">

                            <i class="nav-icon fas fa-tachometer-alt"></i>

                            <p>Dashboard</p>

                        </a>

                    </li>

                    <li class="nav-item">
      <a href="{{ route('clientes.index') }}" class="nav-link {{ request()->routeIs('clientes.*') ? 'active' : '' }}">
           <i class="nav-icon fas fa-users"></i>
             <p>Clientes</p>
         </a>
</li>
 

                    {{-- Agrega más opciones aquí --}}

                </ul>

            </nav>

        </div>

    </aside>

    {{-- Contenido principal --}}
    <main class="app-main">

        <div class="app-content-header">

            <div class="container-fluid">

                <h3 class="mb-0">
                    @yield('page_title', 'Dashboard')
                </h3>

            </div>

        </div>

        <div class="app-content">

            <div class="container-fluid">

                @yield('content')

            </div>

        </div>

    </main>

    {{-- Footer --}}
    <footer class="app-footer">

        <strong>
            &copy; {{ date('Y') }} Mi Empresa.
        </strong>

        Todos los derechos reservados.

    </footer>

</div>

</body>
</html>
 