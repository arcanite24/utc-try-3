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
                <h3>Realiza la Evaluacion con la mayor honestidad posible</h3>
                 <h3>Evaluando a :</h3>
                 <h2><a><b>
             {{ $dato}}
          
                </b></a><h2>


            </div>
            
        </div>

       <table class="table table-bordered">
        <thead>
          <tr>
          <th><h3>Rubrica</h3></th>
            <th>Nunca</th>
            <th>Casi Nunca</th>
            <th>A veces</th>
            <th>Casi Siempre</th>
            <th>Siempre</th>
          </tr>
        </thead>
        <tbody>
          <form method="post"  action="{{url('/Store')}}" id="formulario" name="formulario">
              <tr>
                <td><strong>DOMINIO DE CONTENIDO,  METODOLOGÍA, MOTIVACIÓN</strong></td>
                <td>
                  <label class="radio-inline">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  </label>
                </td>
              </tr>

              <tr>
                <td>1).- El docente da explicaciones e instrucciones claras y sin contradicciones  de contenidos teóricos y para la realización de proyectos</td>
               <td>
                  <label class="radio-inline">
                  <input type="radio" name="uno" value="1">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="uno" value="2">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="uno" value="3">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="uno" value="4">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  <input type="radio" name="uno" value="5">
                  </label>
                </td>
                
              </tr>

              <tr>
                <td>2).- Los contenidos son actualizados y cumplen con lo planteado en el temario</td>
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
                <td>3).- Los criterios de evaluación son congruentes con el objetivo a alcanzar</td>
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
                <td>4).- Utiliza diversos recursos para facilitar el aprendizaje y  propone actividades prácticas para fortalecer los conocimientos teóricos</td>
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
                <td>5).- El profesor toma en cuenta las experiencias del alumno para facilitar el aprendizaje a través de un lenguaje claro </td>
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
                <td><strong>LIDERAZGO, CONTROL DE GRUPO</strong></td>
                <td>
                  <label class="radio-inline">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  </label>
                </td>
                <td>
                  <label class="radio-inline">
                  </label>
                </td>
              </tr>

              <tr>
                <td>1).- El profesor monitorea las actividades realizadas en el aula proporcionando retroalimentación constante </td>
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
                <td>2).- Resuelve conflictos o inconformidades de modo asertivo</td>
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
                <td>3).- El profesor promueve que el estudiante aprenda por mí mismo</td>
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
                <td>4).- Mantiene  un buen control del grupo durante la sesión </td>
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
                <td>5).- Establece relaciones fluidas  desde una perspectiva tolerante y comunicación asertiva</td>
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
      <td> <label for="comment">Comentario:</label>
            <textarea name="comentario" class="form-control" rows="6" id="comment"  onkeypress="return soloLetras(event)" ></textarea> </td>


              </tr>

              

              <td>
                 
                 <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="id_alumno" value="{{ $id_alum}}">
                   <input type="hidden" name="id_profesor" value="{{$id}}">
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
 