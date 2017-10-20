<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProfesoresModel;
use App\GruposModel;
use App\PgruposModel;
use App\AlumnosModel;
use App\ConsultaModel;
use App\MateriaModel;
use App\RmateriaModel;
use App\FaltasModel;
use App\CarreraModel;
use App\TurnoModel;
use App\PruebaModel;
use View;
use Storage;
use Illuminate\Support\Facades\Input;
use Session;
use Rule;
use Auth;

class inicioaController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return View("alumno");
    }

    public function boleta(){
        $usrname=Auth::user()->email;
     
        $log= AlumnosModel::where('email', '=', $usrname)->first();
        $id_alumnos=$log['id_alumnos'];
        $nombrea=$log['name'];
        $id_grupo=$log['id_grupos'];
        $grupos= GruposModel::where('id_grupos', '=', $log['id_grupos'] )->first();
        $grupo=$grupos['descripciong'];
        $carreras= CarreraModel::where('id_carrera', '=', $grupos['id_carrera']  )->first();
        $carrera=$carreras['descripcionc'];
        $turnos= TurnoModel::where('id_turno', '=', $grupos['id_turno']  )->first();
        $turno=$turnos['descripciont'];

        Session::put('id_alumnos', $id_alumnos);
        Session::put('nombrea', $nombrea);
        Session::put('matricula', $usrname); 
        Session::put('grupo', $grupo);
        Session::put('carrera', $carrera);
        Session::put('turno', $turno);
        Session::put('id_grupo', $id_grupo);

        $rmat = RmateriaModel::all();
        $materias = MateriaModel::all();
        $calificaciones = ConsultaModel::all();
        $faltas = FaltasModel::all();
        $pgrupos = PgruposModel::all();
        $prueba = PruebaModel::all();
        $profesores = ProfesoresModel::all();

        return View::make("alumno/inicioa", array("grupos" => $grupos,"rmat"=>$rmat, "materias"=>$materias, "calificaciones"=>$calificaciones, "faltas"=>$faltas, "pgrupos"=>$pgrupos, "prueba"=>$prueba, "profesores"=>$profesores ));      
        }


    public function logout_alumnno(){
         Auth::logout();
        return View::make('auth/login');
    }

}
