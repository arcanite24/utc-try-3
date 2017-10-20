<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GrupoFormRequest;
use DB;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchTextp'));
            $grupo=DB::table('grupos as g')
            ->join('turno as t','g.id_turno','=','t.id_turno')
            ->join('carrera as c','g.id_carrera','=','c.id_carrera')
            ->join('nivel as n','g.id_nivel','=','n.id_nivel')
            ->join('cuatrimestre as cu','g.id_cuatrimestre','=','cu.id_cuatrimestre')
            ->select('g.id_grupos','g.descripciong','t.descripciont','c.descripcionc','n.descripcionn','cu.descripcioncu')
            ->where('g.descripciong','LIKE','%'.$query.'%')
            ->orwhere('t.descripciont','LIKE','%'.$query.'%')
            ->orwhere('c.descripcionc','LIKE','%'.$query.'%')            
            ->orwhere('n.descripcionn','LIKE','%'.$query.'%')
            ->orwhere('cu.descripcioncu','LIKE','%'.$query.'%')
            //->where('condicion','=','1')
            ->orderBy('g.id_grupos','asc')
            ->paginate(16);
            return view ('admin.grupo.index',["grupos"=>$grupo,"searchTextp"=>$query]);   
        }          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$carreras=DB::table('carrera')->get();
    	$turnos=DB::table('turno')->get();
    	$carreras=DB::table('carrera')->get();
    	$niveles=DB::table('nivel')->get();
    	$cuatrimestres=DB::table('cuatrimestre')->get();
        return view("admin.grupo.create",["turnos"=>$turnos,"carreras"=>$carreras,"niveles"=>$niveles,"cuatrimestres"=>$cuatrimestres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GrupoFormRequest $request)
    {
            $grupo=new Grupo;
            $grupo->descripciong=$request->get('descripciong');
            $grupo->id_turno=$request->get('id_turno');
            $grupo->id_carrera=$request->get('id_carrera');
            $grupo->id_nivel=$request->get('id_nivel');
            $grupo->id_cuatrimestre=$request->get('id_cuatrimestre');
            $grupo->save();
            return Redirect::to('admin/grupo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.grupo.show',["grupo"=>Grupo::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$grupo=Grupo::findOrFail($id);
    	$carreras=DB::table('carrera')->get();
    	$turnos=DB::table('turno')->get();
    	$carreras=DB::table('carrera')->get();
    	$niveles=DB::table('nivel')->get();
    	$cuatrimestres=DB::table('cuatrimestre')->get();
        return view('admin.grupo.edit',["grupo"=>$grupo,"turnos"=>$turnos,"carreras"=>$carreras,"niveles"=>$niveles,"cuatrimestres"=>$cuatrimestres]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GrupoFormRequest $request,$id)
    {
        $grupo=Grupo::findOrFail($id);
        $grupo->descripciong=$request->get('descripciong');
        $grupo->id_turno=$request->get('id_turno');
        $grupo->id_carrera=$request->get('id_carrera');
        $grupo->id_nivel=$request->get('id_nivel');
        $grupo->id_cuatrimestre=$request->get('id_cuatrimestre');
             
        $grupo->update();
        return Redirect::to('admin/grupo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo=DB::table('grupos')->where('id_grupos','=',$id)->delete();
                return Redirect::to('admin/grupo');

        //Turno::destroy($id);
        //return back();
    }
}
