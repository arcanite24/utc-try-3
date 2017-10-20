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
                 <h1><a><b>Evaluacion</b>ADMINISTRATIVA</a></h1>
                <h3>La evaluacion esta disponible para los siguientes Administrativos</h3>
            </div>
        </div>

        <ul class="list-group">
           <h3>
<li>
       <table class="table table-striped">

    @foreach ($administrador as $admin)
    {{csrf_field()}}
    
        <form method="post" action="{{url('/ShowAdmin')}}">
            {{csrf_field()}}
            <input type="hidden" name="token" value=" {{csrf_token()}}">
            <input type="hidden" name="id_admin" value=" {{ $admin->id_administrador}} ">
            <br><input type="submit" name="datosadmin" id="list"  class="list-group-item" class="btn btn-primary " value=" {{ $admin->name}}">
               <input type="hidden" name="id_alumno" value="{{ $admin->id_alumnos}}">
            
    </form> 
            <input type="submit" id="list"   class="btn btn-primary " value=" {{ $admin->descripcion}}"><br>
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

            #list2{
                background-color: rgba(0, 132, 255, 0.72);
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