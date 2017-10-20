<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    <title>Gestion Escolar | UTC</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- <link href="/css/bootstrap.css" rel="stylesheet"> -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-theme.css" rel="stylesheet">
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="/css/footer-distributed.css" rel="stylesheet">
    <script src="/js/valnum.js"></script>


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script> 

    <style type="text/css">
   .inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}
body{
    background: #f2f2f2;
    }
    </style>
}
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

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar">
                    <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Session::get('nombre') }} <span class="caret"></span>
                                </a>
                                 <ul class="dropdown-menu" role="menu">
                                 <li>
                                     <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"> Cerrar Sesión
                                         </a>
                                         <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                             {{ csrf_field() }}
                                         </form>
                                         
                                 </li>
                                 </ul>
                    </li>
                </div>
                </ul>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">Gestion Escolar | UTC </a>
                    
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/bootstrap.min.js"></script>

</body>
</html>
