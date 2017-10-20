
    <?php $op=false; $parcial_a=0; ?>
	@foreach($alu as $a) 
		@if ($a->id_grupos == $id_grupos)
		    @foreach($faltas_bach as $fal) 
		        @if ($fal->id_faltas_bach == $a->id_alumnos.$id_materias) 
		            <?php $op=true; ?>
		            @break
                @endif
		     @endforeach
		     @break
        @endif
    @endforeach

    @foreach($administrador as $admin) 
		@if ($admin->id == 1) <?php $parcial_a=$admin->parcial_activo_bach ?>
		@endif
    @endforeach

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-0">
<div class="panel panel-primary">
<div class="panel-heading">
<div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1">
<div @if($dias_diferencia<=0) class="alert alert-danger" 
@else  class="alert alert-success"
@endif role="alert"><strong style="font-size: 18px;font-family: cursive;"><center>{{$dias_diferencia}} días restantes</center></strong>
 </div>
</div>
<h2><center>{{ $nivel }}</center></h2>
<hr style="padding: 0; border: none;border-top: medium double #333;color: #333;text-align: center;" >
<h4>
@foreach($grupos as $g) 
	@if ($g->id_grupos == $id_grupos)
	    @foreach($carrera as $c) 
	    @if ($c->id_carrera == $g->id_carrera)
	        @foreach($materia as $m) 
	        @if ($m->id_materias == $id_materias) 
	             {{$c->descripcion}} <p style="float: right;">{{$g->descripcion}} • {{$m->descripcion}}</p>
	        @endif
            @endforeach
	    @endif
        @endforeach
    @endif
@endforeach</h4></div>

<div class="panel-body">
<form role="form" class="form-horizontal" role="form" method="post" 
@if($op==false) action="{{ url('insert_bach') }}" 
@else action="{{ url('update_bach') }}"
@endif enctype="multipart/form-data">
{{ csrf_field() }}
<div class="table-responsive">
<table class="table table-striped" >
	<thead class="bg-success">
	    <th style="text-align: center;">No.</th>
		<th style="text-align: center;">Matricula</th>
		<th style="text-align: center;">Alumno</th>
		<th style="text-align: center;">Parcial 1</th>
		<th style="text-align: center;">Faltas</th>
		<th style="text-align: center;">Parcial 2</th>
		<th style="text-align: center;">Faltas</th>
		<th style="text-align: center;">Parcial 3</th>
		<th style="text-align: center;">Faltas</th>
		<th style="text-align: center;">Parcial 4</th>
		<th style="text-align: center;">Faltas</th>
	</thead>

	   <?php $i=0 ?>
		@foreach($alu as $a) 
		@if ($a->id_grupos == $id_grupos)
		<?php $i++ ?>
		<tr @if($op==true) 
		        class="success"
		     @else
		        class="danger"
		     @endif>
		    <td style="text-align: center;">{{ $i }}</td>
			<td>{{ $a->matricula }}</td>
			<td style="font-size: 12px;">{{ $a->nombre }}</td>

			<td><input step="0.01" class="form-control input-sm" type="number" min="0" max="10" name="parcial1{{$a->id_alumnos}}" id="parcial1{{$a->id_alumnos}}" placeholder="parcial 1" onkeypress="return soloLetras(event);" style="width: 85px;" required @if($parcial_a!=1 || $dias_diferencia<='0') disabled  @endif
			@foreach($calificaciones_bach as $cal) 
		    @if ($cal->id_calificaciones_bach == $a->id_alumnos.$id_materias) value={{$cal->parcial1}} 
		    @endif
		    @endforeach></td>

            <td><select class="form-control input-sm" size="1" name="faltas1{{$a->id_alumnos}}" id="faltas1{{$a->id_alumnos}}" 
            @if($parcial_a!=1 || $dias_diferencia<='0') disabled @endif > 
            @for($o=0;$o<=12;$o++) <?php $f=false; ?>
                @foreach($faltas_bach as $fal)
		        @if ($fal->id_faltas_bach == $a->id_alumnos.$id_materias) 
		           @if( $fal->parcial1 == $o )
                     <option value='{{$o}}' selected >{{$o}}</option> 
                     <?php $f=true; ?>
                    @endif
                    @break
                @endif
		        @endforeach
		        
		        @if($f==false)
		        <option value='{{$o}}'>{{$o}}</option> 
		        @endif

             @endfor
            </select></td>

			<td><input step="0.01" class="form-control input-sm" type="number" min="0" max="10" name="parcial2{{$a->id_alumnos}}" id="parcial2{{$a->id_alumnos}}" size="1" maxlength="4"  placeholder="parcial 2" onkeypress="return soloLetras(event);" style="width: 85px;" required @if($parcial_a!=2 || $dias_diferencia<='0') disabled  @endif
			@foreach($calificaciones_bach as $cal) 
		    @if ($cal->id_calificaciones_bach == $a->id_alumnos.$id_materias) value={{$cal->parcial2}} 
		    @endif
		    @endforeach></td>

            <td><select class="form-control input-sm" size="1" name="faltas2{{$a->id_alumnos}}" id="faltas2{{$a->id_alumnos}}" 
            @if($parcial_a!=2 || $dias_diferencia<='0') disabled @endif >
            @for($o=0;$o<=12;$o++)  <?php $f=false; ?>
                @foreach($faltas_bach as $fal)
		        @if ($fal->id_faltas_bach == $a->id_alumnos.$id_materias) 
		           @if( $fal->parcial2 == $o )
                     <option value='{{$o}}' selected >{{$o}}</option> 
                     <?php $f=true; ?>
                    @endif
                    @break
                @endif
		        @endforeach
		        
		        @if($f==false)
		        <option value='{{$o}}'>{{$o}}</option> 
		        @endif

             @endfor
            </select></td>
            
			<td><input step="0.01" class="form-control input-sm" type="number" min="0" max="10" name="parcial3{{$a->id_alumnos}}" id="parcial3{{$a->id_alumnos}}" size="1" maxlength="4"  placeholder="parcial 3" onkeypress="return soloLetras(event);" style="width: 85px;" required @if($parcial_a!=3 || $dias_diferencia<='0') disabled  @endif
			@foreach($calificaciones_bach as $cal) 
		    @if ($cal->id_calificaciones_bach == $a->id_alumnos.$id_materias) value={{$cal->parcial3}} 
		    @endif
		    @endforeach></td>

            <td><select class="form-control input-sm" size="1" name="faltas3{{$a->id_alumnos}}" id="faltas3{{$a->id_alumnos}}" 
            @if($parcial_a!=3 || $dias_diferencia<='0') disabled @endif >
            @for($o=0;$o<=12;$o++) <?php $f=false; ?>
                @foreach($faltas_bach as $fal)
		        @if ($fal->id_faltas_bach == $a->id_alumnos.$id_materias) 
		           @if( $fal->parcial3 == $o )
		              <option value='{{$o}}' selected >{{$o}}</option>
                      <?php $f=true; ?>
                    @endif
                    @break
                @endif
		        @endforeach

		        @if($f==false)
		        <option value='{{$o}}'>{{$o}}</option> 
		        @endif

             @endfor
            </select></td>

            <td><input step="0.01" class="form-control input-sm" type="number" min="0" max="10" name="parcial4{{$a->id_alumnos}}" id="parcial4{{$a->id_alumnos}}" size="1" maxlength="4"  placeholder="parcial 3" onkeypress="return soloLetras(event);" style="width: 85px;" required @if($parcial_a!=4 || $dias_diferencia<='0') disabled  @endif
			@foreach($calificaciones_bach as $cal) 
		    @if ($cal->id_calificaciones_bach == $a->id_alumnos.$id_materias) value={{$cal->parcial4}} 
		    @endif
		    @endforeach></td>

            <td><select class="form-control input-sm" size="1" name="faltas4{{$a->id_alumnos}}" id="faltas4{{$a->id_alumnos}}" 
            @if($parcial_a!=4 || $dias_diferencia<='0') disabled @endif >
            @for($o=0;$o<=12;$o++) <?php $f=false; ?>
                @foreach($faltas_bach as $fal)
		        @if ($fal->id_faltas_bach == $a->id_alumnos.$id_materias) 
		           @if( $fal->parcial4 == $o )
		              <option value='{{$o}}' selected >{{$o}}</option>
                      <?php $f=true; ?>
                    @endif
                    @break
                @endif
		        @endforeach

		        @if($f==false)
		        <option value='{{$o}}'>{{$o}}</option> 
		        @endif

             @endfor
            </select></td>
            
     
			<input name="{{$i}}" type="hidden" value="{{ $a->id_alumnos }}" >
			<input name="alumno{{$i}}" type="hidden" value="{{ $a->matricula }}" >
			<input name="id_grupos" type="hidden" value="{{ $id_grupos }}" >
 		</tr>
 		@endif
		@endforeach
		<tr>
		    <td></td>
		</tr>
		<tr>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    <input name="i" type="hidden" value="{{ $i }}" >
		    <input name="id_materias" type="hidden" value="{{ $id_materias }}" >
		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		    @if($dias_diferencia>'0')
		    @if($op==false)
		    <td colspan="3"><input type="submit" class="btn btn-success btn-md" value="G u a r d a r . ✓ " style="margin-top: 10px;" /></td>
		    @else
		    <td colspan="3"><input type="submit" id="cambios" class="btn btn-success btn-md" value="Guardar - Cambios. ✓ " style="margin-top: 10px;"/></td>
			@endif
			@endif
		</tr>
</table>
</div>
</form>
</div>
</div>
</div>
</div>
<br><br>



