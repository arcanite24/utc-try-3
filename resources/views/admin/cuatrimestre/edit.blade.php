@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cuatrimestre:{{$cuatrimestre->descripcion}} </h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach	
				</ul>
			</div>
			@endif

			{!!Form::model($cuatrimestre,['method'=>'PATCH','route'=>['cuatrimestre.update',$cuatrimestre->id_cuatrimestre]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombre">Cuatrimestre</label>
				<input type="text" name="descripcioncu" class="form-control" value="{{$cuatrimestre->descripcioncu}}" placeholder="Descripción..."></input>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
			{!!Form::close()!!}
		</div>	
	</div>

@endsection