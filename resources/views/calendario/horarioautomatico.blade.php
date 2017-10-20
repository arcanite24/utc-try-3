@extends('layouts.app22')

@section('content')
<link href="{{ asset1('fullcalendar/fullcalendar.min.css') }}" rel='stylesheet' />
<link href="{{ asset1('fullcalendar/fullcalendar.print.min.css') }}" rel='stylesheet' media='print' />
<script src="{{asset1('fullcalendar/lib/moment.min.js')}}"/></script>
<script src="{{asset1('fullcalendar/lib/jquery.min.js')}}"/></script>
<script src="{{asset1('fullcalendar/fullcalendar.min.js')}}"/></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel='stylesheet' media='print' />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="assets1/js/bootstrap-notify.js"></script>

<script type="text/javascript">
    	function aiuda(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-info',
            	message: "<b>{{ Auth::user()->name }}</b>, solo presione click y el sistema generara un horario adecuado."

            },{
                type: 'info',
                timer: 4000
            });

    	}
	</script>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generar Nuevo Horario</div>

                <div class="panel-body">
                    Generacion Automatica de Horarios
                </div>
				<button type="submit" class="btn btn-primary" onclick="location.href='/admin/calendario/automatico'">Generar Automaticamente</button>
				<!-- 
				<button type="submit" class="btn btn-danger" onclick="location.href='/estadistico'">Generar por Estadisticas</button>
				<button type="submit" class="btn btn-success" onclick="location.href='/manual'">Generar Manualmente</button>
				-->
				<button class="btn btn-success" onclick="aiuda()">Como funciona?</button>
				
				
				
				<form action="/admin/calendario/pdfview">
				<div class="container ">
 				<label>Seleccionar plantel</label>
				<select class="form-control"  style="max-width:40%;" name="plantel"  >
				<option value="todo">Todos</option>
					@foreach($planteles as $plantel)
					<option value="{{$plantel->descripcion}}">{{$plantel->descripcion}}</option>
					@endforeach
					
				</select></div>
				
				<div class="container ">
 				<label>Seleccionar Nivel</label>
				<select class="form-control"  style="max-width:40%;"  name="nivel">
				<option value="todo">Todos</option>
					
				@foreach($niveles as $nivel)
					<option value="{{$nivel->descripcion}}">{{$nivel->descripcion}}</option>
				@endforeach
					
					</select>
				</div>
				
				
				<div class="container ">
 				<label>Seleccionar Carrera</label>
				<select class="form-control"  style="max-width:40%;" name="carrera" >
				<option value="todo">Todos</option>
				
				@foreach($carreras as $carrera)
					<option value="{{$carrera->descripcion}}">{{$carrera->descripcion}}</option>
				@endforeach
					
				</select></div>
				
				
				<div class="container ">
 				<label>Seleccionar Turno</label>
				<select class="form-control"  style="max-width:40%;"  name="turno">
				<option value="todo">Todos</option>
					
				@foreach($turnos as $turno)
					<option value="{{$turno->descripcion}}">{{$turno->descripcion}}</option>
				@endforeach	
					
				</select></div>
				
				<br>
				<br>
				
			<button type="submit" class="btn btn-success" >Generar Pdf</button>
	
			</div>
			
				
				</form>
				
								
			
				
			
			
		</div>
    </div>


@endsection