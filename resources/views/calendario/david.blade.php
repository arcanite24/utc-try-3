@extends('layouts.app2')
@section('content')


<div class="panel-heading">
    <div class="content">
            <div class="container-fluid">
			<div class="col-md-8">
                        <div class="card">
							<center>
		<div class="panel-heading">Cifrado David</div></center>
					</div>
				</div>
				<center>
				<div class="col-md-8">
                        <div class="card">
                <a href="#" id="b1">
				<button class="btn btn-primary" >Verificar llave</button>
				</a>		
				<a href="#" id="b2">			
				<button class="btn btn-danger">Cifrar</button>
				</a>			
				<a href="#" id="b3">			
				<button class="btn btn-success">Descifrar</button>
				</a>	
						</div>
				</div>
				</center>
    	</div>
		
		<div id="f1" style="display: none;">
                            <div class="container">
                                <form method="post" action="{{ url('david_llave') }}">
                                    {!! csrf_field() !!}
                                    <hr>
                                    <label>LLave</label>
                                    <input type="text" name="llave" class="form-control" maxlength="4">
                                    <br>
                                   <input type="submit" value="Verificar" class="form-control success">
                               </form>
                            </div>
                        </div>
		
		<div id="f2" style="display: none;">
                            <div class="container">
                                <form method="post" action="{{ url('david_cifrar') }}">
                                    {!! csrf_field() !!}
                                    <hr>
                                    <label>LLave</label>
                                    <input type="text" name="llave" class="form-control" maxlength="4">
                                    <br>
									<label>Mensaje a cifrar</label>
                                    <input type="text" name="llave" class="form-control" maxlength="4">
                                   <input type="submit" value="Cifrar" class="form-control success">
                               </form>
                            </div>
                        </div>
		<div id="f3" style="display: none;">
                            <div class="container">
                                <form method="post" action="{{ url('david_descifrar') }}">
                                    {!! csrf_field() !!}
                                    <hr>
                                    <label>LLave</label>
                                    <input type="text" name="llave" class="form-control" maxlength="4">
                                    <br>
									<label>Mensaje a descifrar</label>
                                    <input type="text" name="llave" class="form-control" maxlength="4">
                                    <br>
                                   <input type="submit" value="Descifrar" class="form-control success">
                               </form>
                            </div>
                        </div>

		<?php if (!empty($c1)) { ?>
                         <div id="s1" style="display: initial;
                         ;">
                            <div class="container">
                                    {!! csrf_field() !!}
                                    <hr>
                                    <h2>Mensaje Cifrado{{$c1}}</h2>
                            </div>
                        </div>
                        <?php } ?>
		
		<?php if (!empty($d1)) { ?>
                         <div id="s1" style="display: initial;
                         ;">
                            <div class="container">
                                    {!! csrf_field() !!}
                                    <hr>
                                    <h2>Mensaje Descifrado {{$d1}}</h2>
                            </div>
                        </div>
                        <?php } ?>
		
	</div>                        
</div>
<script type="text/javascript">
$('#b1').click(function(){
	$('#f1').fadeToggle('slow');
	$('#f2').css("display", "none");
	$('#f3').css("display", "none");
});
$('#b2').click(function(){
	$('#f2').fadeToggle('slow');
	$('#f1').css("display", "none");
	$('#f3').css("display", "none");
});	
$('#b3').click(function(){
	$('#f3').fadeToggle('slow');
	$('#f1').css("display", "none");
	$('#f2').css("display", "none");
});	
</script>

@endsection