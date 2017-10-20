@extends('layouts.app22')

@section('content')


<style>

</style>
<div class="container">
    <div class="row">
        
				<div class="content">
            <div class="container-fluid">
			<div class="col-md-8">
                        <div class="card">
		<div class="panel-heading">Generar Nuevo Horario</div>
					</div>
				</div>
				<div class="col-md-8">
                        <div class="card">
                <div class="panel-body">
                    Vista del modulo de horarios
                </div>
				<button type="submit" class="btn btn-primary" onclick="location.href='/admin/calendario/automatico'">Generar Automaticamente</button>
				<!---<button type="submit" class="btn btn-danger" onclick="location.href='/estadistico'">Generar por Estadisticas</button>
				<button type="submit" class="btn btn-success" onclick="location.href='/manual'">Generar Manualmente</button>
		--->
						
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
            	message: "<b>{{ Auth::user()->name }}</b>, aqui podras generar los horarios de examenes que necesites ."

            },{
                type: 'info',
                timer: 1000
            });

    	});
	</script>

@endsection