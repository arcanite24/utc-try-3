@if(isset($noticia))
<form class="form-horizontal" role="form" method="POST" action="{{ route('noticias.update', $noticia->id) }}" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT">
<input type="text" type="hide" value="{{ $noticia->urlImg }}" name="img">


{{ csrf_field() }}
	<div class="form-group">
		<label for="titulo" class="col-sm-2 control-label">titulo</label>
		<div class="col-sm-10">
			<input type="text" name="titulo" class="form-control" value="{{ $noticia->titulo}}">
			@if($errors->has('titulo'))
				<span style="color:red;"> {{ $errors->first('titulo') }} </span>
			@endif
	</div>
</div>
<div class="form-group">
		<label for="descripcion" class="col-sm-2 control-label">descripcion</label>
		<div class="col-sm-10">
			<textarea type="text" name="descripcion" class="form-control"  >{{ $noticia->descripcion}}</textarea>
			@if($errors->has('descripcion'))
				<span style="color:red;"> {{ $errors->first('descripcion') }} </span>
			@endif
	</div>
</div>
<div class="form-group">
		<label for="urlImg" class="col-sm-2 control-label">imagen</label>
		<div class="col-sm-10">
			<input type="file" name="urlImg"  class="form-control">
	</div>
</div>
<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-warning">Modificar</button>
	</div>
</div>



</form>
@endif