<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AdministradorModel;
use App\ProfesoresModel;
use App\GruposModel;
use App\PgruposModel;
use App\AlumnosModel;
use App\Alumnos_bachModel;
use App\ConsultaModel;
use App\MateriaModel;
use App\RmateriaModel;
use App\PmateriaModel;
use App\FaltasModel;
use App\CarreraModel;
use App\PlantelModel;
use App\TurnoModel;
use App\PruebaModel;
use App\GplantelModel;
use App\NivelModel;
use App\Consulta_bachModel;
use App\Faltas_bachModel;
use App\FechasModel;
use View;
use Storage;
use Illuminate\Support\Facades\Input;
use Session;
use Rule;
use DateTime;
use DB;
use Auth;

class inicioadminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $administrador = AdministradorModel::all();
        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();
        $plantel = PlantelModel::all();
        $alumnos = AlumnosModel::all();
        $grupos = GruposModel::all();
        $gplantel = GplantelModel::all();
        $fechas =FechasModel::all();

        return View::make("admin/production/admin", array("tabla"=>false, "administrador"=>$administrador, "rmat"=>$rmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas,"pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "gplantel"=>$gplantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "fechas"=>$fechas )); 
        }   

    public function login(Request $request){

        $this->validate($request, [
            'usradmin'=> 'required',
            'pswadmin'=> 'required',
            ] );

        $usrname = Input::get('usradmin');
        $password = Input::get('pswadmin');

        $administrador = AdministradorModel::all();
        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();
        $plantel = PlantelModel::all();
        $alumnos = AlumnosModel::all();
        $grupos = GruposModel::all();
        $gplantel = GplantelModel::all();
        $fechas =FechasModel::all();

        return View::make('admin/production/admin', array("tabla"=>false, "administrador"=>$administrador, "rmat"=>$rmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas, "pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "fechas"=>$fechas ));      
        }

    public function parcial(){
        $id_parcial = Input::get('parcial');

        $parcial = FechasModel::findOrFail(2); 
        $parcial->parcial_activo = $id_parcial;
        $parcial->save();

    
        $administrador = AdministradorModel::all();
        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();
        $plantel = PlantelModel::all();
        $alumnos = AlumnosModel::all();
        $grupos = GruposModel::all();
        $gplantel = GplantelModel::all(); 
        $fechas =FechasModel::all();

        return redirect()->back()->with("admin/production/admin", array("tabla"=>false, "administrador"=>$administrador, "rmat"=>$rmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas,"pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "gplantel"=>$gplantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "fechas"=>$fechas )); 
        }

    public function parcial_bach(){
        $id_parcial = Input::get('parcial');

        $parcial = FechasModel::findOrFail(1); 
        $parcial->parcial_activo = $id_parcial;
        $parcial->save();
    
        $administrador = AdministradorModel::all();
        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();
        $plantel = PlantelModel::all();
        $alumnos = AlumnosModel::all();
        $grupos = GruposModel::all();
        $gplantel = GplantelModel::all();
        $fechas =FechasModel::all();    

        return View::make("admin/production/admin", array("tabla"=>false, "opcion"=>true, "administrador"=>$administrador, "rmat"=>$rmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas,"pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "gplantel"=>$gplantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "fechas"=>$fechas )); 
        }


        public function activar(){

        $fecha_inicio = Input::get('fecha_inicio');
        $fecha_fin = Input::get('fecha_fin');

        //ACTUALIZA LA FECHA DE INICIO EN LOS PROFESORES
        if(strtotime($fecha_fin) >= strtotime($fecha_inicio)){
         //OBTIENE LOS DIAS RESTANTES   
         $dias   = (strtotime($fecha_inicio)-strtotime($fecha_fin))/86400;
         $dias   = abs($dias); $dias = floor($dias); 

        $activar= FechasModel::find('2');
        $activar->fecha_fin = $fecha_fin;
        $activar->save(); 
        }else{
        $activar= FechasModel::find('2');
        $activar->fecha_fin = date("Y-m-d");
        $activar->save();
    }

        $administrador = AdministradorModel::all();
        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();
        $plantel = PlantelModel::all();
        $alumnos = AlumnosModel::all();
        $grupos = GruposModel::all();
        $gplantel = GplantelModel::all();
        $fechas =FechasModel::all();

         if(strtotime($fecha_fin) >= strtotime($fecha_inicio)){
            return View::make("admin/production/admin", array("tabla"=>false, "administrador"=>$administrador, "rmat"=>$rmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas,"pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "gplantel"=>$gplantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "fechas"=>$fechas )); 
        }


        return View::make("admin/production/admin", array("tabla"=>false, "administrador"=>$administrador, "rmat"=>$rmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas,"pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "gplantel"=>$gplantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "fechas"=>$fechas )); 
        }


     public function activar_bach(){
        $fecha_inicio_bach = Input::get('fecha_inicio_bach');
        $fecha_fin_bach = Input::get('fecha_fin_bach');

      //ACTUALIZA LA FECHA DE INICIO EN LOS PROFESORES
        if(strtotime($fecha_fin_bach) >= strtotime($fecha_inicio_bach)){

        $activar= FechasModel::find('1');
        $activar->fecha_fin = $fecha_fin_bach;
        $activar->save(); 
        }else{
        $activar= FechasModel::find('1');
        $activar->fecha_fin = date("Y-m-d");
        $activar->save();
    }

        $administrador = AdministradorModel::all();
        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();
        $plantel = PlantelModel::all();
        $alumnos = AlumnosModel::all();
        $grupos = GruposModel::all();
        $gplantel = GplantelModel::all();
        $fechas =FechasModel::all();

         if(strtotime($fecha_fin_bach) >= strtotime($fecha_inicio_bach)){
            return View::make("admin/production/admin", array("tabla"=>false, "opcion"=>true, "administrador"=>$administrador, "rmat"=>$rmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas,"pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "gplantel"=>$gplantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "fechas"=>$fechas )); 
        }


        return View::make("admin/production/admin", array("tabla"=>false, "opcion"=>true, "administrador"=>$administrador, "rmat"=>$rmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas,"pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "gplantel"=>$gplantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "fechas"=>$fechas )); 
        }


        

    public function show(){
        $id_plantel = Input::get('id_plantel');
        $iplantel = Input::get('iplantel');
        $tabla = Input::get('tabla');

        $administrador = AdministradorModel::all();
        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();
        $plantel = PlantelModel::all();
        $alumnos = AlumnosModel::all();
        $grupos = GruposModel::all();
        $gplantel = GplantelModel::all();
        $fechas =FechasModel::all();

        return View::make("admin/production/admin", array("tabla"=>$tabla, "administrador"=>$administrador, "iplantel"=>$iplantel, "id_plantel"=>$id_plantel, "rmat"=>$rmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas, "pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "fechas"=>$fechas));

    }

        public function show_alumnos(){
        $id_plantel = Input::get('id_plantel');
        $iplantel = Input::get('iplantel');
        $tabla = Input::get('tabla');

        $administrador = AdministradorModel::all();
        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();
        $plantel = PlantelModel::all();
        $alumnos_bach = Alumnos_bachModel::all();
        $grupos = GruposModel::all();
        $gplantel = GplantelModel::all();
        $alumnos = AlumnosModel::all();
        $fechas =FechasModel::all();

       // $alumnos = \DB::table('alumnos as a')
        //->select('a.nombre, p.descripcion')
        //->join('grupos as g on g.id_grupos', '=', 'a.id_grupos')
        //->join('plantel_has_grupos as pg on g.id_grupos', '=', 'pg.id_grupos')
        //->join('plantel as p on p.id_plantel', '=', 'pg.id_plantel')
        //->where('p.id_plantel', '=', '3')
        //->get();

        return View::make("admin/production/admin", array("tabla"=>$tabla, "administrador"=>$administrador, "iplantel"=>$iplantel, "id_plantel"=>$id_plantel, "rmat"=>$rmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas, "pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "alumnos"=>$alumnos, "alumnos_bach"=>$alumnos_bach, "grupos"=>$grupos, "gplantel"=>$gplantel, "fechas"=>$fechas));

    }

    public function show_reporte(){
        $id_plantel = Input::get('id_plantel');
        $iplantel = Input::get('iplantel');
        $tabla = Input::get('tabla');

        $administrador = AdministradorModel::all();
        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();
        $plantel = PlantelModel::all();
        $alumnos = AlumnosModel::all();
        $grupos = GruposModel::all();
        $gplantel = GplantelModel::all();
        $carrera  = CarreraModel::all();
        $turno = TurnoModel::all();
        $fechas =FechasModel::all();

        return View::make("admin/production/admin", array("tabla"=>$tabla, "administrador"=>$administrador, "iplantel"=>$iplantel, "id_plantel"=>$id_plantel, "rmat"=>$rmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas, "pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "carrera"=>$carrera, "turno"=>$turno, "fechas"=>$fechas ));

    }

    public function detail_maestro(){
        $id_profesores = Input::get('id_profesores');
        $profesor = Input::get('profesor');
        $id_plantel = Input::get('id_plantel');
        $iplantel = Input::get('iplantel');
        $tabla = Input::get('tabla');

        $administrador = AdministradorModel::all();
        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();
        $plantel = PlantelModel::all();
        $alumnos = AlumnosModel::all();
        $grupos = GruposModel::all();
        $gplantel = GplantelModel::all();
        $pmat = PmateriaModel::all();
        $fechas =FechasModel::all();


        return View::make("admin/production/admin", array("id_profesores"=>$id_profesores,"profesor"=>$profesor, "administrador"=>$administrador, "tabla"=>$tabla, "iplantel"=>$iplantel, "id_plantel"=>$id_plantel, "rmat"=>$rmat, "pmat"=>$pmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas, "pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "fechas"=>$fechas ));

    }


        public function detail_alumno(){
        $id_alumnos = Input::get('id_alumnos');
        $matricula = Input::get('matricula');
        $tabla = Input::get('tabla');

        $administrador = AdministradorModel::all();
        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();
        $plantel = PlantelModel::all();
        $alumnos = AlumnosModel::all();
        $grupos = GruposModel::all();
        $gplantel = GplantelModel::all();
        $pmat = PmateriaModel::all();
        $fechas =FechasModel::all();

        $alumno= AlumnosModel::where('matricula', '=', $matricula)->first();
        $id_alumnos=$alumno['id_alumnos'];
        $nombrea=$alumno['name'];
        $id_grupo=$alumno['id_grupos'];
        $grupos= GruposModel::where('id_grupos', '=', $alumno['id_grupos'] )->first();
        $grupo=$grupos['descripciong'];
        $carreras= CarreraModel::where('id_carrera', '=', $grupos['id_carrera']  )->first();
        $carrera=$carreras['descripcionc'];
        $turnos= TurnoModel::where('id_turno', '=', $grupos['id_turno']  )->first();
        $turno=$turnos['descripciont'];

        if($tabla="detalle_alumno") $opcion=true;

        return View::make("admin/production/admin", array("tabla"=>$tabla, "opcion"=>$opcion, "administrador"=>$administrador, "rmat"=>$rmat, "pmat"=>$pmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas, "pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "carrera"=>$carrera, "grupo"=>$grupo, "id_grupo"=>$id_grupo, "nombrea"=>$nombrea, "id_alumnos"=>$id_alumnos, "matricula"=>$matricula, "fechas"=>$fechas ));
    }

    
    public function detail_reporte(){
        $id_plantel = Input::get('id_plantel');
        $iplantel = Input::get('iplantel');
        $tabla = Input::get('tabla');
        $id_grupos = Input::get('id_grupo');
        $grupo = Input::get('grupo');

        $administrador = AdministradorModel::all();
        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();
        $plantel = PlantelModel::all();
        $alumnos = AlumnosModel::all();
        $grupos = GruposModel::all();
        $gplantel = GplantelModel::all();
        $carrera  = CarreraModel::all();
        $turno = TurnoModel::all();
        $fechas =FechasModel::all();


        return View::make("admin/production/admin", array("tabla"=>$tabla, "administrador"=>$administrador, "iplantel"=>$iplantel, "id_plantel"=>$id_plantel, "rmat"=>$rmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas, "pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "id_grupos"=>$id_grupos, "grupo"=>$grupo, "gplantel"=>$gplantel, "carrera"=>$carrera, "turno"=>$turno, "fechas"=>$fechas));

    }


       public function update(){
        $matricula = Input::get('matricula');
        $tabla = Input::get('tabla');
        $i = Input::get("i");

        for($a=1; $a<=$i; $a++){

        $id_calificaciones = Input::get($a);
        $parcial1 = Input::get("parcial1".$id_calificaciones);
        $parcial2 = Input::get("parcial2".$id_calificaciones);
        $parcial3 = Input::get("parcial3".$id_calificaciones);

        $calificaciones= ConsultaModel::find($id_calificaciones);
        $calificaciones->parcial1 = $parcial1;
        $calificaciones->parcial2 = $parcial2;
        $calificaciones->parcial3 = $parcial3;
        $calificaciones->save();
    }
        $administrador = AdministradorModel::all();
        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();
        $plantel = PlantelModel::all();
        $alumnos = AlumnosModel::all();
        $grupos = GruposModel::all();
        $gplantel = GplantelModel::all();
        $pmat = PmateriaModel::all();
        $fechas =FechasModel::all();

        $alumno= AlumnosModel::where('matricula', '=', $matricula)->first();
        $id_alumnos=$alumno['id_alumnos'];
        $nombrea=$alumno['name'];
        $id_grupo=$alumno['id_grupos'];
        $grupos= GruposModel::where('id_grupos', '=', $alumno['id_grupos'] )->first();
        $grupo=$grupos['descripciong'];
        $carreras= CarreraModel::where('id_carrera', '=', $grupos['id_carrera']  )->first();
        $carrera=$carreras['descripcionc'];
        $turnos= TurnoModel::where('id_turno', '=', $grupos['id_turno']  )->first();
        $turno=$turnos['descripciont'];

        if($tabla="detalle_alumno"){
            $opcion=true;
        }else{
            $opcion=false;
        }

        return View::make("admin/production/admin", array("tabla"=>$tabla, "opcion"=>$opcion, "administrador"=>$administrador, "rmat"=>$rmat, "pmat"=>$pmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas, "pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "carrera"=>$carrera, "grupo"=>$grupo, "id_grupo"=>$id_grupo, "nombrea"=>$nombrea, "id_alumnos"=>$id_alumnos, "matricula"=>$matricula, "fechas"=>$fechas ));
    }

    public function update_faltas(){
        $matricula = Input::get('matricula');
        $tabla = Input::get('tabla');
        $i = Input::get("i");

        $faltas = FaltasModel::all();
        for($a=0; $a<$i; $a++){

        $id_faltas = Input::get($a);
        $parcial1 = Input::get("parcial1".$id_faltas);
        $parcial2 = Input::get("parcial2".$id_faltas);
        $parcial3 = Input::get("parcial3".$id_faltas);

        $faltas= FaltasModel::find($id_faltas);
        $faltas->parcial1 = $parcial1;
        $faltas->parcial2 = $parcial2;
        $faltas->parcial3 = $parcial3;
        $faltas->save();
    }

        $administrador = AdministradorModel::all();
        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();
        $plantel = PlantelModel::all();
        $alumnos = AlumnosModel::all();
        $grupos = GruposModel::all();
        $gplantel = GplantelModel::all();
        $pmat = PmateriaModel::all();
        $fechas =FechasModel::all();

        $alumno= AlumnosModel::where('matricula', '=', $matricula)->first();
        $id_alumnos=$alumno['id_alumnos'];
        $nombrea=$alumno['name'];
        $id_grupo=$alumno['id_grupos'];
        $grupos= GruposModel::where('id_grupos', '=', $alumno['id_grupos'] )->first();
        $grupo=$grupos['descripciong'];
        $carreras= CarreraModel::where('id_carrera', '=', $grupos['id_carrera']  )->first();
        $carrera=$carreras['descripcionc'];
        $turnos= TurnoModel::where('id_turno', '=', $grupos['id_turno']  )->first();
        $turno=$turnos['descripciont'];

        if($tabla="detalle_alumno"){
            $opcion=true;
        }else{
            $opcion=false;
        }

        return View::make("admin/production/admin", array("tabla"=>$tabla, "opcion"=>$opcion, "administrador"=>$administrador, "rmat"=>$rmat, "pmat"=>$pmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas, "pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, "plantel"=>$plantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "carrera"=>$carrera, "grupo"=>$grupo, "id_grupo"=>$id_grupo, "nombrea"=>$nombrea, "id_alumnos"=>$id_alumnos, "matricula"=>$matricula, "fechas"=>$fechas ));
    }



    public function detail_lista(){
        $id_grupos = Input::get('id_grupos');
        $descripcion = Input::get('descripcion');
        $id_materias = Input::get('id_materias');
        $id_profesores = Input::get('id_profesores');
        $profesor = Input::get('profesor');
        $tabla = Input::get('tabla');

        $administrador = AdministradorModel::all();
        $ng= GruposModel::where('id_grupos',$id_grupos)->first(); 
        $id_nivel= $ng['id_nivel'];
        $pgrupos= PgruposModel::all();      
        $grupos= GruposModel::all(); 
        $alumnos = AlumnosModel::all();
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
        $nivel = $niv['descripcionn'];
        $plantel = PlantelModel::all();
        $gplantel = GplantelModel::all();
        $fechas =FechasModel::all();

    if($id_nivel=="2"){
        $log= ProfesoresModel::where('id_profesores', '=', $id_profesores)->first();
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


        return View::make("admin/production/admin", array("edit"=>true, "administrador"=>$administrador, "id_profesores"=>$id_profesores, "tabla"=>$tabla, "rmat"=>$rmat, "pmat"=>$pmat, "materias"=>$materia, "calificaciones"=>$calificaciones, "faltas"=>$faltas, "pgrupos"=>$pgrupos, "plantel"=>$plantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "id_grupos" => $id_grupos,"descripcion" => $descripcion, "id_materias"=>$id_materias, "ng" => $ng, 'carrera'=>$carrera, 'profesor'=>$profesor, 'dias_diferencia'=>$dias_diferencia, "fechas"=>$fechas ));

    }


    public function detail_graficas(){
        $id_profesores = Input::get('id_profesores');
        $id_plantel = Input::get('id_plantel');
        $iplantel = Input::get('iplantel');
        $id_grupos = Input::get('id_grupos');
        $descripcion = Input::get('descripcion');
        $id_materias = Input::get('id_materias');
        $id_profesores = Input::get('id_profesores');
        $profesor = Input::get('profesor');
        $tabla = Input::get('tabla');

        $administrador = AdministradorModel::all();
        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();
        $plantel = PlantelModel::all();
        $alumnos = AlumnosModel::all();
        $grupos = GruposModel::all();
        $gplantel = GplantelModel::all();
        $pmat = PmateriaModel::all();
        $fechas =FechasModel::all();


        return View::make("admin/production/admin", array("id_profesores"=>$id_profesores, "administrador"=>$administrador, "tabla"=>$tabla, "iplantel"=>$iplantel, "id_plantel"=>$id_plantel, "rmat"=>$rmat, "pmat"=>$pmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas, "pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores, 'profesor'=>$profesor, "plantel"=>$plantel, "alumnos"=>$alumnos, "grupos"=>$grupos, "gplantel"=>$gplantel, "fechas"=>$fechas ));

    }


    public function logout(){
    return View("admin/loginadmin");
    Session::flush();
    }

}
