@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h1 class="page-header">Listado de Administradores <a href="administrador/create"><button class="btn btn-success">Nuevo</button></a></h1>
		@include('admin.administrador.search')
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
					<th>Plantel</th>
					<th>Usuario</th>
					<th></th>
				</thead>
				@foreach ($administradores as $adm)
				<tr>
					<td>{{ $adm->id_administrador}}</td>
					<td>{{ $adm->name}}</td>
					<td>{{ $adm->cardex}}</td>
					<td>{{ $adm->email}}</td>
					<td>{{ $adm->descripcion}}</td>
					<td>{{ $adm->descripcionTipoAdmin}}</td>					
					<td></td>

					<td>
					<a href="{{URL::action('AdministradorController@edit',$adm->id_administrador)}} "><button class="btn btn-info btn">Modificar</button></a>
			
					</td>
					<td>	
					<form action="{{route('administrador.destroy', $adm->id_administrador) }}" method="POST">
		 		{{ csrf_field() }}
		 			<input type="hidden" name="_method" value="DELETE">
		 			<button type="submit" name="" class="btn btn-danger btn" value="Eliminar">Eliminar</button> 

		 		</form>					 
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$administradores->render()}}
	</div>
</div>

@stop