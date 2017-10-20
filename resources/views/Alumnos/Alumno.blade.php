@extends('layouts.alum')
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
                <h1><a><b>Evaluacion</b>DOCENTE</a></h1>
                <h3>La evaluacion esta disponible para los siguientes profesores</h3>
            </div>
        </div>

        <ul class="list-group">
           <h2>
<li>
      
                   
     <table class="table table-striped">

    @foreach ($profesores as $profesor)
    {{csrf_field()}}
    
        <form method="POST" action="{{url('/Show')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id_profesor" value="{{ $profesor->id_profesores}}">
             <input type="hidden" name="id_alumno" value="{{ $profesor->id_alumnos}}">
            <input type="submit" name="datos" id="list"  class="list-group-item" class="btn btn-primary " value=" {{ $profesor->name}}">
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
