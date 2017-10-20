    <script type="text/javascript">
    $(function () {
    $('#grafica').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafica de Grupos'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [

            @foreach($pgrupos as $gr)
                @if ($gr->id_profesores == $id_profesores )
                    @foreach($grupos as $g) 
                        @if ($gr->id_grupos == $g->id_grupos)
                           '{{ $g->descripcion }}',
                        @endif
                    @endforeach
                @endif
            @endforeach

            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Promedio'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 2
            }
        },
        series: [{
            name: 'No. Alumnos',
            data: [
    
            @foreach($pgrupos as $gr)
                @if ($gr->id_profesores == $id_profesores )
                    @foreach($grupos as $g) <?php $i=0; $promedio=0;?>
                        @if ($gr->id_grupos == $g->id_grupos)
                            @foreach($rmat as $rm)
                            @if ($rm->id_grupos==$g->id_grupos && $rm->id_profesores== $id_profesores ) 
                                @foreach($materias as $mat)
                                @if ( $mat->id_materias == $rm->id_materias )

                                    @foreach($alumnos as $alum) 
                                    @if($alum->id_grupos == $g->id_grupos) <?php $i++; ?>
                                    @endif
                                    @endforeach

                                @endif
                                @endforeach
                            @endif
                            @endforeach
                            {{$i}},
                        @endif
                    @endforeach
                @endif
            @endforeach

            ]

        }, {
            name: 'Aprobados',
            data: [
    
            @foreach($pgrupos as $gr)
                @if ($gr->id_profesores == $id_profesores )
                    @foreach($grupos as $g) <?php $i=0; $a=0;?>
                        @if ($gr->id_grupos == $g->id_grupos)
                            @foreach($rmat as $rm)
                            @if ($rm->id_grupos==$g->id_grupos && $rm->id_profesores== $id_profesores ) 
                                @foreach($materias as $mat)
                                @if ( $mat->id_materias == $rm->id_materias )
                                    @foreach($alumnos as $alum) 
                                    @if($alum->id_grupos == $g->id_grupos) <?php $i++; ?>

                                        @foreach($calificaciones as $cal) 
                                           @if ($cal->id_calificaciones == $alum->id_alumnos.$rm->id_materias) 
                                               @if((($cal->parcial1+$cal->parcial2+$cal->parcial3)/3)>=6) <?php $a++; ?>
                                               @endif
                                           @endif
                                        @endforeach

                                    @endif
                                    @endforeach
                                @endif
                                @endforeach
                            @endif
                            @endforeach
                            {{$a}},
                        @endif
                    @endforeach
                @endif
            @endforeach

            ]

        }, {
            name: 'Reprobados',
            data: [
    
            @foreach($pgrupos as $gr)
                @if ($gr->id_profesores == $id_profesores )
                    @foreach($grupos as $g) <?php $i=0; $r=0;?>
                        @if ($gr->id_grupos == $g->id_grupos)
                            @foreach($rmat as $rm)
                            @if ($rm->id_grupos==$g->id_grupos && $rm->id_profesores== $id_profesores ) 
                                @foreach($materias as $mat)
                                @if ( $mat->id_materias == $rm->id_materias )
                                    @foreach($alumnos as $alum) 
                                    @if($alum->id_grupos == $g->id_grupos) <?php $i++; ?>

                                        @foreach($calificaciones as $cal) 
                                           @if ($cal->id_calificaciones == $alum->id_alumnos.$rm->id_materias) 
                                               @if((($cal->parcial1+$cal->parcial2+$cal->parcial3)/3)<6) <?php $r++; ?>
                                               @endif
                                           @endif
                                        @endforeach

                                    @endif
                                    @endforeach
                                @endif
                                @endforeach
                            @endif
                            @endforeach
                            {{$r}},
                        @endif
                    @endforeach
                @endif
            @endforeach

            ]

            }, {
            name: 'Promedio de Grupo',
            data: [
    
            @foreach($pgrupos as $gr)
                @if ($gr->id_profesores == $id_profesores )
                    @foreach($grupos as $g) <?php $i=0; $promedio=0; ?>
                        @if ($gr->id_grupos == $g->id_grupos)
                            @foreach($rmat as $rm)
                            @if ($rm->id_grupos==$g->id_grupos && $rm->id_profesores== $id_profesores ) 
                                @foreach($materias as $mat)
                                @if ( $mat->id_materias == $rm->id_materias )
                                    @foreach($alumnos as $alum) 
                                    @if($alum->id_grupos == $g->id_grupos) <?php $i++; ?>

                                        @foreach($calificaciones as $cal) 
                                           @if ($cal->id_calificaciones == $alum->id_alumnos.$rm->id_materias) 
                                               @if(($cal->parcial1+$cal->parcial2+$cal->parcial3)>=6) 
                                               @endif
                                               <?php $promedio=$promedio+$cal->parcial1+$cal->parcial2+$cal->parcial3; ?>
                                           @endif
                                        @endforeach

                                    @endif
                                    @endforeach
                                @endif
                                @endforeach
                            @endif
                            @endforeach

                            @if($i==0) 
                            {{$promedio/1}},
                            @else
                            {{$promedio/$i}},  
                            @endif
                            

                        @endif
                    @endforeach
                @endif
            @endforeach

            ]

        }]
    });
});


        </script>