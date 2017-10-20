@extends('layouts.app22')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

<script src="{{ asset('js/utils.js') }}"></script>



<script type="text/javascript">
    	function aiuda1(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-info',
            	message: "<b>{{ Auth::user()->name }}</b>, el dashboard es la pagina de bienvenida y donde se muestra la ayuda a los usuarios."
            },{
                type: 'info',
                timer: 4000
            });
    	}
		function aiuda2(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-info',
            	message: "<b>{{ Auth::user()->name }}</b>, seccion que genera los horarios con respecto a criterios y filtros, se crea un pdf para imprimir."
            },{
                type: 'info',
                timer: 4000
            });
    	}
		function aiuda3(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-info',
            	message: "<b>{{ Auth::user()->name }}</b>, aqui se muestran diferentes informes y estadisticas con respecto al rendimiento de los alumnos."
            },{
                type: 'info',
                timer: 4000
            });
    	}
	function aiuda4(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-info',
            	message: "<b>{{ Auth::user()->name }}</b>, si necesitas eliminar o volver a descargar un horario en pdf, en esta seccion lo podras hacer."
            },{
                type: 'info',
                timer: 4000
            });
    	}
	</script>


<script>
    var year = ['Zona Rosa','Toluca','Coacalco', 'Neza'];
    
	
	var data_click = [120, 190, 30, 50, 20, 30];
    
	<?php 
	/*
	var data_click = <?php echo $click; ?>;
	var data_viewer = <?php echo $viewer; ?>;
	*/
	?>
	
	var data_viewer = [200, 130, 31, 59, 28, 30];
	
    var barChartData = {
        labels: year,
        datasets: [{
            label: '2016',
            backgroundColor: window.chartColors.blue,
            data: data_click
        }, {
            label: '2017',
            backgroundColor: window.chartColors.red,
            data: data_viewer
        }]
    };

    window.onload = function carga() {
       
		var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: window.chartColors.orange,
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Numero de alumnos reprobados por plantel'
                }
            }
        });
		
	};
    </script>



<div class="container">
    <div class="row">
        
            
                 
				<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Desempeño Alumnos <script>document.write(new Date().getFullYear())</script></h4>
                                <p class="category"></p>
                            </div>
							
                    <canvas id="canvas"></canvas>
			
                        </div>
                    </div>

                    
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Ayuda al usuario</h4>
                                <p class="category">Secciones y funciones del sistema</p>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Dashboard</td>
												<td>
                                                    <button class="btn btn-success" onclick="aiuda1()">Como funciona?</button>
                                                </td>
                                            </tr>
											<tr>
                                                <td>Generar horarios</td>
												<td>
                                                    <button class="btn btn-success" onclick="aiuda2()">Como funciona?</button>
                                                </td>
                                            </tr>
											<tr>
                                                <td>Estadisticas</td>
												<td>
                                                    <button class="btn btn-success" onclick="aiuda3()">Como funciona?</button>
                                                </td>
                                            </tr>
											<tr>
                                                <td>Gestor de archivos</td>
												<td>
                                                    <button class="btn btn-success" onclick="aiuda4()">Como funciona?</button>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
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
<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-user',
            	message: "Bienvenido <b>{{ Auth::user()->name }}</b> ."

            },{
                type: 'info',
                timer: 1000
            });

    	});
	</script>
@endsection
