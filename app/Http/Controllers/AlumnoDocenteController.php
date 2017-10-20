<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use View;
use DB;
use App\Post as Post;
use Redirect;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;



class AlumnoDocenteController extends Controller
{
    /**
     * Create a new controller insta
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
 public function Create()
  {
return View::make('Alumnos/home');
}

   public function index()
  {

 

        $profesores = DB::table('profesores')

            ->join('profesores_has_grupos', 'profesores_has_grupos.id_profesores', '=', 'profesores.id_profesores')

            ->leftjoin('alumnos', 'alumnos.id_grupos', '=', 'profesores_has_grupos.id_grupos')

            ->where('alumnos.id_alumnos','=','1')

            ->select('profesores.name','profesores.id_profesores','alumnos.id_alumnos')

            ->get();

return View::make('Alumnos/Alumno')->with('profesores',$profesores);
        
  
  }
 
   public function Show(Request $request)
  {


        $dato=Input::get('datos');

        $id=Input::get('id_profesor');

        $id_alum=Input::get('id_alumno');


        return View::make('Alumnos/Evaluacion')->with('id',$id)->with('dato',$dato)->with('id_alum',$id_alum);
  
  }

   public function Store(Request $request)
  {
    $id_alum=Input::get('id_alumno');
    $id=Input::get('id_profesor');


    $uno=Input::get('uno');
    $dos=Input::get('dos');
    $tres=Input::get('tres');
    $cuatro=Input::get('cuatro');
    $cinco=Input::get('cinco');
    $seis=Input::get('seis');
    $siete=Input::get('siete');
    $ocho=Input::get('ocho');
    $nueve=Input::get('nueve');
    $diez=Input::get('diez');
    $comentario=$request->Input('comentario');
    $rubro1=$uno+$dos+$tres+$cuatro+$cinco;
    $rubro2=$seis+$siete+$ocho+$nueve+$diez;

    DB::table('prueba')->insert(array(
    array('id_alumno' => $id_alum, 
          'id_profesores' =>$id,	
          'p1' => $uno,
          'p2' => $dos,
          'p3' => $tres,
          'p4' => $cuatro,
          'p5' => $cinco,
          'p6' => $seis,
          'p7' => $siete,
          'p8' => $ocho,
          'p9' => $nueve,
          'p10' => $diez,
          'comentario' => $comentario,
          ),
    
));
    echo "Evaluacion Completa<br/>";

    return Redirect::to('Alumnos/Alumno');
  }
 
}
