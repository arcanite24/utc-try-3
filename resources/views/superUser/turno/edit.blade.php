@extends('layouts.superUser')
@section('contenido')
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Editar Turno:{{$turno->descripcion}} </h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach	
				</ul>
			</div>
			@endif

			{!!Form::model($turno,['method'=>'PATCH','route'=>['turno.update',$turno->id_turno]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="descripciont" class="form-control" value="{{$turno->descripciont}}" placeholder="Descripción..."></input>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
			{!!Form::close()!!}
		
	

@stop