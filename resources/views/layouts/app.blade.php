<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.png') }}">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-info navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand hvr-icon-pulse-grow hvr-rotate" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @if(Auth::check())
                    <a class="navbar-brand hvr hvr-icon-bounce hvr-grow-rotate" href="{{ route('portada') }}">
                        Portada
                    </a>
                    <a class="navbar-brand hvr-icon-grow hvr-grow-rotate" href="{{ route('usuaris.llistat') }}">
                        Llistat d'usuaris
                    </a>
                    <a class="navbar-brand hvr hvr-icon-rotate hvr-grow-rotate" href="{{ route('usuaris.pdf') }}">
                        Generar PDF's
                    </a>
                    @if(Auth::user()->admin)
                        <a class="navbar-brand hvr hvr-icon-buzz-out hvr-grow-rotate" href="{{ route('admin.llistat') }}">
                            <span style="color: darkred">
                                Llistat admins
                            </span>
                        </a>
                        <a class="navbar-brand hvr hvr-icon-buzz-out hvr-grow-rotate" href="{{ route('admin.suggeriments') }}">
                            <span style="color: darkred">
                                Suggeriments
                            </span>
                        </a>
                        <a class="navbar-brand hvr hvr-icon-buzz-out hvr-grow-rotate" href="{{ route('admin.tauler') }}">
                            <span style="color: darkred">
                                Tauler
                            </span>
                        </a>
                    @else
                        <a class="navbar-brand hvr hvr-icon-float-away hvr-grow-rotate" href="{{ route('usuaris.enviarSuggeriments') }}">
                            Contacta
                        </a>
                    @endif
                @endif
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Registre</a></li>
                    @else
                        <li class="dropdown">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown" data-toggle="dropdown">
                                        <img src="/perfils/avatars/{{ Auth::user()->avatar }}" style="width: 25px; height: 25px; float: left; border-radius: 50%">
                                        <span class="hvr hvr-icon-hang hvr-grow-rotate"><strong>{{ Auth::user()->name }}</strong></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="navbar-login">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <p class="text-center">
                                                            <a href="{{ url('/usuaris/'.Auth::user()->id) }}">
                                                                <img src="/perfils/avatars/{{ Auth::user()->avatar }}" style="width: 100px; height: 100px; float: left; border-radius: 50%">
                                                            </a>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <p class="text-left"><strong>{{ Auth::user()->name }}</strong> |
                                                            @if(Auth::user()->admin)
                                                                <span class="label label-primary">
                                                                    <span class="hvr-buzz-out">Administrador</span>
                                                                </span>
                                                            @else(!Auth::user()->admin)
                                                                <span class="label label-primary">
                                                                    <span class="hvr-buzz-out">Membre</span>
                                                                </span>
                                                            @endif
                                                        </p>
                                                        <p class="text-left small">{{ Auth::user()->email }}</p>
                                                        <p class="text-left">
                                                            <a href="{{ route('usuaris.editar', Auth::user()->id) }}" class="btn btn-primary btn-block btn-sm">
                                                                <span class="hvr hvr-icon-spin">
                                                                    Actualitzar dades
                                                                </span>
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="navbar-login navbar-login-session">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <p>
                                                            <a href="{{ url('/logout') }}"
                                                               onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();" class="btn btn-info btn-block">
                                                                <span class="hvr-icon-buzz-out">
                                                                    Tancar sessió
                                                                </span>
                                                            </a>
                                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;" >
                                                            {{ csrf_field() }}
                                                        </form>
                                                        </p>
                                                        <hr>
                                                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal">Esborrar usuari</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</div>
<!-- Estils -->
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('hover/css/hover.css') }}">
<link rel="stylesheet" href="{{ asset('sweetalert/dist/sweetalert.css') }}">

<!-- Scripts -->

<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>

<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bootstrap/jquery/jquery-3.1.1.min.js') }}"></script>

<script src="{{ asset('sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="/js/app.js"></script>

@include('sweet::alert')
</body>
<footer>
    @yield('footer')
        <div class="container">
            <div class="pull-right">
                <nav class="navbar" style="background:transparent; color: black;">
                    <nav class="nav navbar-nav pull-xs-left">
                        <a class="nav-item nav-link" href="/"></a>
                        <p class="h6">
                            Pàgina creada per Ismail Didouh
                        </p>
                        <span class="label label-info">{{\App\User::count()}} usuaris registrats</span>
                    </nav>
                </nav>
            </div>

            <a><i class="fa fa-facebook-official fa-2x"></i></a>
            <a><i class="fa fa-pinterest-p fa-2x"></i></a>
            <a><i class="fa fa-twitter fa-2x"></i></a>
            <a><i class="fa fa-flickr fa-2x"></i></a>
            <a><i class="fa fa-linkedin fa-2x"></i></a>
        </div>

    @if(Auth::check())
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Segur que vols esborrar el teu perfil?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('usuaris.esborrar', Auth::user()->id ) }}" class="btn btn-danger" style="float: left">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                                <h4>SÍ, ESBORRAR EL MEU PERFIL</h4>
                            </button>
                        </a>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><h4>No!</h4></button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</footer>
</html>


