<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AdministradorModel;
use App\ProfesoresModel;
use App\GruposModel;
use App\PgruposModel;
use App\RmateriaModel;
use App\PmateriaModel;
use App\MateriaModel;
use App\AlumnosModel;
use App\ConsultaModel;
use App\FaltasModel;
use App\Consulta_bachModel;
use App\Faltas_bachModel;
use App\CarreraModel;
use App\NivelModel;
use App\FechasModel;
use View;
use Storage;
use Illuminate\Support\Facades\Input;
use Session;
use App;
use Auth;

class iniciopController extends Controller
{
            /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:profesor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

    	$usrname = Auth::user()->email;

        $log= ProfesoresModel::where('email', '=', $usrname)->first();
        $nombre=$log['name'];
        $id_profesores=$log['id_profesores'];
        $administrador = AdministradorModel::all();
        $pgrupos= PgruposModel::all();
        $grupos= GruposModel::all();
        $pmat = PmateriaModel::all();
        $rmat = RmateriaModel::all();
        $materia = MateriaModel::all();
        $alu = AlumnosModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $calificaciones_bach = Consulta_bachModel::all();
        $faltas_bach = Faltas_bachModel::all();

        Session::put('nombre', $nombre);
        Session::put('id_profesores', $id_profesores); 

        //DB::update('update profesores set diainicio = 07 where id_profesores = ?', ['11']);

        return View::make("maestro/iniciop", array("edit"=>false, 'id_nivel'=> "0", "administrador"=>$administrador, "alu" =>$alu, "pgrupos" => $pgrupos, "grupos" => $grupos, "pmat"=>$pmat,"rmat"=>$rmat,"materia"=>$materia, "calificaciones"=>$calificaciones, "faltas"=>$faltas ));      
        }    

    public function show(){
        $id_grupos = Input::get('id_grupos');
        $descripcion = Input::get('descripcion');
        $id_materias = Input::get('id_materias');

        $administrador = AdministradorModel::all();
        $ng= GruposModel::where('id_grupos',$id_grupos)->first(); 
        $id_nivel= $ng['id_nivel'];
    	$pgrupos= PgruposModel::all();      
        $grupos= GruposModel::all(); 
        $alu = AlumnosModel::all();
        $pmat = PmateriaModel::all();
        $rmat = RmateriaModel::all();
        $materia = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $calificaciones_bach = Consulta_bachModel::all();
        $faltas_bach = Faltas_bachModel::all();
        $carrera = CarreraModel::all();
        $niveles = NivelModel::all();
        $niv= NivelModel::where('id_nivel',$id_nivel)->first(); 
        $nivel = $niv['descripcion'];

        
    if($id_nivel=="2"){
        $fecha= FechasModel::where('id_fecha', '=', $id_nivel)->first();
        $fecha_fin = $fecha['fecha_fin'];
        $fecha_hoy = date("Y-m-d");
        $dias_diferencia   = (strtotime($fecha_hoy)-strtotime($fecha_fin))/86400;
        $dias_diferencia   = abs($dias_diferencia); 
        $dias_diferencia = floor($dias_diferencia);
    }else{
        $fecha= FechasModel::where('id_fecha','=', 1)->first();
        $fecha_fin = $fecha['fecha_fin'];
        $fecha_hoy = date("Y-m-d");
        $dias_diferencia   = (strtotime($fecha_hoy)-strtotime($fecha_fin))/86400;
        $dias_diferencia   = abs($dias_diferencia); 
        $dias_diferencia = floor($dias_diferencia);
    }
        
    return View::make("maestro/iniciop", array("edit"=>true, "administrador"=>$administrador, "pgrupos" => $pgrupos, "grupos" => $grupos,"alu" =>$alu, "id_grupos" => $id_grupos,"descripcion" => $descripcion, "id_materias"=>$id_materias, "ng" => $ng, "pmat"=>$pmat,"rmat"=>$rmat,"materia"=>$materia, "calificaciones"=>$calificaciones, "faltas"=>$faltas, "calificaciones_bach"=>$calificaciones_bach, "faltas_bach"=>$faltas_bach, 'carrera'=>$carrera, 'id_nivel'=>$id_nivel, 'nivel'=>$nivel, 'dias_diferencia'=>$dias_diferencia ));
    }

    public function store(){

        $i= Input::get('i');
        $id_materias= Input::get('id_materias');
        $id_grupos = Input::get('id_grupos');

        for($a=1; $a<=$i; $a++){
        $id_calificaciones = Input::get($a);
        $matricula = Input::get('alumno'.$a);
        $parcial1 = Input::get('parcial1'.$id_calificaciones);
        $parcial2 = Input::get('parcial2'.$id_calificaciones);
        $parcial3 = Input::get('parcial3'.$id_calificaciones);
        $faltas1 = Input::get('faltas1'.$id_calificaciones);
        $faltas2 = Input::get('faltas2'.$id_calificaciones);
        $faltas3 = Input::get('faltas3'.$id_calificaciones);

        $calificaciones= new ConsultaModel;
        $calificaciones->id_calificaciones = $id_calificaciones.$id_materias;
        $calificaciones->id = $id_calificaciones.$id_materias;
        $calificaciones->id_materia = $id_materias;
        $calificaciones->matricula = $matricula;
        $calificaciones->parcial1 = $parcial1;
        $calificaciones->parcial2 = $parcial2;
        $calificaciones->parcial3 = $parcial3;
        $calificaciones->save();

        $faltas= new FaltasModel;
        $faltas->id_faltas = $id_calificaciones.$id_materias;
        $faltas->id = $id_calificaciones.$id_materias;
        $faltas->id_materia = $id_materias;
        $faltas->matricula = $matricula;
        $faltas->parcial1 = $faltas1;
        $faltas->parcial2 = $faltas2;
        $faltas->parcial3 = $faltas3;
        $faltas->save();
    }
        $administrador = AdministradorModel::all();
        $ng= GruposModel::where('id_grupos',$id_grupos)->first(); 
        $id_nivel= $ng['id_nivel'];
        $alu = AlumnosModel::all();
        $pgrupos= PgruposModel::all();
        $grupos= GruposModel::all();
        $pmat = PmateriaModel::all();
        $rmat = RmateriaModel::all();
        $materia = MateriaModel::all();

        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $calificaciones_bach = Consulta_bachModel::all();
        $faltas_bach = Faltas_bachModel::all();
        $carrera = CarreraModel::all();
        $niv= NivelModel::where('id_nivel',$id_nivel)->first(); 
        $nivel = $niv['descripcion'];

    if($id_nivel=="2"){
        $fecha= FechasModel::where('id_fecha', '=', $id_nivel)->first();
        $fecha_fin = $fecha['fecha_fin'];
        $fecha_hoy = date("Y-m-d");
        $dias_diferencia   = (strtotime($fecha_hoy)-strtotime($fecha_fin))/86400;
        $dias_diferencia   = abs($dias_diferencia); 
        $dias_diferencia = floor($dias_diferencia);
    }else{
        $fecha= FechasModel::where('id_fecha','=', 1)->first();
        $fecha_fin = $fecha['fecha_fin'];
        $fecha_hoy = date("Y-m-d");
        $dias_diferencia   = (strtotime($fecha_hoy)-strtotime($fecha_fin))/86400;
        $dias_diferencia   = abs($dias_diferencia); 
        $dias_diferencia = floor($dias_diferencia);
    }

        return View::make("maestro/iniciop", array("edit"=>true, "administrador"=>$administrador, "alu" =>$alu, "id_grupos" => $id_grupos, "id_materias"=>$id_materias, "pgrupos" => $pgrupos, "grupos" => $grupos,"pmat"=>$pmat,"rmat"=>$rmat,"materia"=>$materia, "calificaciones"=>$calificaciones, "faltas"=>$faltas, 'carrera'=>$carrera, 'nivel'=>$nivel, 'id_nivel'=>$id_nivel, 'dias_diferencia'=>$dias_diferencia));
    }


    public function update(){
        $i= Input::get('i');
        $id_materias= Input::get('id_materias');
        $id_grupos = Input::get('id_grupos');

        for($a=1; $a<=$i; $a++){
        $id_calificaciones = Input::get($a);
        $matricula = Input::get('alumno'.$a);
        $parcial1 = Input::get('parcial1'.$id_calificaciones);
        $parcial2 = Input::get('parcial2'.$id_calificaciones);
        $parcial3 = Input::get('parcial3'.$id_calificaciones);
        $faltas1 = Input::get('faltas1'.$id_calificaciones);
        $faltas2 = Input::get('faltas2'.$id_calificaciones);
        $faltas3 = Input::get('faltas3'.$id_calificaciones);

        $calificaciones= ConsultaModel::find($id_calificaciones.$id_materias);
        $calificaciones->parcial1 = $parcial1;
        $calificaciones->parcial2 = $parcial2;
        $calificaciones->parcial3 = $parcial3;
        $calificaciones->save();

        $faltas= FaltasModel::find($id_calificaciones.$id_materias);
        $faltas->parcial1 = $faltas1;
        $faltas->parcial2 = $faltas2;
        $faltas->parcial3 = $faltas3;
        $faltas->save();
    }
        $administrador = AdministradorModel::all();
        $ng= GruposModel::where('id_grupos',$id_grupos)->first(); 
        $id_nivel= $ng['id_nivel'];
        $alu = AlumnosModel::all();
        $pgrupos= PgruposModel::all();
        $grupos= GruposModel::all();
        $pmat = PmateriaModel::all();
        $rmat = RmateriaModel::all();
        $materia = MateriaModel::all();

        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $calificaciones_bach = Consulta_bachModel::all();
        $faltas_bach = Faltas_bachModel::all();
        $carrera = CarreraModel::all();
        $niv= NivelModel::where('id_nivel',$id_nivel)->first(); 
        $nivel = $niv['descripcion'];

        if($id_nivel=="2"){
        $log= ProfesoresModel::where('id_profesores', '=', Session::get('id_profesores'))->first();
        $fecha_hoy = date("Y-m-d");
        $fecha_fin = $log['fecha_fin'];
        $dias_diferencia   = (strtotime($fecha_hoy)-strtotime($fecha_fin))/86400;
        $dias_diferencia   = abs($dias_diferencia); 
        $dias_diferencia = floor($dias_diferencia);
    }else{
        $admin= AdministradorModel::where('id', '=', 1)->first();
        $fecha_hoy = date("Y-m-d");
        $fecha_fin = $admin['fecha_fin_bach'];
        $dias_diferencia   = (strtotime($fecha_hoy)-strtotime($fecha_fin))/86400;
        $dias_diferencia   = abs($dias_diferencia); 
        $dias_diferencia = floor($dias_diferencia);
    }

        return View::make("maestro/iniciop", array("edit"=>true, "administrador"=>$administrador, "alu" =>$alu, "id_grupos" => $id_grupos, "id_materias"=>$id_materias, "pgrupos" => $pgrupos, "grupos" => $grupos,"pmat"=>$pmat,"rmat"=>$rmat,"materia"=>$materia, "calificaciones"=>$calificaciones, "faltas"=>$faltas, 'carrera'=>$carrera, 'nivel'=>$nivel, 'id_nivel'=>$id_nivel, 'dias_diferencia'=>$dias_diferencia));
    }


        public function store_bach(){

        $i= Input::get('i');
        $id_materias= Input::get('id_materias');
        $id_grupos = Input::get('id_grupos');

        for($a=1; $a<=$i; $a++){
        $id_calificaciones = Input::get($a);
        $matricula = Input::get('alumno'.$a);
        $parcial1 = Input::get('parcial1'.$id_calificaciones);
        $parcial2 = Input::get('parcial2'.$id_calificaciones);
        $parcial3 = Input::get('parcial3'.$id_calificaciones);
        $parcial4 = Input::get('parcial4'.$id_calificaciones);
        $faltas1 = Input::get('faltas1'.$id_calificaciones);
        $faltas2 = Input::get('faltas2'.$id_calificaciones);
        $faltas3 = Input::get('faltas3'.$id_calificaciones);
        $faltas4 = Input::get('faltas4'.$id_calificaciones);

        $calificaciones= new Consulta_bachModel;
        $calificaciones->id_calificaciones_bach = $id_calificaciones.$id_materias;
        $calificaciones->id = $id_calificaciones.$id_materias;
        $calificaciones->id_materia = $id_materias;
        $calificaciones->matricula = $matricula;
        $calificaciones->parcial1 = $parcial1;
        $calificaciones->parcial2 = $parcial2;
        $calificaciones->parcial3 = $parcial3;
        $calificaciones->parcial4 = $parcial4;
        $calificaciones->save();

        $faltas= new Faltas_bachModel;
        $faltas->id_faltas_bach = $id_calificaciones.$id_materias;
        $faltas->id = $id_calificaciones.$id_materias;
        $faltas->id_materia = $id_materias;
        $faltas->matricula = $matricula;
        $faltas->parcial1 = $faltas1;
        $faltas->parcial2 = $faltas2;
        $faltas->parcial3 = $faltas3;
        $faltas->parcial4 = $faltas4;
        $faltas->save();
    }
        $administrador = AdministradorModel::all();
        $ng= GruposModel::where('id_grupos',$id_grupos)->first(); 
        $id_nivel= $ng['id_nivel'];
        $alu = AlumnosModel::all();
        $pgrupos= PgruposModel::all();
        $grupos= GruposModel::all();
        $pmat = PmateriaModel::all();
        $rmat = RmateriaModel::all();
        $materia = MateriaModel::all();

        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $calificaciones_bach = Consulta_bachModel::all();
        $faltas_bach = Faltas_bachModel::all();
        $carrera = CarreraModel::all();
        $niv= NivelModel::where('id_nivel',$id_nivel)->first(); 
        $nivel = $niv['descripcion'];

        if($id_nivel=="2"){
        $log= ProfesoresModel::where('id_profesores', '=', Session::get('id_profesores'))->first();
        $fecha_hoy = date("Y-m-d");
        $fecha_fin = $log['fecha_fin'];
        $dias_diferencia   = (strtotime($fecha_hoy)-strtotime($fecha_fin))/86400;
        $dias_diferencia   = abs($dias_diferencia); 
        $dias_diferencia = floor($dias_diferencia);
    }else{
        $admin= AdministradorModel::where('id', '=', 1)->first();
        $fecha_hoy = date("Y-m-d");
        $fecha_fin = $admin['fecha_fin_bach'];
        $dias_diferencia   = (strtotime($fecha_hoy)-strtotime($fecha_fin))/86400;
        $dias_diferencia   = abs($dias_diferencia); 
        $dias_diferencia = floor($dias_diferencia);
    }

        return View::make("maestro/iniciop", array("edit"=>true, "administrador"=>$administrador, "alu" =>$alu, "id_grupos" => $id_grupos, "id_materias"=>$id_materias, "pgrupos" => $pgrupos, "grupos" => $grupos,"pmat"=>$pmat,"rmat"=>$rmat,"materia"=>$materia, "calificaciones"=>$calificaciones, "faltas"=>$faltas, "calificaciones_bach"=>$calificaciones_bach, "faltas_bach"=>$faltas_bach, 'carrera'=>$carrera, 'nivel'=>$nivel, 'id_nivel'=>$id_nivel, 'dias_diferencia'=>$dias_diferencia));
    }


    public function update_bach(){
        $i= Input::get('i');
        $id_materias= Input::get('id_materias');
        $id_grupos = Input::get('id_grupos');

        for($a=1; $a<=$i; $a++){
        $id_calificaciones = Input::get($a);
        $matricula = Input::get('alumno'.$a);
        $parcial1 = Input::get('parcial1'.$id_calificaciones);
        $parcial2 = Input::get('parcial2'.$id_calificaciones);
        $parcial3 = Input::get('parcial3'.$id_calificaciones);
        $parcial4 = Input::get('parcial4'.$id_calificaciones);
        $faltas1 = Input::get('faltas1'.$id_calificaciones);
        $faltas2 = Input::get('faltas2'.$id_calificaciones);
        $faltas3 = Input::get('faltas3'.$id_calificaciones);
        $faltas4 = Input::get('faltas4'.$id_calificaciones);

        $calificaciones= Consulta_bachModel::find($id_calificaciones.$id_materias);
        $calificaciones->parcial1 = $parcial1;
        $calificaciones->parcial2 = $parcial2;
        $calificaciones->parcial3 = $parcial3;
        $calificaciones->parcial4 = $parcial4;
        $calificaciones->save();

        $faltas= Faltas_bachModel::find($id_calificaciones.$id_materias);
        $faltas->parcial1 = $faltas1;
        $faltas->parcial2 = $faltas2;
        $faltas->parcial3 = $faltas3;
        $faltas->parcial4 = $faltas4;
        $faltas->save();
    }
        $administrador = AdministradorModel::all();
        $ng= GruposModel::where('id_grupos',$id_grupos)->first(); 
        $id_nivel= $ng['id_nivel'];
        $alu = AlumnosModel::all();
        $pgrupos= PgruposModel::all();
        $grupos= GruposModel::all();
        $pmat = PmateriaModel::all();
        $rmat = RmateriaModel::all();
        $materia = MateriaModel::all();

        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $calificaciones_bach = Consulta_bachModel::all();
        $faltas_bach = Faltas_bachModel::all();
        $carrera = CarreraModel::all();
        $niv= NivelModel::where('id_nivel',$id_nivel)->first(); 
        $nivel = $niv['descripcion'];

        if($id_nivel=="2"){
        $log= ProfesoresModel::where('id_profesores', '=', Session::get('id_profesores'))->first();
        $fecha_hoy = date("Y-m-d");
        $fecha_fin = $log['fecha_fin'];
        $dias_diferencia   = (strtotime($fecha_hoy)-strtotime($fecha_fin))/86400;
        $dias_diferencia   = abs($dias_diferencia); 
        $dias_diferencia = floor($dias_diferencia);
    }else{
        $admin= AdministradorModel::where('id', '=', 1)->first();
        $fecha_hoy = date("Y-m-d");
        $fecha_fin = $admin['fecha_fin_bach'];
        $dias_diferencia   = (strtotime($fecha_hoy)-strtotime($fecha_fin))/86400;
        $dias_diferencia   = abs($dias_diferencia); 
        $dias_diferencia = floor($dias_diferencia);
    }

        return View::make("maestro/iniciop", array("edit"=>true, "administrador"=>$administrador, "alu" =>$alu, "id_grupos" => $id_grupos, "id_materias"=>$id_materias, "pgrupos" => $pgrupos, "grupos" => $grupos,"pmat"=>$pmat,"rmat"=>$rmat,"materia"=>$materia, "calificaciones"=>$calificaciones, "faltas"=>$faltas, "calificaciones_bach"=>$calificaciones_bach, "faltas_bach"=>$faltas_bach, 'carrera'=>$carrera, 'nivel'=>$nivel, 'id_nivel'=>$id_nivel, 'dias_diferencia'=>$dias_diferencia));
    }


    public function logout(){
    return View("maestro/loginp");
    Session::flush();
    }

}