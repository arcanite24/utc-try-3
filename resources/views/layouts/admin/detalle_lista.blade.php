    <?php $op=false; ?>
    @foreach($alumnos as $a) 
        @if ($a->id_grupos == $id_grupos)
            @foreach($faltas as $fal) 
                @if ($fal->id_faltas == $a->id_alumnos.$id_materias) 
                    <?php $op=true; ?>
                    @break
                @endif
             @endforeach
             @break
        @endif
    @endforeach

        <!-- page content Maestros -->
        <div class="col-md-10 col-md-offset-1 col-sm-9 col-xs-9">
                <div class="x_panel">
                  <div class="x_title">
              
                    @foreach($grupos as $g) 
                    @if ($g->id_grupos == $id_grupos)
                        @foreach($carrera as $c) 
                        @if ($c->id_carrera == $g->id_carrera)
                            @foreach($materias as $m) 
                            @if ($m->id_materia == $id_materias) 
                                 <strong>{{$c->descripcionc}}</strong><p style="float: right;">{{$g->descripciong}} • {{$m->descripcionm}}</p>
                            @endif
                            @endforeach
                        @endif
                        @endforeach
                    @endif
                @endforeach
  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                          <th>No.</th>
                          <th>Matricula</th>
                          <th>Alumno</th>
                          <th>Parcial 1</th>
                          <th>Parcial 2</th>
                          <th>Parcial 3</th>
                          <th>Promedio</th>
                      </thead>

                      <tbody>
        <?php $i=0; $promedio=0; $acum=0; ?>
        @foreach($alumnos as $a) 
        @if ($a->id_grupos == $id_grupos)
        <?php $i++ ?>
        <tr @if($op==true) 
                class="success"
             @else
                class="danger"
             @endif>
            <td>{{ $i }}</td>
            <td>{{ $a->matricula }}</td>
            <td style="font-size: 12px">{{ $a->name }}</td>

            
                @foreach($calificaciones as $cal) 
                @if ($cal->id_calificaciones == $a->id_alumnos.$id_materias) 
                <td>{{ $cal->parcial1 }} </td>
                <td>{{ $cal->parcial2 }} </td>
                <td>{{ $cal->parcial3 }} </td>
                <td>{{ number_format($promedio= (($cal->parcial1 + $cal->parcial2 + $cal->parcial3)/ 3), 2, '.', '')  }} </td>
                <?php $acum++; ?>
                @endif
                @endforeach

                @if($acum==0) 
                <td></td>
                <td></td>
                <td></td>
                <td></td>
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