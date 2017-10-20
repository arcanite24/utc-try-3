@extends('layouts.superUser')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h1 class="page-header">Listado de Grupos <a href="grupo/create"><button class="btn btn-success">Nuevo</button></a></h1>
		@include('superUser.grupo.search')
	</div>	
	
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
            
					<th>Id</th>
					<th>Descripcion</th>
					<th>Turno</th>
					<th>Carrera</th>
					<th>Nivel</th>
					<th>Cuatrimestre</th>
					<th></th>
				</thead>
				@foreach ($grupos as $gru)
				<tr>
					<td>{{ $gru->id_grupos}}</td>
					<td>{{ $gru->descripciong}}</td>
					<td>{{ $gru->descripciont}}</td>
					<td>{{ $gru->descripcionc}}</td>
					<td>{{ $gru->descripcionn}}</td>
					<td>{{ $gru->descripcioncu}}</td>

					<td>
					<a href="{{URL::action('GrupoController@edit',$gru->id_grupos)}} "><button class="btn btn-info btn">Modificar</button></a>
			
					</td>
					<td>	
					<form action="{{route('grupo.destroy', $gru->id_grupos)}}" method="POST">
		 		{{ csrf_field() }}
		 			<input type="hidden" name="_method" value="DELETE">
		 			<button type="submit" name="" class="btn btn-danger btn" value="Eliminar">Eliminar</button> 

		 		</form>					 
					</td>
				</tr>
				@include('superUser.grupo.modal')
				@endforeach
			</table>
		</div>
		{{$grupos->render()}}
	</div>
</div>

@stop