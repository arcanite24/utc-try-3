<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use View;
use DB;




class ResultadoDocenteController extends Controller
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
 
 $carreras = DB::table('carrera')
 ->select('carrera.descripcionc')
 ->get();



   return View::make('AdministradorEvaluacion/ResultadosDocentes')->with('carreras',$carreras);
  
  }
}
