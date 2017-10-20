@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h1 class="page-header">Listado de Profesores <a href="profesor/create"><button class="btn btn-success">Nuevo</button></a></h1>
		@include('admin.profesor.search')
	</div>	
	
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Cardex</th>
					<th>Email</th>
					<th></th>
				</thead>
				@foreach ($profesores as $pro)
				<tr>
					<td>{{ $pro->id_profesores}}</td>
					<td>{{ $pro->name}}</td>
					<td>{{ $pro->cardex}}</td>
					<td>{{ $pro->email}}</td>
					<td>
					<a href="{{URL::action('ProfesorController@edit',$pro->id_profesores)}} "><button class="btn btn-info btn">Modificar</button></a>
					<td>	
					<form action="{{route('profesor.destroy', $pro->id_profesores) }}" method="POST">
		 		{{ csrf_field() }}
		 			<input type="hidden" name="_method" value="DELETE">
		 			<button type="submit" name="" class="btn btn-danger btn" value="Eliminar">Eliminar</button> 

		 		</form>					 
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$profesores->render()}}
	</div>
</div>

@stop