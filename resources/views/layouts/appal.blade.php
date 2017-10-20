<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Alumnos | UTC</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet"> 
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style_alumno.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-1.11.1.js')}}"></script>
    <script src="{{asset('js/query-1.11.1.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>

    <!-- Scripts -->

    <style type="text/css">
   .inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="position: fixed; top:0; width: 100%;">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">A l u m n o s | U T C </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Session::get('nombrea') }} <span class="caret"></span>
                                </a>
                                 <ul class="dropdown-menu" role="menu">
                                 <li>
                                     <a href="{{ url('/logout_alumno') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"> Cerrar Sesión
                                         </a>

                                         <form id="logout-form" action="{{ url('/logout_alumno') }}" method="POST" style="display: none;">
                                             {{ csrf_field() }}
                                         </form>
                                 </li>
                                 </ul>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
