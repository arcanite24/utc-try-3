<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use View;
use DB;




class ResultadoAdministrativoController extends Controller
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

    $planteles = DB::table('plantel')
 ->select('plantel.descripcion','plantel.id_plantel')
 ->get();
 
return View::make('AdministradorEvaluacion/ResultadosAdministrativos')->with('planteles',$planteles);
  
  }
  
}
