<!-- page content -->
        <div class="col-md-12 col-sm-12 col-xs-12"> 
                <div class="x_panel">
                  <div class="x_title">
                    <h2><strong>{{$iplantel}}</strong> 
                    @if($tabla == "reporte") Licenciatura
                    @else Bachillerato 
                    @endif 
                    </h2><strong><p style="float: right;"><i>Reporte</i></p></strong>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">

                      <thead>
                        <tr>
                          <th>- CARRERA -</th>
                          <th>- GRUPO -</th>
                          <th>- TURNO -</th>
                          <th>- REPORTE -</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($carrera as $carr)

                          @foreach($grupos as $gr)
                              @if( $gr->id_carrera == $carr->id_carrera )
                              <tr>
                                  <td>{{ $carr->descripcionc }}</td>
                                  <td>{{ $gr->descripciong }}</td>
                                  @foreach($turno as $tr)
                                      @if( $tr->id_turno == $gr->id_turno )
                                        <td>{{ $tr->descripciont }}</td>
                                      @endif
                                  @endforeach
  
                                  <td>
                                      <form method="post" action="{{url('/detalle_reporte')}}" enctype="multipart/form-data">
                                      {{ csrf_field() }}
                                      <a>
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <input name="id_plantel" type="hidden" value="{{ $id_plantel }}" >
                                      <input name="iplantel" type="hidden" value="{{ $iplantel }}" >
                                      <input name="id_grupo" type="hidden" value="{{ $gr->id_grupos }}" >
                                      <input name="grupo" type="hidden" value="{{ $gr->descripciong }}" >
                                      <input name="tabla" type="hidden" value="detalle_reporte" >
                                      <input type="submit" name="" value="Reporte final.." style="background:none; border:none; margin:0; padding:0;">
                                      </a>
                                      </form>
                                  </td>
                              </tr>
                              @endif
                          @endforeach
                          
                      @endforeach 
                      </tbody>


                    </table>
                  </div>
                </div>
              </div>
        <!-- /page content -->