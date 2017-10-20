<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
</head>
<body>


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
                position: 'center',
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
				display:false,
                position: 'center',
            },
            title: {
                display: false,
                text: 'Materias reprobadas GLOBAL 11'
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
	
	
	

    window.onload = function() {
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
		
		
    };

    </script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Estadisticas</div>
                <div class="panel-body">
                    <canvas id="canvas" height="280" width="600"></canvas>
				</div>
				
				<div id="canvas-holder" height="280" width="400">
        			<canvas id="chart-area" />
    			</div>
				<br><br>
				<div id="canvas-holder" height="280" width="400">
        			<canvas id="pie" />
    			</div>
				<br><br>
				<div id="canvas-holder" height="280" width="400">
        			<canvas id="log-line" />
    			</div>
				@foreach ($usuarios as $usuario)
				<p>
				{{$usuario->email}}
				</p>
				@endforeach
            </div>
        </div>
    </div>
</div>
</body>


</html>

