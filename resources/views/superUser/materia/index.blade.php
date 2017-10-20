@extends('layouts.superUser')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h1 class="page-header">Listado de Materias <a href="materia/create"><button class="btn btn-success">Nuevo</button></a></h1>
		@include('superUser.materia.search')
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
				@foreach ($materias as $mat)
				<tr>
					<td>{{ $mat->id_materia}}</td>
					<td>{{ $mat->descripcionm}}</td>
					<td>
					<a href="{{URL::action('MateriaController@edit',$mat->id_materia)}} "><button class="btn btn-info btn">Modificar</button></a>
       	
					</td>
					<td>	
					<form action="{{route('materia.destroy', $mat->id_materia) }}" method="POST">
		 		{{ csrf_field() }}
		 			<input type="hidden" name="_method" value="DELETE">
		 			<button type="submit" name="" class="btn btn-danger btn" value="Eliminar">Eliminar</button> 

		 		</form>					 
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$materias->render()}}
	</div>
</div>

@stop