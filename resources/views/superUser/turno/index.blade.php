@extends('layouts.superUser')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h1 class="page-header">Listado de Turnos <a href="turno/create"><button class="btn btn-success">Nuevo</button></a></h1>
		@include('superUser.turno.search')
	</div>	
	
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Descripción</th>
					<th></th>
				</thead>
				@foreach ($turnos as $tur)
				<tr>
					<td>{{ $tur->id_turno}}</td>
					<td>{{ $tur->descripciont}}</td>
					<td>
					<a href="{{URL::action('TurnoController@edit',$tur->id_turno)}} "><button class="btn btn-info btn">Modificar</button></a>
					
					</td>
					<td>	
					<form action="{{route('turno.destroy', $tur->id_turno) }}" method="POST">
		 		{{ csrf_field() }}
		 			<input type="hidden" name="_method" value="DELETE">
		 			<button type="submit" name="" class="btn btn-danger btn" value="Eliminar">Eliminar</button> 

		 		</form>					 
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$turnos->render()}}
	</div>
</div>

@stop