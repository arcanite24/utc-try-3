<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class HorarioController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
	
	public function index(){
		return view ('calendario.home');
	}
	
	public function horarios(){
		return view('calendario.horario');		
	}
	
	public function estadisticas(){
		$planteles = DB::table('plantel')->get();
		
		$usuarios = DB::table('users')->get();
		return view('calendario.estadisticas',compact('usuarios'),compact('planteles'));
	}
	
		public function chartjs(){
   /* $viewer = View::select(DB::raw("SUM(numberofview) as count"))
        ->orderBy("created_at")
        ->groupBy(DB::raw("year(created_at)"))
        ->get()->toArray();
    $viewer = array_column($viewer, 'count');
    
    $click = Click::select(DB::raw("SUM(numberofclick) as count"))
        ->orderBy("created_at")
        ->groupBy(DB::raw("year(created_at)"))
        ->get()->toArray();
    $click = array_column($click, 'count');
    */
    return view('calendario.chartjs');
            //->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))
            //->with('click',json_encode($click,JSON_NUMERIC_CHECK));
}
	
	public function pdfview(Request $request)
    {
        $planteles = Input::get('plantel');
		$niveles = Input::get('nivel');
		$carreras = Input::get('carrera');
		$turnos = Input::get('turno');
		
		
		$string = str_random(5);
		//$fecha = new DateTime();
		//$aleatorio = $fecha->getTimestamp();
		if($planteles=='Zona Rosa'){
			$inicia = 'zr';
		}else{
			$inicia = 'all';
		}
		$name=$inicia.'-'.$string.'.pdf';
		//$name='loquillo'.$string.'.pdf';
		// si funca  $name='loquillo'.Carbon::now()->toDateTimeString().'';
		$pdf = PDF::loadView('calendario.horariopdf',compact('planteles','niveles','carreras','turnos'));
		//$ruta = '/public/horarios/loquillo'.Carbon::now()->toDateTimeString().'.pdf';
		$ruta = '/public/horarios/'.$name;
		//si funca Storage::put('/public/horarios/loquillo.pdf',$pdf->output());
		Storage::put($ruta,$pdf->output());
		DB::insert('insert into pdfs (name,url) values(?,?)',[$name,$ruta]);
		
		return $pdf->stream('calendario.pdfview.pdf');
    }
	
	public function manual(){
		return view('calendario.horariomanual');
	}
	
	public function automatico(){
		$carreras = DB::table('carrera')->get();
		$planteles = DB::table('plantel')->get();
		$niveles = DB::table('nivel')->get();
		$turnos = DB::table('turno')->get();
		
        return view('calendario.horarioautomatico',compact('niveles','carreras','planteles','turnos'));
	}
	
	public function estadistico(){
		 return view('calendario.horarioestadistico');
	}
	
	public function crudsito(){
		$datos = DB::table('pdfs')->get();
		return view('calendario.crud',compact('datos'));
	}
	
	public function mata(Request $request){
		
		$id=Input::get('id');		
		DB::table('pdfs')->where('id',$id)->delete();
		$datos = DB::table('pdfs')->get();
		return view('calendario.crud',compact('datos'));
	}
	
	public function descarga($id){
		return view('calendario.horario');
	}

}
