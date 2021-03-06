@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Alumno</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach	
				</ul>
			</div>
			@endif
		</div>
	</div>	

{!!Form::open(array('url'=>'admin/alumno','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label for="name">Nombre</label>
					<input type="text" name="name" class="form-control" required value="{{old('name')}} " placeholder="Nombre..."></input>
				</div>		
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" required value="{{old('email')}} " placeholder="Email..."></input>
				</div>	
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label>Grupo</label>
					<select name="id_grupos" class="form-control">
						@foreach($grupos as $gru)
							<option value="{{$gru->id_grupos}} ">{{$gru->descripciong}} </option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label for="matricula">Matricula</label>
					<input type="text" name="matricula" class="form-control" required value="{{old('matricula')}} " placeholder="Matricula..."></input>
				</div>	
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<label for="password">Password</label>
						<input id="password" type="password" name="password" class="form-control" required  placeholder="Password..."></input>
					</div>	
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<label for="password">Confirmar Password</label>
						<input id="password-confirm" type="password" name="password_confirmation" class="form-control" required placeholder="Confirme Password..."></input>
					</div>	
				
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					
				</div>
			</div>

	
	<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12"></div>

<div class="form-group col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
	<div class="col-lg-12"></div>
		<div class="col-lg-4"></div>
	<div class="col-lg-8">
		<a href="/admin/alumno"><button class="btn btn-sm btn-success" type="button">Regresar a pagína anterior</button></a>
			</div>				

	</div>
{!!Form::close()!!}

@endsection