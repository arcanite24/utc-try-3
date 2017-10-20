<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use View;
use DB;
use Redirect;





class AlumnoAdminController extends Controller
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
   public function index()
  {
 

        $administrador = DB::table('administrador')

             ->join('plantel_has_grupos', 'plantel_has_grupos.id_plantel', '=', 'administrador.id_plantel')

            ->leftjoin('alumnos', 'alumnos.id_grupos', '=', 'plantel_has_grupos.id_grupos')

            ->where('id_alumnos','=','1')

            ->select('administrador.name','administrador.descripcion','administrador.id_administrador','alumnos.id_alumnos')

            ->get();

return View::make('Alumnos/AlumnoAdmin')->with('administrador',$administrador);
        
  
  }
 
   public function ShowAdmin(Request $request)
  {

      $datoA =Input::get('datosadmin');
        $idA=Input::get('id_admin');
        $id_alumA=Input::get('id_alumno');

       return View::make('Alumnos/EvaluacionAdmin')->with('datoA',$datoA)->with('idA',$idA)->with('id_alumA',$id_alumA);
  
  }

    public function StoreAdmin(Request $request)
  {
    $id_alum=Input::get('id_alumno');
    $id=Input::get('id_admin');


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
    $once=Input::get('once');
    $doce=Input::get('doce');
    $comentario=$request->Input('comentario');

DB::table('prueba_bach')->insert(array(
    array('id_alumno' => $id_alum, 
          'id_administrador' =>$id,	
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
          'p11' => $once,
          'p12' => $doce,
          'comentario' => $comentario,
          ),
    
));
  


    return Redirect::to('Alumnos/AlumnoAdmin');

  
  }
}
