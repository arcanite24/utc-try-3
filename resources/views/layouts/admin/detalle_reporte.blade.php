        <!-- page content Maestros -->
        <div class="col-md-12 col-md-offset-0 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><strong>{{ $iplantel }}</strong><i> Licenciatura</i></h2><strong><p style="float: right;"><i>Grupo: {{ $grupo }}</i></p></strong>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                          <th><small style="width:100%; text-align:center;">No.</small></th>
                          <th><small style="width:100%; text-align:center;">Alumno</small></th>
                          @foreach($rmat as $rm)
                             @if ( $rm->id_grupos == $id_grupos )
                               @foreach($materias as $ma)
                                 @if ( $ma->id_materia == $rm->id_materias )
                                   <th><small style="width:100%; text-align:center;font-size: 10px">{{ $ma->descripcionm }}</small></th>
                                 @endif
                                @endforeach
                              @endif
                           @endforeach 
                          <th><small style="width:100%; text-align:center;">Promedio</small></th>
                      </thead>

                      <tbody>
        <?php $i=0; ?>
        @foreach($alumnos as $a) <?php $promedio=0; $acum=0.00001;$promedio_final=0; $reprobadas=0;?>
        @if ($a->id_grupos == $id_grupos)
        <?php $i++ ?>
        <tr class="success">
            <td style="font-size: 11px;">{{ $i }}</td>
            <td style="font-size: 11px; width: 100%;">{{ $a->name }}</td>

              @foreach($rmat as $rm)
                @if ( $rm->id_grupos == $id_grupos )
                  @foreach($materias as $ma) 
                    @if ( $ma->id_materia == $rm->id_materias )
                    <td style="font-size: 11px; width: 100%;"
                        @foreach($calificaciones as $cal) 
                        @if ($cal->id_calificaciones == $a->id_alumnos.$rm->id_materias) 

                        
                        @if(number_format($promedio= (($cal->parcial1 + $cal->parcial2 + $cal->parcial3)/ 3), 2, '.', '') < 5.9)
                        class="danger">{{ number_format($promedio= (($cal->parcial1 + $cal->parcial2 + $cal->parcial3)/ 3), 2, '.', '')  }}
                        <?php $reprobadas++; ?>
                        @else
                        >{{ number_format($promedio= (($cal->parcial1 + $cal->parcial2 + $cal->parcial3)/ 3), 2, '.', '')  }}
                        @endif

                        <?php $promedio_final = $promedio_final+number_format($promedio= (($cal->parcial1 + $cal->parcial2 + $cal->parcial3)/ 3), 2, '.', '') ?>


                        <?php $acum++; ?>
                        @endif
                        @endforeach
                    </td >
                    @endif
                  @endforeach
                @endif
              @endforeach 
              @if($acum==0) $acum=1; @endif

          @if($reprobadas >= 2)<td class="danger" style="font-size: 11px"><strike>{{ number_format($promedio_final/$acum, 2, '.', '') }}</strike></td> 
          @else <td style="font-size: 11px">{{ number_format($promedio_final/$acum, 2, '.', '') }}</td> 
          @endif
          
        </tr>
        @endif
        @endforeach
                    
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
        <!-- /page content -->