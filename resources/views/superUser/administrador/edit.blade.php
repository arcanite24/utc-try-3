@extends('layouts.superUser')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Administrador:{{$administrador->name}} </h3>
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

			{!!Form::model($administrador,['method'=>'PATCH','route'=>['administrador.update',$administrador->id_administrador]])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label for="nombre">Nombre</label>
					<input type="text" name="name" class="form-control" required value="{{$administrador->name}} " placeholder="Nombre..."></input>
				</div>	
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label for="cardex">Cardex</label>
					<input type="text" name="cardex" class="form-control" required value="{{$administrador->cardex}}"></input>
				</div>	
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label for="emailEdit">Email</label>
					<input type="text" name="emailEdit" class="form-control" required value="{{$administrador->email}} " ></input>
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
					<label>Plantel</label>
					<select name="id_plantel" class="form-control">
						@foreach($planteles as $pla)
							@if($pla->id_plantel==$administrador->id_plantel)
							<option value="{{$pla->id_plantel}}" selected> {{$pla->descripcion}} </option>
							@else
							<option value="{{$pla->id_plantel}}"> {{$pla->descripcion}} </option>
							@endif
						@endforeach
					</select>
				</div>
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label>Tipo Administrador</label>
					<select name="id_tipoAdmin" class="form-control">
						@foreach($tipoAdmins as $tip)
							@if($tip->id_tipoAdmin==$administrador->id_tipoAdmin)
							<option value="{{$tip->id_tipoAdmin}}" selected>{{$tip->descripcionTipoAdmin}} </option>
							@else
							<option value="{{$tip->id_tipoAdmin}}"> {{$tip->descripcionTipoAdmin}} </option>
							@endif
						@endforeach
					</select>
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
		<a href="/superUser/administrador"><button class="btn btn-sm btn-success" type="button">Regresar a pagína anterior</button></a>
			</div>				

	</div>

			
			{!!Form::close()!!}
		
@endsection