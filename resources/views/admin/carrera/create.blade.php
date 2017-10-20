@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Carrera</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach	
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'admin/carrera','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombre">Carrera</label>
				<input type="text" name="descripcionc" class="form-control" placeholder="Descripción..."></input>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
			{!!Form::close()!!}
		</div>	
	<div class="col-lg-12"></div>
		<div class="col-lg-4"></div>
	<div class="col-lg-8">
		<a href="/admin/carrera"><button class="btn btn-sm btn-success" type="button">Regresar a pagína anterior</button></a>
			</div>		

	</div>


@endsection