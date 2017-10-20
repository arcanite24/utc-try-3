@extends('layouts.admin')
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

{!!Form::open(array('url'=>'admin/grupoplantel','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="row">
				
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label>grupo</label>
					<select name="id_grupos" class="form-control">
						@foreach($grupos as $gru)
							<option value="{{$gru->id_grupos}} ">{{$gru->descripciong}} </option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<label>grupo</label>
					<select name="id_plantel" class="form-control">
						@foreach($planteles as $pla)
							<option value="{{$pla->id_plantel}} ">{{$pla->descripcion}} </option>
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
		<a href="/admin/grupoplantel"><button class="btn btn-sm btn-success" type="button">Regresar a pagína anterior</button></a>
			</div>				

	</div>
{!!Form::close()!!}

@endsection