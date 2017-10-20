         <?php $parcial="";$parcial_bach="";?>
         @foreach($fechas as $f)   
             @if($f->id_fecha == 1) 
                <?php $parcial_bach=$f->parcial_activo; ?>
             @endif
             @if($f->id_fecha == 2) 
                <?php $parcial=$f->parcial_activo; ?>
             @endif
        @endforeach

<div class="navbar-wrapper">
    <div class="container-fluid">
        <nav class="navbar navbar">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{url('/calificacion')}}" class="" style="margin-right: 10px;"><i class="fa fa-home"></i><b> Inicio</b></a></li>

                        @foreach($plantel as $pl)
                        <li class=" dropdown bg-success" style="margin-right: 5px;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-institution"></i> {{ $pl->descripcion }}<span class="caret"></span></a>

                            <ul class="dropdown-menu">
                            <li role="separator" class="divider"></li>
                            <li><a>
                                      <form method="post" action="{{url('/plantel_maestros')}}" enctype="multipart/form-data">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <input name="id_plantel" type="hidden" value="{{ $pl->id_plantel }}" >
                                      <input name="iplantel" type="hidden" value="{{ $pl->descripcion }}" >
                                      <input name="tabla" type="hidden" value="maestros" >
                                      <input type="submit" name="" value="Reportes por Materia" style="background:none; border:none; margin:0; padding:0;">
                                      </form>
                            </a></li>
                            <li role="separator" class="divider"></li>
                            <li class="disabled"><a>Licenciatura</a></li>
                                <li class=" dropdown"><a>
                                       <form method="post" action="{{url('/plantel_alumnos')}}" enctype="multipart/form-data">
                                       {{ csrf_field() }}
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                       <input name="id_plantel" type="hidden" value="{{ $pl->id_plantel }}" >
                                       <input name="iplantel" type="hidden" value="{{ $pl->descripcion }}" >
                                       <input name="tabla" type="hidden" value="alumnos" >
                                       <input type="submit" name="" value="Calificaciones y Faltas" style="background:none; border:none; margin:0; padding:0;">
                                       </form>
                                </a></li>
                            @if($parcial=="3")
                            <li><a>
                               <form method="post" action="{{url('/reporte_final')}}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input name="id_plantel" type="hidden" value="{{ $pl->id_plantel }}" >
                              <input name="iplantel" type="hidden" value="{{ $pl->descripcion }}" >
                              <input name="tabla" type="hidden" value="reporte" >
                              <input type="submit" name="" value="Reporte Final" style="background:none; border:none; margin:0; padding:0;">
                              </form>
                            </a></li>
                            @endif

                            <li role="separator" class="divider"></li>
                            <li class="disabled"><a>Bachillerato</a></li>
                                <li class=" dropdown"><a>
                                      <form method="post" action="{{url('/plantel_alumnos')}}" enctype="multipart/form-data">
                                       {{ csrf_field() }}
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                       <input name="id_plantel" type="hidden" value="{{ $pl->id_plantel }}" >
                                       <input name="iplantel" type="hidden" value="{{ $pl->descripcion }}" >
                                       <input name="tabla" type="hidden" value="alumnos_bach" >
                                       <input type="submit" name="" value="Calificaciones y Faltas" style="background:none; border:none; margin:0; padding:0;">
                                       </form>
                                </a></li>
                            @if($parcial_bach=="4")
                            <li><a>
                               <form method="post" action="{{url('/reporte_final')}}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input name="id_plantel" type="hidden" value="{{ $pl->id_plantel }}" >
                              <input name="iplantel" type="hidden" value="{{ $pl->descripcion }}" >
                              <input name="tabla" type="hidden" value="reporte_bach" >
                              <input type="submit" name="" value="Reporte Final" style="background:none; border:none; margin:0; padding:0;">
                              </form>
                            </a></li>
                            @endif

                            </ul>

                            </li>
                        @endforeach

                    </ul>
                    
                </div>
            </div>
        </nav>
    </div>
</div>