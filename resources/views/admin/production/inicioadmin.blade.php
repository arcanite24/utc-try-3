@extends('layouts.appal')
@section('content')
<br><br><br>
<div class="container">
    <div class="row">
        <div class="board">
            <ul class="nav nav-tabs">
                <div class="liner"></div>
                <li rel-index="0" class="active">
                    <a href="#step-1" class="btn" aria-controls="step-1" role="tab" data-toggle="tab">
                        <span><i class="glyphicon glyphicon-user"></i></span>
                    </a>
                </li>
                <li rel-index="1">
                    <a href="#step-2" class="btn disabled" aria-controls="step-2" role="tab" data-toggle="tab">
                        <span><i class="glyphicon glyphicon-list-alt"></i></span>
                    </a>
                </li>
                <li rel-index="2">
                    <a href="#step-3" class="btn disabled" aria-controls="step-3" role="tab" data-toggle="tab">
                        <span><i class="glyphicon glyphicon-time"></i></span>
                    </a>
                </li>
                <li rel-index="3">
                    <a href="#step-4" class="btn disabled" aria-controls="step-4" role="tab" data-toggle="tab">
                        <span><i class="glyphicon glyphicon-ok"></i></span>
                    </a>
                </li>
            </ul>
        </div>



        <div class="tab-content">

            <div role="tabpanel" class="tab-pane active" id="step-1">
                <div class="col-md-8 col-md-offset-2">

        <div class="row-fluid user-infos alexanderMahrt">
            <div class="span10 offset1"><br>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><h4>Sistema de Desempeño Escolar | U T C</h4></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row-fluid">
                             <div class="span3"  style="float: left; margin-left: 70px; margin-top: 20px;">
                                <img class="img-circle"
                                     src="https://cdn0.iconfinder.com/data/icons/male-user-action-icon-set-2-ibrandify/512/16-128.png"
                                     alt="User Pic">
                            </div>
                            <div class="span6" style="float: right;">
                                <strong><h4>{{ Session::get('nombrea') }}</h4></strong><br>
                                <table class="table table-condensed table-responsive table-user-information">
                                    <tbody>                
                                        <tr>
                                            <td>Carrera: {{ Session::get('carrera') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Turno: {{ Session::get('turno') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Grupo: {{ Session::get('grupo') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                        </div>
                <div class="panel panel-primary">
                <div class="panel-heading" style="height: 50px;"><h4>Evaluacion Docente </h3>
                    </div>
                    <div class="panel-body">
                    <table class="table table-condensed table-responsive table-user-information">

                        <thead>
                            <th style="text-align: center;">Profesor</th>
                            <th style="text-align: center;">Evaluacion</th>
                        </thead>
                    <tbody>
                        <?php $c=0; $s=0; ?>
                         @foreach($pgrupos as $pg)
                         @if ( $pg->id_grupos == Session::get('id_grupo') )

                            <?php $n=false;?>
                            @foreach($prueba as $pru)

                            @if ( $pru->id_profesores == $pg->id_profesores && $pru->id_alumno == Session::get('matricula') )
                                @foreach($profesores as $pf)
                                @if ( $pf->id_profesores == $pg->id_profesores )
                                <tr class="bg-success">
                                    <td style="text-align: center; font-size: 14px;">{{ $pf->nombre}}</td>
                                    <td style="text-align: center; font-size: 14px;">✓</td>
                                </tr>
                                <?php $n=true; $c++?>
                                @endif
                                @endforeach
                            @endif
                            @endforeach

                            @if($n==false) 
                                @foreach($profesores as $pf)
                                @if ( $pf->id_profesores == $pg->id_profesores )
                            <tr class="bg-danger">
                                <td style="text-align: center; font-size: 14px;">{{ $pf->nombre }}</td>
                                <td style="text-align: center; font-size: 14px;"> ✖ </td>
                            </tr>
                                @endif
                                @endforeach
                            @endif

                            <?php $s++?>
                         @endif
                         @endforeach
                        </tbody>
                        </table>
                        @if($c>=$s)
                        <div class="alert alert-success" role="alert" style="float: left;"><strong>Nota: </strong> Evaluación completa puedes continuar  → </div>
                        <button id="step-1-next" class="btn btn-lg btn-success nextBtn pull-right"  style="width: 150px;">Continuar</button> 
                        @else
                        <div class="alert alert-warning" role="alert" style="float: left;"><strong>Nota: </strong> Debes completar la evaluación para consultar tu calificación</div>
                        <a class="btn btn-lg btn-danger nextBtn pull-right" href="http://localhost/utc/universidad"> Evaluacion Docente</a>   
                        @endif
                    </div>

            </div>
            </div>
        </div>
        </div>
        </div>




            <div role="tabpanel" class="tab-pane" id="step-2">
                <div class="col-md-8 col-md-offset-2">

        <br><div class="panel panel-primary">
        <div class="panel-heading">
        <h4><STRONG>Plan de Estudios</STRONG> <i>{{Session::get('carrera')}}</i><p style="float: right;"><i>Grupo: {{Session::get('grupo')}}</i></p></h4>
        <h5><STRONG> Nombre </STRONG>{{Session::get('nombrea')}} </h5></div>
        <div class="panel-body">
<div class="table-responsive">
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
        @if ( $rm->id_grupos == Session::get('id_grupo') )
        <tr> <?php $op=false; ?> 
            @foreach($materias as $ma)
                @if ( $ma->id_materias == $rm->id_materias ) 
                <td class="success">{{ $ma->descripcion }}</td>
                    @foreach($calificaciones as $cal)
                    @if ( $cal->id_calificaciones == Session::get('id_alumnos').$ma->id_materias ) 
                    <td style="text-align: center;" @if($cal->parcial1<6) class="danger" @else class="success" @endif>{{ $cal->parcial1 }}</td> 
                    <td style="text-align: center;" @if($cal->parcial2<6) class="danger" @else class="success" @endif>{{ $cal->parcial2 }}</td> 
                    <td style="text-align: center;" @if($cal->parcial3<6) class="danger"  @else class="success" @endif>{{ $cal->parcial3 }}</td> 
                    <td style="text-align: center;" @if(($promedio= (($cal->parcial1 + $cal->parcial2 + $cal->parcial3)/ 3))<6) class="danger" @else class="success" @endif><b>{{ number_format($promedio= (($cal->parcial1 + $cal->parcial2 + $cal->parcial3)/ 3), 2, '.', '') }}</b></td>
                     <?php $op=true; $a++; $promediofinal+=$promedio; ?>
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

        @if($promediofinal==0) $promediofinal=1 @endif
        @if($a==0) $a=1 @endif
        
        <tr class="success">
            <td colspan="3"></td>
            <td><i>Promedio Total:</i></td>
            <td style="text-align: center;"><b><i>{{ number_format($promediofinal/$a, 2, '.', '') }}</i></b></td>
        </tr>
    </tbody>
</table>
</div> 
<button id="step-2-next" class="btn btn-lg btn-success pull-right" style="width: 150px;">Continuar</button>           
</div>
</div>
    </div>
    </div>




            <div role="tabpanel" class="tab-pane" id="step-3">
                <div class="col-md-8 col-md-offset-2">

        <br><div class="panel panel-primary">
        <div class="panel-heading"><h4><STRONG>Plan de Estudios</STRONG> <i>{{Session::get('carrera')}}</i><STRONG style="float: right;"><i>Grupo: {{Session::get('grupo')}}</i></STRONG></h4><h4><STRONG><i>F A L T A S</i></STRONG></h4></div>
        <div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover table-condensed">
<thead>
        <tr class="success">
            <th>Materia</th>
            <th>Faltas Parcial 1</th>
            <th>Faltas Parcial 2</th>
            <th>Faltas Parcial 3</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rmat as $rm)
        @if ( $rm->id_grupos == Session::get('id_grupo') )
        <tr> <?php $op=false; ?> 
            @foreach($materias as $ma)
                @if ( $ma->id_materias == $rm->id_materias ) 
                <td class="success">{{ $ma->descripcion }}</td>
                    @foreach($faltas as $fal)
                    @if ( $fal->id_faltas == Session::get('id_alumnos').$ma->id_materias ) 
                    <td style="text-align: center;" @if($fal->parcial1>=3) class="danger" @else class="success" @endif>{{ $fal->parcial1 }}</td> 
                    <td style="text-align: center;" @if($fal->parcial2>=3) class="danger" @else class="success" @endif>{{ $fal->parcial2 }}</td> 
                    <td style="text-align: center;" @if($fal->parcial3>=3) class="danger" @else class="success" @endif>{{ $fal->parcial3 }}</td> 
                    <?php $op=true; ?>
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
    </tbody>
</table>
</div>
<button id="step-3-next" class="btn btn-lg btn-success pull-right" style="width: 150px;">Continuar</button>           
</div>
</div>
    </div>
</div>






            <div role="tabpanel" class="tab-pane" id="step-4">
                <div class="col-md-12">
                    




                </div>
            </div>
        </div>
               
</div>
</div>
@endsection