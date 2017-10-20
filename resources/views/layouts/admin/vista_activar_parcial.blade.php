<div class="">
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Activar Parciales<small> / /</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" @if(isset($opcion)) class="" @else class="active" @endif ><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Licenciatura</a>
                        </li>
                        <li role="presentation" @if(isset($opcion)) class="active" @else class="" @endif ><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Bachillerato</a>
                        </li>
                      </ul>

                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" @if(isset($opcion)) class="tab-pane fade" @else class="tab-pane fade active in" @endif id="tab_content1" aria-labelledby="home-tab">
                        
       <!-- ACTIVACION DE PARCIAL EN LICENCIATURA -->
       <?php $fecha_fin=""; $parcial=""; ?>
        @foreach($fechas as $fe)   
            @if($fe->id_fecha == '2') <?php $fecha_fin=$fe->fecha_fin; $parcial=$fe->parcial_activo; ?>
            @endif
        @endforeach

        <?php 
        $fecha_inicio = date("Y-m-d");
        $dias   = (strtotime($fecha_inicio)-strtotime($fecha_fin))/86400;
        $dias   = abs($dias); $dias = floor($dias); 
        ?>
             <div style="padding: 30px;background: #f1f1f1;" ><p style="text-align: left;font-size: 30px;">Licenciatura:</p>

             <div class="animated flipInY col-lg-8 col-md-8 col-sm-8 col-xs-8 col-md-offset-2" style="margin-bottom: 50px;">
              @if($dias==0) 
              <div class="tile-stats">
              <div class="icon"><i class="fa fa-clock-o"></i>
              </div><div class="count" style="text-align: center; font-size: 30px;">Periodo Desactivado</div>
              </div>
              @else  
              <div class="tile-stats bg-green">
              <div class="icon"><i class="fa fa-clock-o"></i>
              </div><div class="count" style="text-align: center; font-size: 30px;">{{$dias}} Días restantes</div>
              </div>
              @endif
             </div>

         <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
            @if($parcial=="1")
            <div class="tile-stats bg-green">
            @else
            <div class="tile-stats" style="padding-left: 30px;background: #fff;">
            @endif
              <div class="icon"><i class="fa fa-check-square-o"></i>
              </div>
              <div class="count">Parcial 1</div>

                <form method="post" action="{{url('/parcial_activo')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input name="parcial" type="hidden" value="1" >
                <h3><input type="submit" name="" value="Activar" style="background:none; border:none; margin:0px; padding:0;"></h3>
                </form>

            </div>
          </div>

          <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
            @if($parcial=="2")
            <div class="tile-stats bg-green">
            @else
            <div class="tile-stats" style="padding-left: 30px;background: #fff;">
            @endif
              <div class="icon"><i class="fa fa-check-square-o"></i>
              </div>
              <div class="count">Parcial 2</div>
              
              <form method="post" action="{{url('/parcial_activo')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input name="parcial" type="hidden" value="2" >
                <h3><input type="submit" name="" value="Activar" style="background:none; border:none; margin:0; padding:0;"></h3>
                </form>

            </div>
          </div>

          <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
            @if($parcial=="3")
            <div class="tile-stats bg-green">
            @else
            <div class="tile-stats" style="padding-left: 30px;background: #fff;">
            @endif
              <div class="icon"><i class="fa fa-check-square-o"></i>
              </div>
              <div class="count">Parcial 3</div>
              
              <form method="post" action="{{url('/parcial_activo')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input name="parcial" type="hidden" value="3" >
                <h3><input type="submit" name="" value="Activar" style="background:none; border:none; margin:0; padding:0;"></h3>
                </form>

            </div>
          </div>

     <!-- ACTIVA FECHA LIMITE EN LICENCIATURA-->
      <div class="col-md-offset-4" style=" margin-top: 300px;align-content: center;" >
        <form method="post" action="{{url('/activar_fecha')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <table>
               <tr>
                   <th><strong>Inicio: </strong></th>
                   <th><strong>Fin: </strong></th>
               </tr>
               <tr>
               <td><input class="form-control" type="date" name="fecha_inicio" step="1" min="<?php echo date("Y-m-d");?>" max="<?php echo date("Y-m-d");?>" value="<?php echo date("Y-m-d");?>"></td>
               
               <td><input class="form-control" type="date" name="fecha_fin" step="1" min="<?php echo date("Y-m-d");?>" max="2030-12-31" value="<?php echo $fecha_fin; ?>"></td>
               </tr>
               <tr>
                   <td>•</td>
               </tr>

               <tr>
               <td><button type="submit" class="btn btn-round btn-success">Activar Evaluacion</button></td>
               </form>
               <td><form method="post" action="{{url('/activar_fecha')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="fecha_inicio" value="<?php echo date("Y-m-d");?>" >
                    <input type="hidden" name="fecha_fin" value="desactivar" >
                    <button type="submit" class="btn btn-round btn-danger" @if($dias==0) disabled @endif >Desactivar Evaluacion</button>
                    </form>
                </td>
               </tr>
               </table>
      </div>
    </div>
                       <!-- ACTIVAR PARCIAL DE BACHILLERATO -->
                        </div>
                        <div role="tabpanel" @if(isset($opcion)) class="tab-pane fade active in" @else class="tab-pane fade" @endif id="tab_content2" aria-labelledby="profile-tab">

        <?php $fecha_fin_bach=""; $parcial_bach=""; ?>
        @foreach($fechas as $fe)   
            @if($fe->id_fecha == '1') <?php $fecha_fin_bach=$fe->fecha_fin; $parcial_bach=$fe->parcial_activo; ?>
            @endif
        @endforeach

        <?php                
        $dias_bach   = (strtotime($fecha_inicio)-strtotime($fecha_fin_bach))/86400;
        $dias_bach   = abs($dias_bach); $dias_bach = floor($dias_bach); 
        ?>
             <div style="background:#F2F2F2;padding-top: 30px;padding-bottom: 30px;"><p style="text-align: left;font-size: 30px;">Bachillerato:</p>

             <div class="animated flipInY col-lg-8 col-md-8 col-sm-8 col-xs-8 col-md-offset-2" style="margin-bottom: 50px;">
              @if($dias_bach==0) 
              <div class="tile-stats">
              <div class="icon"><i class="fa fa-clock-o"></i>
              </div><div class="count" style="text-align: center;font-size: 30px;">Periodo Desactivado</div>
              </div>
              @else  
              <div class="tile-stats bg-green">
              <div class="icon"><i class="fa fa-clock-o"></i>
              </div><div class="count" style="text-align: center;font-size: 30px;">{{ $dias_bach }} Días restantes</div>
              </div>
              @endif
             </div>

         <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            @if($parcial_bach=="1")
            <div class="tile-stats bg-green">
            @else
            <div class="tile-stats" style="padding-left: 30px;background: #fff;">
            @endif
              <div class="icon"><i class="fa fa-check-square-o"></i>
              </div>
              <div class="count">Parcial 1</div>

                <form method="post" action="{{url('/parcial_activo_bach')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input name="parcial" type="hidden" value="1" >
                <h3><input type="submit" name="" value="Activar" style="background:none; border:none; margin:0px; padding:0;"></h3>
                </form>

            </div>
          </div>

          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            @if($parcial_bach=="2")
            <div class="tile-stats bg-green">
            @else
            <div class="tile-stats" style="padding-left: 30px;background: #fff;">
            @endif
              <div class="icon"><i class="fa fa-check-square-o"></i>
              </div>
              <div class="count">Parcial 2</div>
              
              <form method="post" action="{{url('/parcial_activo_bach')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input name="parcial" type="hidden" value="2" >
                <h3><input type="submit" name="" value="Activar" style="background:none; border:none; margin:0; padding:0;"></h3>
                </form>

            </div>
          </div>

          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            @if($parcial_bach=="3")
            <div class="tile-stats bg-green">
            @else
            <div class="tile-stats" style="padding-left: 30px;background: #fff;">
            @endif
              <div class="icon"><i class="fa fa-check-square-o"></i>
              </div>
              <div class="count">Parcial 3</div>
              
              <form method="post" action="{{url('/parcial_activo_bach')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input name="parcial" type="hidden" value="3" >
                <h3><input type="submit" name="" value="Activar" style="background:none; border:none; margin:0; padding:0;"></h3>
                </form>

            </div>
          </div>

           <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            @if($parcial_bach=="4")
            <div class="tile-stats bg-green">
            @else
            <div class="tile-stats" style="padding-left: 30px;background: #fff;">
            @endif
              <div class="icon"><i class="fa fa-check-square-o"></i>
              </div>
              <div class="count">Parcial 4</div>
              
              <form method="post" action="{{url('/parcial_activo_bach')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input name="parcial" type="hidden" value="4" >
                <h3><input type="submit" name="" value="Activar" style="background:none; border:none; margin:0; padding:0;"></h3>
                </form>

            </div>
          </div>

      <!-- ACTIVA FECHA LIMITE EN BACHILLERATO -->
      <div class="col-md-offset-4" style=" margin-top: 300px;align-content: center;" >
        <form method="post" action="{{url('/activar_fecha_bach')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <!-- Fecha de inicio y fin -->
          <table>
               <tr>
                   <th><strong>Inicio: </strong></th>
                   <th><strong>Fin: </strong></th>
               </tr>
               <tr>
               <td><input class="form-control" type="date" name="fecha_inicio_bach" step="1" min="<?php echo date("Y-m-d");?>" max="<?php echo date("Y-m-d");?>" value="<?php echo date("Y-m-d");?>"></td>
               
               <td><input class="form-control" type="date" name="fecha_fin_bach" step="1" min="<?php echo date("Y-m-d");?>" max="2030-12-31" value="<?php echo $fecha_fin_bach; ?>"></td>
               </tr>
               <tr>
                   <td>•</td>
               </tr>

               <tr>

               <td><button type="submit" class="btn btn-round btn-success">Activar Evaluacion</button></td>
               </form>
               <td><form method="post" action="{{url('/activar_fecha_bach')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="fecha_inicio_bach" value="<?php echo date("Y-m-d");?>" >
                    <input type="hidden" name="fecha_fin_bach" value="desactivar" >
                    <button type="submit" class="btn btn-round btn-danger" @if($dias==0) disabled @endif >Desactivar Evaluacion</button>
                    </form>
                </td>

               </tr>
               </table>
      </div>
    </div>
    </div>
                          


                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- TERMINA EL MENU DE ACTIVACION -->


        
    
</div></div>