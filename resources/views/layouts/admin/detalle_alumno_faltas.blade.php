<br>
<div class="col-md-9 col-md-offset-1">

<div class="panel panel-primary">
        <div class="panel-heading">
        <h4>F A L T A S <p style="float: right;"><i>Grupo: {{ $grupo }}</i></p></h4>
        <h5><STRONG>Plan de Estudios</STRONG> <i>{{ $carrera }}</i></h5>
        <h5><STRONG> Nombre </STRONG>{{ $nombrea }} </h5></div>
        <div class="panel-body">
<div class="table-responsive">

<form role="form" class="form-horizontal" role="form" method="post" action="{{ url('detalle_update_faltas') }}" enctype="multipart/form-data">
{{ csrf_field() }}
<table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
        <tr class="success">
            <th>Materia</th>
            <th>Primer Parcial</th>
            <th>Segundo Parcial</th>
            <th>Tercer Parcial</th>
        </tr>
    </thead>
    <tbody>
        <?php $a=0; ?>
        @foreach($rmat as $rm)
        @if ( $rm->id_grupos == $id_grupo )
        <tr> <?php $op=false; ?> 
            @foreach($materias as $ma)
                @if ( $ma->id_materias == $rm->id_materias ) 
                <td class="success">{{ $ma->descripcion }}</td>
                    @foreach($faltas as $fal)
                    @if ( $fal->id_faltas == $id_alumnos.$ma->id_materias ) 

                    <td @if($fal->parcial1<3) class="success" @else class="bg-danger" @endif><select class="form-control input-sm" size="1" name="parcial1{{ $id_alumnos.$ma->id_materias }}" > 
                    @for($o=0;$o<=12;$o++) <?php $f=false; ?>
                        @if( $fal->parcial1 == $o )
                            <option value='{{$o}}' selected >{{$o}}</option> 
                            <?php $f=true; ?>
                        @endif
                        @if($f==false)
                        <option value='{{$o}}'>{{$o}}</option> 
                        @endif
                    @endfor
                    </select></td>

                    <td @if($fal->parcial2<3) class="success" @else class="bg-danger" @endif><select class="form-control input-sm" size="1" name="parcial2{{ $id_alumnos.$ma->id_materias }}" > 
                    @for($o=0;$o<=12;$o++) <?php $f=false; ?>
                        @if( $fal->parcial2 == $o )
                            <option value='{{$o}}' selected >{{$o}}</option> 
                            <?php $f=true; ?>
                        @endif
                        @if($f==false)
                        <option value='{{$o}}'>{{$o}}</option> 
                        @endif
                    @endfor
                    </select></td>

                    <td @if($fal->parcial3<3) class="success" @else class="bg-danger" @endif><select class="form-control input-sm" size="1" name="parcial3{{ $id_alumnos.$ma->id_materias }}" > 
                    @for($o=0;$o<=12;$o++) <?php $f=false; ?>
                        @if( $fal->parcial3 == $o )
                            <option value='{{$o}}' selected >{{$o}}</option> 
                            <?php $f=true; ?>
                        @endif
                        @if($f==false)
                        <option value='{{$o}}'>{{$o}}</option> 
                        @endif
                    @endfor
                    </select></td>


                     
                     <input name="{{ $a }}" type="hidden" value="{{ $id_alumnos.$ma->id_materias }}" >
                    
                    <?php $op=true; $a++;?>
                    @endif
                    @endforeach
                @endif
            @endforeach
            @if($op==false)
                    <td class="warning"></td> 
                    <td class="warning"></td> 
                    <td class="warning"></td> 
            @endif
        </tr>
        @endif
        @endforeach
        
        <input name="id_alumnos" type="hidden" value="{{ $id_alumnos }}" >
        <input name="tabla" type="hidden" value="detalle_alumno_faltas" >
        <input name="matricula" type="hidden" value="{{ $matricula }}" >
        <input name="i" type="hidden" value="{{ $a }}" >
    </tbody>
</table>
</div>
</div>
</div>
<button id="step-2-next" class="btn btn-lg btn-success pull-right" style="width: 150px;">Actualizar</button>
<form>

</div>