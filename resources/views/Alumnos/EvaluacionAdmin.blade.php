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
                <h3>Realiza la Evaluacion con la mayor honestidad posible</h3>

                  <h3>Evaluando a :</h3>
                 <h2><a><b>
             {{ $datoA }}
            
                </b></a><h2>
            </div>
        </div>

        <table class="table table-bordered">
        <thead>
          <tr>
          <th>Rubrica</th>
            <th>Nunca</th>
            <th>Casi Nunca</th>
            <th>A veces</th>
            <th>Casi Siempre</th>
            <th>Siempre</th>
          </tr>
        </thead>
        <tbody>
          <form method="post"  action="{{url('/StoreAdmin')}} ">
            {!! csrf_field() !!}
           

              <tr>
                <td>1).- El trato y el servicio que recibiste por parte de tu coordinación fue amable</td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="uno" value="1" checked>
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="uno" value="2" checked>
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="uno" value="3" checked>
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="uno" value="4" checked>
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="uno" value="5" checked>
                  </label>
                </td>
              </tr>

              <tr>
                <td>2).- El tiempo brindado por tu coordinación para escuchar la situación o problemática fue óptimo</td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="dos" value="1">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="dos" value="2">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="dos" value="3">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="dos" value="4">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="dos" value="5">
                  </label>
                </td>
              </tr>
              <tr>
                <td>3).- La intervención se llevó a cabo en un clima de respeto y confidencialidad (de haber sido necesario)</td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="tres" value="1">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="tres" value="2">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="tres" value="3">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="tres" value="4">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="tres" value="5">
                  </label>
                </td>
              </tr>

              <tr>
                <td>4).- El lenguaje  empleado por tu coordinación fue el adecuado</td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="cuatro" value="1">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="cuatro" value="2">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="cuatro" value="3">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="cuatro" value="4">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="cuatro" value="5">
                  </label>
                </td>
              </tr>

              <tr>
                <td>5).- El coordinador conocía los procesos y requisitos para dar solución a la problemática</td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="cinco" value="1">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="cinco" value="2">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="cinco" value="3">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="cinco" value="4">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="cinco" value="5">
                  </label>
                </td>
              </tr>

              <tr>
                <td>6).- La información brindada fue clara, precisa y oportuna para solucionar la problemática y se platearon los posibles escenarios de solución</td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="seis" value="1">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="seis" value="2">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="seis" value="3">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="seis" value="4">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="seis" value="5">
                  </label>
                </td>
              </tr>

              <tr>
                <td>7).- Se involucró de manera adecuada a las personas necesarias para dar solución a la problemática (padres, docentes, coordinadores, etc)</td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="siete" value="1">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="siete" value="2">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="siete" value="3">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="siete" value="4">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="siete" value="5">
                  </label>
                </td>
              </tr>

              <tr>
                <td>8).- De ser necesario se le canalizó al área correspondiente para el seguimiento de su problemática</td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="ocho" value="1">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="ocho" value="2">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="ocho" value="3">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="ocho" value="4">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="ocho" value="5">
                  </label>
                </td>
              </tr>

              <tr>
                <td>9).- Siempre que fue necesario se te buscó en el aula o se te localizó vía telefónica</td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="nueve" value="1">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="nueve" value="2">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="nueve" value="3">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="nueve" value="4">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="nueve" value="5">
                  </label>
                </td>
              </tr>

              <tr>
                <td>10).- La coordinación cumplió en tiempo y forma con las citas agendadas</td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="diez" value="1">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="diez" value="2">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="diez" value="3">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="diez" value="4">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="diez" value="5">
                  </label>
                </td>
              </tr>

              <tr>
                <td>11).- El acompañamiento de tu coordinación se llevó a cabo hasta la solución del problema</td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="once" value="1">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="once" value="2">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="once" value="3">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="once" value="4">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="once" value="5">
                  </label>
                </td>
              </tr>

              <tr>
                <td>12).- La aplicación del reglamento en la resolución de su conflicto fue la adecuada</td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="doce" value="1">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="doce" value="2">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="doce" value="3">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="doce" value="4">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="doce" value="5">
                  </label>
                </td>
              </tr>

                           <tr>
                   <script>
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz:";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function limpia() {
    var val = document.getElementById("comment").value;
    var tam = val.length;
    for(i = 0; i < tam; i++) {
        if(!isNaN(val[i]))
            document.getElementById("comment").value = '';
    }
}
</script>
                <td> <label for="comment">Comentario:</label>
            <textarea name="comentario" class="form-control" rows="6" id="comment"  onkeypress="return soloLetras(event)" ></textarea> </td>


              </tr>

              

              
              <td>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="id_alumno" value="{{$id_alumA}}">
                   <input type="hidden" name="id_admin" value="{{$idA}}">

                <button type="submit" class="btn btn-primary" id="boton">Terminar</button>
              </td>              

            </form>
          </tbody>
        </table>

        <style type="text/css">
        .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"], .radio input[type="radio"], .radio-inline input[type="radio"] {
            position: initial;
        }

        #enc{
          padding-top: 50px;
        }
        </style>
          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function() {
            
            $("#boton").click(function ( event ) {  

              if( $("input[name='uno']:radio").is(':checked') && $("input[name='dos']:radio").is(':checked') && $("input[name='tres']:radio").is(':checked') && $("input[name='cuatro']:radio").is(':checked') && $("input[name='cinco']:radio").is(':checked') && $("input[name='seis']:radio").is(':checked') && $("input[name='siete']:radio").is(':checked') && $("input[name='ocho']:radio").is(':checked') && $("input[name='nueve']:radio").is(':checked') && $("input[name='diez']:radio").is(':checked')) {  
                alert("¡EVALUACION COMPLETA, tu opinion es muy importante para nosotros!");
                $("#formulario").submit();  
              } else{  
                event.preventDefault();
                alert("¡Completa todos los reactivos por favor!");  
              }  
            });
           });
        </script>

 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        <!-- /.row -->
    </div>
        </div>
      
    </div>
</div>
@endsection
