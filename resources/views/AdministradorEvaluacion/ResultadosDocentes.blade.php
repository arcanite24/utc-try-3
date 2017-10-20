@extends('layouts.admin')
@section('contenido')

<div class="container">
       <div class="row">
         <div class="row">
            <div class="col-lg-12 text-center">

                </ul>
            </div>
        </div>
        <br>

         <div class="row">
            <div class="col-lg-12 text-center">
                <h1><a><b>Evaluacion</b>DOCENTE | ADMINISTRATIVA </a></h1>
                <h2>Consulta de Resultados</h2>
                <h3>Evaluacion Docente</h3>
            </div>
        </div>

        

         <h2>Comparativa por carrera</h2>

          <table class="table table-striped">

   @foreach ($carreras as $carrera)
    {{csrf_field()}}
    
        <form method="POST" action="/Show">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <h2><input type="submit" id="list"  class="list-group-item" class="btn btn-primary " value=" {{ $carrera->descripcionc}}">
            </h2>
    </form> 
  
    @endforeach
      </table>

          
</li>
       </ul>
      <style type="text/css">
            .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"], .radio input[type="radio"], .radio-inline input[type="radio"] {
                position: initial;
            }

            #list{
            background-color: rgba(46, 134, 193, 0.91);
            width: 60%;
            margin-left: 20%;
            }

        
        </style>
         <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <!-- /.row -->
    </div>
        </div>
      
    </div>
</div>
@endsection
