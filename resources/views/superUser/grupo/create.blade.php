@extends('layouts.superUser')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Grupo</h3>
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

{!!Form::open(array('url'=>'superUser/grupo','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label for="descripciong">Descripcion</label>
					<input type="text" name="descripciong" class="form-control" required value="{{old('descripciong')}} " placeholder="Descripcion..."></input>
				</div>	
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label>Turno</label>
					<select name="id_turno" class="form-control">
						@foreach($turnos as $tur)
							<option value="{{$tur->id_turno}} ">{{$tur->descripciont}} </option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label>Carrera</label>
					<select name="id_carrera" class="form-control">
						@foreach($carreras as $car)
							<option value="{{$car->id_carrera}} ">{{$car->descripcionc}} </option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label>Nivel</label>
					<select name="id_nivel" class="form-control">
						@foreach($niveles as $niv)
							<option value="{{$niv->id_nivel}} ">{{$niv->descripcionn}} </option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label>Cuatrimestre</label>
					<select name="id_cuatrimestre" class="form-control">
						@foreach($cuatrimestres as $cua)
							<option value="{{$cua->id_cuatrimestre}} ">{{$cua->descripcioncu}} </option>
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