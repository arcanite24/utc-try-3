        <!-- page content Maestros -->
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><strong>{{$iplantel}}</strong> Maestros</h2>
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
                          <th>No.</th>
                          <th>Nombre</th>
                          <th>Progreso</th>
                          <th>Grupos</th>
                          <th>Graficas</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $i=1; $p=false; ?>
                        @foreach($profesores as $prof)
        
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$prof->name}}</td>

                          <?php $z=0; $y=0; $w=0; ?>

                             @foreach($pgrupos as $gr)
                             @if ($gr->id_profesores == $prof->id_profesores )
                                @foreach($grupos as $g) 
                                     @if ($gr->id_grupos == $g->id_grupos)
                                     <?php $y++;?>
                         
                                 @foreach($rmat as $rm)
                                 @if ($rm->id_grupos==$g->id_grupos && $rm->id_profesores== $prof->id_profesores ) 
                                     @foreach($materias as $mat)
                                     @if ( $mat->id_materia == $rm->id_materias )
                                     
                         
                                     @foreach($alumnos as $a) 
                                         @if ($a->id_grupos == $g->id_grupos)
                                             @foreach($faltas as $fal) 
                                                 @if ($fal->id_faltas == $a->id_alumnos.$rm->id_materias) 
                                                     <?php $z++;?>
                                                     @break
                                                 @endif
                                             @endforeach
                                             @break
                                         @endif
                                     @endforeach
                         
                                 @endif
                                 @endforeach
                             @endif
                             @endforeach
                             @endif
                             @endforeach
                             @endif
                             @endforeach
                             
                             
                          @if($y==0)  <?php $w=$z/1; ?>
                          @elseif($y>0) <?php $w=$z/$y; ?>
                          @endif
                          <td class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{ $w*100 }}"></div>
                            </div>
                            <small>{{$z}}/{{$y}}  -  {{ ($w*100) }}% Complete</small>
                          </td>

                          <td>
                              <form method="post" action="{{url('/detalle_maestro')}}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <a><i class="fa fa-pencil-square-o"></i>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input name="id_profesores" type="hidden" value="{{ $prof->id_profesores }}" >
                              <input name="profesor" type="hidden" value="{{ $prof->name }}" >
                              <input name="id_plantel" type="hidden" value="{{ $id_plantel }}" >
                              <input name="iplantel" type="hidden" value="{{ $iplantel }}" >
                              <input name="tabla" type="hidden" value="detalle_maestro" >
                              <input type="submit" name="" value="Listas..." style="background:none; border:none; margin:0; padding:0;">
                              </a>
                              </form>
                          </td>

                          <td>
                              <form method="post" action="{{url('/detalle_graficas')}}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <a><i class="fa fa-pencil-square-o"></i>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input name="id_profesores" type="hidden" value="{{ $prof->id_profesores }}" >
                              <input name="profesor" type="hidden" value="{{ $prof->name }}" >
                              <input name="id_plantel" type="hidden" value="{{ $id_plantel }}" >
                              <input name="iplantel" type="hidden" value="{{ $iplantel }}" >
                              <input name="tabla" type="hidden" value="detalle_graficas" >
                              <input type="submit" name="" value="Graficas..." style="background:none; border:none; margin:0; padding:0;">
                              </a>
                              </form>
                          </td>

                        </tr>

                      @endforeach 
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
        <!-- /page content -->
