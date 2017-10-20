@extends('layouts.superUser')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h1 class="page-header">Listado de Alumnos <a href="alumno/create"><button class="btn btn-success">Nuevo</button></a></h1>
		@include('superUser.alumno.search')
	</div>	
	
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
            
					<th>Id</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Grupo</th>
					<th>Matricula</th>
					<th></th>
				</thead>
				@foreach ($alumnos as $alu)
				<tr>
					<td>{{ $alu->id_alumnos}}</td>
					<td>{{ $alu->name}}</td>
					<td>{{ $alu->email}}</td>
					<td>{{ $alu->descripciong}}</td>
					<td>{{ $alu->matricula}}</td>

					<td>
					<a href="{{URL::action('AlumnoController@edit',$alu->id_alumnos)}} "><button class="btn btn-info btn">Modificar</button></a>
			
					</td>
					<td>	
					<form action="{{route('alumno.destroy', $alu->id_alumnos)}}" method="POST">
		 		{{ csrf_field() }}
		 			<input type="hidden" name="_method" value="DELETE">
		 			<button type="submit" name="" class="btn btn-danger btn" value="Eliminar">Eliminar</button> 

		 		</form>					 
					</td>
				</tr>
				@include('superUser.alumno.modal')
				@endforeach
			</table>
		</div>
		{{$alumnos->render()}}
	</div>
</div>

@stop