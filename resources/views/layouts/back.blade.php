<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <!-- <link rel="icon" type="image/png" href="assets/img/favicon.ico"> -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Admi</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="/assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="/assets/css/demo.css" rel="stylesheet" />


        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-color="azure" data-image="assets/img/sidebar.jpg">

                <!--

Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
Tip 2: you can also add an image using data-image tag

-->

                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="#" class="simple-text">
                            Admi
                        </a>
                    </div>
                    <ul class="nav">
                    @if (Auth::check() && Auth::user()->email == 'liao2512@gmail.com')
                        <li>
                            <a href="{{ route('categories.index') }}">
                                <i class="pe-7s-menu"></i>
                                <p>Categorías</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="pe-7s-piggy"></i>
                                <p>Pagos</p>
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('categories.index') }}">
                                <i class="pe-7s-menu"></i>
                                <p>Ver Cursos</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="pe-7s-check"></i>
                                <p>Mis Inscripciones</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="pe-7s-piggy"></i>
                                <p>Pagar</p>
                            </a>
                        </li>
                    @endif
                        <li>
                            <a href="#">
                                <i class="pe-7s-umbrella"></i>
                                <p>Ayuda</p>
                            </a>
                        </li>
                        <li class="active-pro">
                            <a href="#">
                                <i class="pe-7s-rocket"></i>
                                <p>Repotencia tu Negocio</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"></a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                @if (Auth::guest())
                                    <li><a href="{{ url('/login') }}">Ingresar</a></li>
                                    <li><a href="{{ url('/register') }}">Registrarse</a></li>
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
            
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>

                @yield('content')

                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul>
                                <li>
                                    <a href="#">
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <p class="copyright pull-right">
                            Por <a href="#">Decktra C.A.</a>
                        </p>
                    </div>
                </footer>

            </div>
        </div>


    </body>

    <!--   Core JS Files   -->
    <script src="/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
    
    <!--     Angular     -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script src="/js/app.js"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="/assets/js/bootstrap-checkbox-radio-switch.js"></script>

</html>
