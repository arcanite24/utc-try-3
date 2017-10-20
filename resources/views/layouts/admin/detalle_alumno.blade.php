<div class="">
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><strong>ALUMNO:</strong> {{ $nombrea }}</h2><p style="float: right;"><i>GRUPO: {{ $grupo }}</i></p>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" @if(isset($opcion)) class="active" @else class="" @endif ><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Calificaciones</a>
                        </li>
                        <li role="presentation" @if(isset($opcion)) class="" @else class="active" @endif ><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Faltas</a>
                        </li>
                      </ul>

                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" @if(isset($opcion)) class="tab-pane fade active in" @else class="tab-pane fade" @endif id="tab_content1" aria-labelledby="home-tab">



<div class="col-md-9 col-md-offset-1">
<div class="panel panel-primary">
        <div class="panel-heading">
        <h4><STRONG>Plan de Estudios</STRONG> <i>{{ $carrera }}</i><p style="float: right;"><i>Grupo: {{ $grupo }}</i></p></h4>
        <h5><STRONG> Nombre </STRONG>{{ $nombrea }} </h5></div>
        <div class="panel-body">
<div class="table-responsive">

<form role="form" class="form-horizontal" role="form" method="post" action="{{ url('detalle_update') }}" enctype="multipart/form-data">
{{ csrf_field() }}
<table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
        <tr class="success">
            <th>Materia</th>
            <th>Primer Parcial</th>
            <th>Segundo Parcial</th>
            <th>Tercer Parcial</th>
            <th>Promedio</th>
        </tr>
    </thead>
    <tbody>
        <?php $promedio=0; $promediofinal=0; $a=0; ?>
        @foreach($rmat as $rm)
        @if ( $rm->id_grupos == $id_grupo )
        <tr> <?php $op=false; ?> 
            @foreach($materias as $ma)
                @if ( $ma->id_materia == $rm->id_materias ) 
                <td class="success">{{ $ma->descripcionm }}</td>
                    @foreach($calificaciones as $cal)
                    @if ( $cal->id_calificaciones == $id_alumnos.$ma->id_materias ) 

                    <td @if($cal->parcial1<6) class="bg-danger" @else class="success" @endif>
                    <input step="0.01" class="form-control input-sm" type="number" min="0" max="10" name="parcial1{{ $id_alumnos.$ma->id_materias }}" placeholder="parcial 1" onkeypress="return soloLetras(event);" style="width: 85px;" value= {{ $cal->parcial1 }} ></td> 

                    <td @if($cal->parcial2<6) class="bg-danger" @else class="success" @endif>
                    <input step="0.01" class="form-control input-sm" type="number" min="0" max="10" name="parcial2{{ $id_alumnos.$ma->id_materias }}" placeholder="parcial 2" onkeypress="return soloLetras(event);" style="width: 85px;" value= {{ $cal->parcial2 }} ></td> 

                    <td @if($cal->parcial3<6) class="bg-danger"  @else class="success" @endif>
                    <input step="0.01" class="form-control input-sm" type="number" min="0" max="10" name="parcial3{{ $id_alumnos.$ma->id_materias }}" placeholder="parcial 3" onkeypress="return soloLetras(event);" style="width: 85px;" value= {{ $cal->parcial3 }} ></td>


                    <td @if(($promedio= (($cal->parcial1 + $cal->parcial2 + $cal->parcial3)/ 3))<6) class="danger" @else class="success" @endif><b>{{ number_format($promedio= (($cal->parcial1 + $cal->parcial2 + $cal->parcial3)/ 3), 2, '.', '') }}</b></td>
                     <?php $op=true; $a++; $promediofinal+=$promedio; ?>
                     
                     <input name="{{ $a }}" type="hidden" value="{{ $id_alumnos.$ma->id_materias }}" >
                    
                    
                    @endif
                    @endforeach
                @endif
            @endforeach
            @if($op==false)
                    <td class="warning"></td> 
                    <td class="warning"></td> 
                    <td class="warning"></td> 
                    <td class="warning"></td>
            @endif
        </tr>
        @endif
        @endforeach
        
        <input name="id_alumnos" type="hidden" value="{{ $id_alumnos }}" >
        <input name="tabla" type="hidden" value="detalle_alumno" >
        <input name="matricula" type="hidden" value="{{ $matricula }}" >
        <input name="i" type="hidden" value="{{ $a }}" >

        @if($a==0) <?php $a=1; ?> @endif
        <tr class="success">
            <td colspan="3"></td>
            <td><i>Promedio Total:</i></td>
            <td style="text-align: center;"><b><i>{{ number_format($promediofinal/$a, 2, '.', '') }}</i></b></td>
        </tr>
    </tbody>
</table>
</div>
</div>
</div>
<button id="step-2-next" class="btn btn-lg btn-success pull-right" style="width: 150px;">Actualizar</button>
</form>
</div>


                        
                        <!-- ACTIVAR PARCIAL DE BACHILLERATO -->
        </div>
        <div role="tabpanel" @if(isset($opcion)) class="tab-pane fade" @else class="tab-pane fade active in" @endif id="tab_content2" aria-labelledby="profile-tab">



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
                @if ( $ma->id_materia == $rm->id_materias ) 
                <td class="success">{{ $ma->descripcionm }}</td>
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
</form>
</div>




</div></div>

</div></div>
</div></div>
</div>