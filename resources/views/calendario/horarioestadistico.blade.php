@extends('layouts.app22')

@section('content')
<link href="{{ asset1('fullcalendar/fullcalendar.min.css') }}" rel='stylesheet' />
<link href="{{ asset1('fullcalendar/fullcalendar.print.min.css') }}" rel='stylesheet' media='print' />


<script src="{{asset1('fullcalendar/lib/moment.min.js')}}"/></script>
<script src="{{asset1('fullcalendar/lib/jquery.min.js')}}"/></script>
<script src="{{asset1('fullcalendar/fullcalendar.min.js')}}"/></script>


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel='stylesheet' media='print' />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>







<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generar Nuevo Horario</div>

                <div class="panel-body">
                    Generar Horarios por Estadistica
                </div>
				<button type="submit" class="btn btn-primary" onclick="location.href='/admin/calendario/automatico'">Generar Automaticamente</button>
				<button type="submit" class="btn btn-danger" onclick="location.href='/admin/calendario/estadistico'">Generar por Estadisticas</button>
				<button type="submit" class="btn btn-success" onclick="location.href='/admin/calendario/manual'">Generar Manualmente</button>
				
				<div class="container ">
 				<label>Reglas de generacion</label>
				<select class="form-control"  style="max-width:40%;"  >
				<option>Aleatorio</option>
				<option>Mas reprobadas primero</option>
				 <option>Mas reprobadas al ultimo</option>
				 <option>Menos reprobados primero</option>
				 <option>Menos rerpobados al ultimo</option>
				 <option>Mas reprobadas enmedio</option>
				<option>Menos reprobadas enmedio</option>
				</select></div>
				
						<div class="container ">
 				<label>Seleccionar plantel</label>
				<select class="form-control"  style="max-width:40%;"  >
				<option>Todos</option>
				<option>Zona Rosa</option>
				 <option>Toluca</option>
				 <option>Coacalco</option>
				 <option>Atizapan</option>
				 <option>Neza</option>
				<option>Chalco</option>
				<option>Cuautitlan</option>
				</select></div>
				
				<div class="container ">
 				<label>Seleccionar Nivel</label>
				<select class="form-control"  style="max-width:40%;"  >
				<option>Todos</option>
				<option>Bachillerato</option>
				<option>Licenciatura</option>
				<option>Maestria</option>
					</select>
				</div>
				
				
				<div class="container ">
 				<label>Seleccionar Carrera</label>
				<select class="form-control"  style="max-width:40%;"  >
				<option>Todos</option>
				<option>Administracion</option>
				 <option>Contaduria</option>
				 <option>Derecho</option>
				 <option>Diseño</option>
				 <option>Sistemas</option>
				<option>Pedagogia</option>
				<option>Turismo</option>
				</select></div>
				
				
				<div class="container ">
 				<label>Seleccionar Turno</label>
				<select class="form-control"  style="max-width:40%;"  >
				<option>Todos</option>
				<option>Matutino</option>
				 <option>Vespertino</option>
				 <option>Ambos</option>
				</select></div>

				
				
				
				<br><br>			
				<button type="submit" class="btn btn-success" onclick="location.href='/admin/calendario/manual'">Generar Pdf</button>
	
            </div>

        </div>
    </div>
</div>


<?php
echo"<div id='calendar'></div>";
?>



@endsection