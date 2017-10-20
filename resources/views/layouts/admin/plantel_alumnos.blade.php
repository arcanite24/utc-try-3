<!-- page content -->
        <div class="col-md-12 col-sm-12 col-xs-12"> 
                <div class="x_panel">
                  <div class="x_title">
                    <h2><strong>{{$iplantel}}</strong> 
                    @if($tabla=="alumnos") Licenciatura
                    @elseif($tabla=="alumnos_bach") Bachillerato
                    @endif
                    / Alumnos</h2>
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
                          <th>Matricula</th>
                          <th>Nombre</th>
                          <th>Grupo</th>
                          <th>Boleta / Faltas</th>
                        </tr>
                      </thead>


                      <tbody>

                        @if($tabla=="alumnos")

                        @foreach($alumnos as $alu)
                        <tr>
                          <td>{{$alu->matricula}}</td>
                          <td>{{$alu->name}}</td>
                          <td>
                          @foreach($grupos as $gr)
                          @if($gr->id_grupos==$alu->id_grupos)
                          {{$gr->descripciong}}
                          @endif
                          @endforeach
                          </td>
                          <td>
                              <form method="post" action="{{url('/detalle_alumno')}}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <a><i class="fa fa-pencil-square-o"></i>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input name="id_alumnos" type="hidden" value="{{ $alu->id_alumnos }}" >
                              <input name="matricula" type="hidden" value="{{ $alu->matricula }}" >
                              <input name="id_plantel" type="hidden" value="{{ $id_plantel }}" >
                              <input name="iplantel" type="hidden" value="{{ $iplantel }}" >
                              <input name="tabla" type="hidden" value="detalle_alumno" >
                              <input type="submit" name="" value=" Ver..." style="background:none; border:none; margin:0; padding:0;">
                              </a>
                              </form>
                          </td>
                        </tr>
                      @endforeach 

                      @elseif($tabla=="alumnos_bach")

                      @foreach($alumnos_bach as $alu)
                        <tr>
                          <td>{{$alu->matricula}}</td>
                          <td>{{$alu->nombre}}</td>
                          <td>
                          @foreach($grupos as $gr)
                          @if($gr->id_grupos==$alu->id_grupos)
                          {{$gr->descripcion}}
                          @endif
                          @endforeach
                          </td>

                          <td>
                              <form method="post" action="{{url('/detalle_alumno')}}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <a><i class="fa fa-pencil-square-o"></i>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input name="id_alumnos" type="hidden" value="{{ $alu->id_alumnos_bach }}" >
                              <input name="matricula" type="hidden" value="{{ $alu->matricula }}" >
                              <input name="id_plantel" type="hidden" value="{{ $id_plantel }}" >
                              <input name="iplantel" type="hidden" value="{{ $iplantel }}" >
                              <input name="tabla" type="hidden" value="detalle_alumno_bach" >
                              <input type="submit" name="" value=" Ver..." style="background:none; border:none; margin:0; padding:0;">
                              </a>
                              </form>
                          </td>
                        </tr>
                      @endforeach 

                      @endif
                      </tbody>


                    </table>
                  </div>
                </div>
              </div>
        <!-- /page content -->