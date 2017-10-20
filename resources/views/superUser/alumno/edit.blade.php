@extends('layouts.superUser')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Alumno:{{$alumno->name}} </h3>
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

			{!!Form::model($alumno,['method'=>'PATCH','route'=>['alumno.update',$alumno->id_alumnos]])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label for="name">Nombre</label>
					<input type="text" name="name" class="form-control" required value="{{$alumno->name}} " placeholder="Nombre..."></input>
				</div>
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label for="emailEdit">Email</label>
					<input type="text" name="emailEdit" class="form-control" required value="{{$alumno->email}} " placeholder="Email..."></input>
				</div>	
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label>Grupo</label>
					<select name="id_grupos" class="form-control">
						@foreach($grupos as $gru)
							@if($gru->id_grupos==$alumno->id_grupos)
							<option value="{{$gru->id_grupos}}" selected> {{$gru->descripciong}} </option>
							@else
							<option value="{{$gru->id_grupos}}"> {{$gru->descripciong}} </option>			
							@endif
						@endforeach
					</select>
				</div>
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label for="matricula">Matricula</label>
					<input type="text" name="matricula" class="form-control" value="{{$alumno->matricula}} " placeholder="Matricula..."></input>
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
		<a href="/superUser/alumno"><button class="btn btn-sm btn-success" type="button">Regresar a pagína anterior</button></a>
			</div>				

	</div>

			
			{!!Form::close()!!}
		
@endsection