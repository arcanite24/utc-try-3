@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h1 class="page-header">Listado de planteles <a href="plantel/create"><button class="btn btn-success">Nuevo</button></a></h1>
		@include('admin.plantel.search')
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
				@foreach ($planteles as $pla)
				<tr>
					<td>{{ $pla->id_plantel}}</td>
					<td>{{ $pla->descripcion}}</td>
					<td>
					<a href="{{URL::action('PlantelController@edit',$pla->id_plantel)}} "><button class="btn btn-info btn">Modificar</button></a>
					<!--[if lt IE 9]>
       <a href="" data-target="#modal-delete-{{$pla->id_plantel}}" data-toggle="modal" ><button class="btn btn-danger">Eliminar</button></a> 
    <![endif]-->	
					</td>
					<td>	
					<form action="{{route('plantel.destroy', $pla->id_plantel) }}" method="POST">
		 		{{ csrf_field() }}
		 			<input type="hidden" name="_method" value="DELETE">
		 			<button type="submit" name="" class="btn btn-danger btn" value="Eliminar">Eliminar</button> 

		 		</form>					 
					</td>
				</tr>
				@include('admin.plantel.modal')
				@endforeach
			</table>
		</div>
		{{$planteles->render()}}
	</div>
</div>

@stop