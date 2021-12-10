<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISTEMA DE PRESTAMO DE EQUIPOS DE COMPUTO</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</head>
<body>
    <div id="wrapper" class="menuDisplayed">
        <div id="app">
            <nav style="height:10vh" class="navbar navbar-expand-lg navbar-dark bg-dark top-fixed">
                <div class="container-fluid">
                    <img src="/img/logoblanco.png"  height="60" alt="">
                    <div class="d-flex flex-row-reverse collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="right navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            @else
                                <li class="nav-item">
                                    <a class="nav-link active btn btn-danger btn-sm rounded-pill" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            @guest
            @else
                <div class="d-flex" id="wrapper">
                    <!-- Sidebar-->
                    <div class="border-end bg-dark" id="sidebar-wrapper">
                        <div class="list-group list-group-flush">
                            <a class="list-group-item list-group-item-action p-3" style="background-color: #94c83d; color: white;" href="{{ route('home') }}">Inicio</a>
                            <a class="list-group-item list-group-item-action bg-dark p-3" style="color: white;" href="{{ route('prestamo.index') }}">Préstamos</a>
                            @if (Auth::user()->hasRole('Admin'))
                            <a class="list-group-item list-group-item-action bg-dark p-3" style="color: white;" href="{{ route('users.index') }}">Usuarios</a>
                            <a class="list-group-item list-group-item-action bg-dark p-3" style="color: white;" href="{{ route('docente.index') }}">Docentes</a>
                            <a class="list-group-item list-group-item-action bg-dark p-3" style="color: white;" href="{{ route('equipo.index') }}">Equipos</a>
                            @endif
                        </div>
                    </div>
            @endguest
            <main class="py-4">
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
