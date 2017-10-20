@extends('layouts.app22')

@section('content')
<link href="{{ asset1('fullcalendar/fullcalendar.min.css') }}" rel='stylesheet' />
<link href="{{ asset1('fullcalendar/fullcalendar.print.min.css') }}" rel='stylesheet' media='print' />


<script src="{{asset1('fullcalendar/lib/moment.min.js')}}"/></script>
<script src="{{asset1('fullcalendar/lib/jquery.min.js')}}"/></script>
<script src="{{asset1('fullcalendar/fullcalendar.min.js')}}"/></script>


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel='stylesheet' media='print' />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>

	$(document).ready(function() {
		//inicializando el calendario
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			defaultDate: '2017-06-12',
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			 weekends: false,
			defaultView:'agendaWeek',
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'Examenes finales',
					start: '2017-12-06'
				},
				{
					title: 'Calculo 1',
					start: '2017-06-12',
					end: '2017-06-12'
				},
				{
					id: 999,
					title: 'Administracion 1',
					start: '2017-06-13',
					end: '2017-06-13'
				},
				{
					id: 999,
					title: 'Metodologia de la investigacion',
					start: '2017-06-13',
					end: '2017-06-13'
				},
				{
					title: 'Geometria Analitica',
					start: '2017-06-14',
					end: '2017-06-14'
				},
				{
					title: 'Física I',
					start: '2017-06-14',
					end: '2017-06-14'
				},
				{
					title: 'Álgebra I',
					start: '2017-06-15',
					end: '2017-06-15'
				}
			]
		});
		
	});

</script>
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
                    Generar Horarios manualmente
                </div>
				<button type="submit" class="btn btn-primary" onclick="location.href='/admin/calendario/automatico'">Generar Automaticamente</button>
				<button type="submit" class="btn btn-danger" onclick="location.href='/admin/calendario/estadistico'">Generar por Estadisticas</button>
				<button type="submit" class="btn btn-success" onclick="location.href='7admin/calendario/manual'">Generar Manualmente</button>
				
				
				<div class="container ">
 				<label>Seleccionar plantel</label>
				<select class="form-control"  style="max-width:40%;"  >
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
				<option>Bachillerato</option>
				 <option>Licenciatura</option>
				 <option>Maestria</option>
					</select>
				</div>
				
				
				<div class="container ">
 				<label>Seleccionar Carrera</label>
				<select class="form-control"  style="max-width:40%;"  >
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