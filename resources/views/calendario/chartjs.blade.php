@extends('layouts.app22')

@section('content')


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>





<script src="{{ asset('js/utils.js') }}"></script>



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

  

        var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    40,
                    70,
                    89,
                    10,
                    22,
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Sistemas",
                "Pedagogia",
                "Turismo",
                "Derecho",
                "Contaduria"
            ]
        },
        options: {
            responsive: true,
            legend: {
				display:false,
                position: 'top',
            },
            title: {
                display: true,
                text: 'Materias reprobadas por carrera'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };
	//
	var configp = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    100,
                    300,
                    50,
                    60,
                    130,
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                ],
				label: 'Dataset 1'
            }],
            labels: [
                "Calculo",
                "Sociologia",
                "Estadistica",
                "Derecho 1",
                "Fisica"
            ]
        },
        
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Materias reprobadas GLOBAL'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }

    };
	//
	var configxx = {
        type: 'line',
        data: {
            labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
            datasets: [{
                label: "2016",
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.red,
                fill: false,
                data: [
                    40, 
                    50, 
                    20, 
                    60, 
                    80, 
                    110, 
                    65
                ],
            }, {
                label: "2017",
                backgroundColor: window.chartColors.blue,
                borderColor: window.chartColors.blue,
                fill: false,
                data: [
                    120, 
                    115, 
                    130, 
                    159, 
                    230, 
                    78, 
                    112
                ],
            }]
        },
        options: {
            responsive: true,
            title:{
                display:true,
                text:'Comparativo de reprobados 2016 - 2017 GLOBAL'
            },
            scales: {
                xAxes: [{
                    display: true,
                }],
                yAxes: [{
                    display: true,
                    type: 'logarithmic',
                }]
            }
        }
    };
	//
	var chartColors = window.chartColors;
    var color = Chart.helpers.color;
    var configpolar = {
        data: {
            datasets: [{
                data: [
                    50,
                    30,
                    130,
                    60,
                ],
                backgroundColor: [
                    color(chartColors.red).alpha(0.5).rgbString(),
                    color(chartColors.blue).alpha(0.5).rgbString(),
                    color(chartColors.yellow).alpha(0.5).rgbString(),
                    color(chartColors.green).alpha(0.5).rgbString(),
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                "Bachillerato",
                "Licenciatura",
                "Licenciatura Ejecutiva",
                "Maestria"
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'right',
            },
            title: {
                display: true,
                text: 'Numero de alumnos reprobados por Nivel'
            },
            scale: {
              ticks: {
                beginAtZero: true
              },
              reverse: false
            },
            animation: {
                animateRotate: false,
                animateScale: true
            }
        }
    };
	
	
	

	

    window.onload = function carga() {
        var ctxx = document.getElementById("chart-area").getContext("2d");
        window.myDoughnut = new Chart(ctxx, config);
		//
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
		//
		var ctxy = document.getElementById("pie").getContext("2d");
        window.myPie = new Chart(ctxy, configp);
		//
		var ctx = document.getElementById("log-line").getContext("2d");
        window.myLine = new Chart(ctx, configxx);
		//
		var ctxzz = document.getElementById("polar-area");
        window.myPolarArea = Chart.PolarArea(ctxzz, configpolar);
		//
	};
    </script>
<div class="container">
    <div class="row">
		
		
			<div class="content">
            <div class="container-fluid">
						<div class="col-md-8">
                        <div class="card">
                <div class="panel-heading">Estadisticas</div>
					</div>
					</div>	
				<div class="col-md-8">
                        <div class="card">
                <div class="panel-body">
                    <canvas id="canvas" style="width:50%"></canvas>
				</div></div></div>
				<div class="col-md-8">
                        <div class="card">
				<div id="canvas-holder" style="width:70%">
        			<canvas id="chart-area" />
    			</div></div></div>
				<br><br><div class="col-md-8">
                        <div class="card">
				<div id="canvas-holder" style="width:70%">
        			<canvas id="pie" />
    			</div></div></div>
				<br><br><div class="col-md-8">
                        <div class="card">
				<div id="canvas-holder" style="width:90%">
        			<canvas id="log-line" />
    			</div></div></div>
				<div class="col-md-8">
                        <div class="card">
				<div id="canvas-holder" style="width:70%">
        			<canvas id="polar-area" />
    			</div></div></div>
            
		
			</div>
		</div>	
		
    </div>
</div>
<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-user',
            	message: "<b>{{ Auth::user()->name }}</b>, aqui encontraras estadisticas para tomar mejores decisiones ."

            },{
                type: 'info',
                timer: 1000
            });

    	});
	</script>

@endsection