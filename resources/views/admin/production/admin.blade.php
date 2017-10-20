@extends('layouts.admin')
@section('contenido')

        <!-- page content -->
        <div class="right_col" role="main">
        @include('layouts.admin.menu_top')
        <br>
          <!-- /top tiles -->
        @if($tabla=="alumnos" || $tabla=="alumnos_bach")
            @include('layouts.admin.plantel_alumnos')

        @elseif($tabla=="detalle_alumno" || $tabla=="detalle_alumno_faltas" || $tabla=="detalle_alumno_bach")
            @include('layouts.admin.detalle_alumno')

        @elseif($tabla=="reporte" || $tabla=="reporte_bach")
            @include('layouts.admin.plantel_reporte')   

        @elseif($tabla=="maestros")
            @include('layouts.admin.plantel_maestros')

        @elseif($tabla=="detalle_maestro")
            @include('layouts.admin.detalle_maestro')

        @elseif($tabla=="detalle_graficas")
            @include('layouts.admin.detalle_graficas')

        @elseif($tabla=="detalle_reporte")
            @include('layouts.admin.detalle_reporte')  

        @else
            @include('layouts.admin.vista_activar_parcial')
        
        @endif
      </div>
  

    @if($tabla != "detalle_graficas")
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script> 
    @else
    @endif


@endsection