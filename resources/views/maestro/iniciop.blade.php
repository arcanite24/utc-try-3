
@extends('layouts.prof')
@section('contenido')

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
    </div>

    <div class="container">

    @include('layouts.menu_grupos')


    @if(isset($edit))
        @if($id_nivel == 1)
            @include('layouts.show_bach')
        @elseif($id_nivel == 2)  
            @include('layouts.show')
        @endif
    @else 
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <div id="grafica0" style="width: 100%; min-width: 310px; height: 450px; margin: 0 auto"></div> 
    @endif 
</div>

@endsection



