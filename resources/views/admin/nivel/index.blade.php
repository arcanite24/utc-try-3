@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h1 class="page-header">Listado de Niveles <a href="nivel/create"><button class="btn btn-success">Nuevo</button></a></h1>
		@include('admin.nivel.search')
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
				@foreach ($niveles as $niv)
				<tr>
					<td>{{ $niv->id_nivel}}</td>
					<td>{{ $niv->descripcionn}}</td>
					<td>
					<a href="{{URL::action('NivelController@edit',$niv->id_nivel)}} "><button class="btn btn-info btn">Modificar</button></a>
					<!--[if lt IE 9]>
       <a href="" data-target="#modal-delete-{{$niv->id_nivel}}" data-toggle="modal" ><button class="btn btn-danger">Eliminar</button></a> 
    <![endif]-->	
					</td>
					<td>	
					<form action="{{route('plantel.destroy', $niv->id_nivel) }}" method="POST">
		 		{{ csrf_field() }}
		 			<input type="hidden" name="_method" value="DELETE">
		 			<button type="submit" name="" class="btn btn-danger btn" value="Eliminar">Eliminar</button> 

		 		</form>					 
					</td>
				</tr>
				@include('admin.nivel.modal')
				@endforeach
			</table>
		</div>
		{{$niveles->render()}}
	</div>
</div>

@stop