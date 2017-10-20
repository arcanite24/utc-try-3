<div class="container"> <br>
<hr style="padding: 0; border: none;border-top: medium double #333;color: #333;text-align: center;" >
<h4 style="text-align: center;">Profesor: <i>{{ $profesor }}</i></h4>
<hr style="padding: 0; border: none;border-top: medium double #333;color: #333;text-align: center;" >
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
                <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav ">
                    
                        @foreach($pgrupos as $gr)
                          @if ($gr->id_profesores == $id_profesores )
                             @foreach($grupos as $g) 
                                  @if ($gr->id_grupos == $g->id_grupos)

                                <?php $z=0; $y=0; ?>
                                 @foreach($rmat as $rm)
                                    @if ($rm->id_grupos==$g->id_grupos && $rm->id_profesores== $id_profesores ) 
                                        @foreach($materias as $mat)
                                        @if ( $mat->id_materia == $rm->id_materias )
                                        <?php $y++;?>
                            
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

                            <li 
                            @if($y==$z) class=" dropdown bg-success" 
                            @else class=" dropdown bg-danger" 
                            @endif style="margin-right: 5px;font-size: 11px; ">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            @if($y==$z) <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                            @else <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                            @endif

                            {{ $g->descripciong }}<span class="caret"></span></a>

                            <ul class="dropdown-menu">
                            <li class="disabled"><a>Materias</a></li>
                                
                    @foreach($rmat as $rm)
                    @if ($rm->id_grupos==$g->id_grupos && $rm->id_profesores== $id_profesores ) 
                        @foreach($materias as $mat)
                        @if ( $mat->id_materia == $rm->id_materias )

                            <?php $op=false; ?>
                            @foreach($alumnos as $a) 
                                @if ($a->id_grupos == $g->id_grupos)
                                    @foreach($faltas as $fal) 
                                        @if ($fal->id_faltas == $a->id_alumnos.$rm->id_materias) 
                                            <?php $op=true; ?>
                                            @break
                                        @endif
                                    @endforeach
                                    @break
                             @endif
                            @endforeach

                        <li class=" dropdown"><a>
                        <form method="post" action="{{url('/lista')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="id_grupos" type="hidden" value="{{ $gr->id_grupos}}" >
                        <input name="descripcion" type="hidden" value="{{ $g->descripciong }}" >
                        <input name="id_materias" type="hidden" value="{{ $mat->id_materia }}" >
                        <input name="id_profesores" type="hidden" value="{{ $id_profesores }}" >
                        <input name="profesor" type="hidden" value="{{ $profesor }}" >
                        <input name="tabla" type="hidden" value="detalle_maestro" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <li><input style="background:none; border:none; margin:0; padding:0;" 
                        @if($op==false) class="bg-danger" 
                        @else class="bg-success" 
                        @endif
                        type="submit" value="{{ $mat->descripcionm }}" /></li>
                        </form>
                        </a></li>
                        @endif
                        @endforeach
                    @endif
                    @endforeach
                

                            <li role="separator" class="divider"></li>
                            </ul>

                            </li>
                            @endif
                            @endforeach
                        @endif
                        @endforeach

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<br><br>

    @if(isset($edit))
        @include('layouts.admin.detalle_lista')
     @endif
     
</div>
