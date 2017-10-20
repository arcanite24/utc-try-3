@extends('layouts.superUser')
@section('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h1 class="page-header">Listado de carreraas <a href="carrera/create"><button class="btn btn-success">Nuevo</button></a></h1>
		@include('superUser.carrera.search')
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
				@foreach ($carreras as $carr)
				<tr>
					<td>{{ $carr->id_carrera}}</td>
					<td>{{ $carr->descripcionc}}</td>
					<td>
					<a href="{{URL::action('CarreraController@edit',$carr->id_carrera)}} "><button class="btn btn-info btn-xs">Modificar</button></a>
					
    				</td>
    				<td>
					<form action="{{route('carrera.destroy', $carr->id_carrera) }}" method="POST">
		 		{{ csrf_field() }}
		 			<input type="hidden" name="_method" value="DELETE">
		 			<button type="submit" name="" class="btn btn-danger btn-xs" value="Eliminar">Eliminar</button> 

		 		</form>					 
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$carreras->render()}}
	</div>
</div>

@stop