@extends('layouts.app22')

@section('content')
<div class="container">
    <div class="row">
        
            
                 
				<div class="content">
            <div class="container-fluid">
<div class="col-md-4">
                        <div class="card">

							<div class="header">
                                <h4 class="title">Control de documentos</h4>
                                <p class="category"></p>
                            </div>
							
</div>
                        </div>
				
<table class="table table-bordered" id="MyTable">
  <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Descripcion</th>
        
        <th class="text-center">Acciones</th>
    </tr>
	  @foreach($datos as $dato)
	  <form action="/crud_elimina">
	  <tr>
        <th class="text-center">{{$dato->id}}</th>
		<input type="hidden" name="id" value="{{$dato->id}}">
        <th class="text-center">{{$dato->name}}</th>
		  <input type="hidden" name="name" value="{{$dato->name}}">
        <th class="text-center">{{$dato->url}}</th>
		  <input type="hidden" name="url" value="{{$dato->url}}">
		<th class="text-center"><button type="submit" class="btn btn-danger" >Eliminar</button>
		  </th>
    </tr>
		  </form>
	  @endforeach	  
  </thead>  
</table>


      </div>
                            </div>
                        </div>
                    </div>
<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-user',
            	message: "<b>{{ Auth::user()->name }}</b>, aqui podras volver a descargar o eliminar los horarios que necesites o ya no necesites ."

            },{
                type: 'info',
                timer: 1000
            });

    	});
	</script>
@endsection