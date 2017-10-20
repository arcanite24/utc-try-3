<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AlumnoFormRequest;
use DB;
use Illuminate\Support\Facades\hash;

class AlumnoController extends Controller
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
            $alumno=DB::table('alumnos as alu')
            ->join('grupos as gr','alu.id_alumnos','=','gr.id_grupos')
            ->select('alu.id_alumnos','alu.name','alu.email','gr.descripciong','alu.matricula')
            ->where('alu.email','LIKE','%'.$query.'%')
            ->orwhere('alu.name','LIKE','%'.$query.'%')
            ->orwhere('alu.matricula','LIKE','%'.$query.'%')            
            ->orwhere('gr.descripciong','LIKE','%'.$query.'%')
            ->orderBy('alu.id_alumnos','asc')
            ->paginate(16);
            return view ('admin.alumno.index',["alumnos"=>$alumno,"searchTextp"=>$query]);   
        }          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$grupos=DB::table('grupos')->get();
        return view("admin.alumno.create",["grupos"=>$grupos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoFormRequest $request)
    {
            $alumno=new Alumno();
            $alumno->name=$request->name;
           // $alumno->password=encrypt($request->get('password'));
            $alumno->password= Hash::make($request->password);
            $alumno->email=$request->email;
            $alumno->id_grupos=$request->id_grupos;
            $alumno->matricula=$request->matricula;
            $alumno->save();
            return Redirect::to('admin/alumno');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.alumno.show',["alumno"=>Alumno::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$alumno=Alumno::findOrFail($id);
        $grupos=DB::table('grupos')->get();

        return view('admin.alumno.edit',["alumno"=>$alumno,"grupos"=>$grupos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnoFormRequest $request,$id)
    {
        $alumno=new Alumno;
        $alumno->name=$request->get('name');
        $alumno->password=encrypt($request->get('passwordEdit'));
        $alumno->email=$request->get('emailEdit');
        $alumno->id_grupos=$request->get('id_grupos');
        $alumno->matricula=$request->get('matricula');
             
        $alumno->update();
        return Redirect::to('admin/alumno');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno=DB::table('alumnos')->where('id_alumnos','=',$id)->delete();
                return Redirect::to('admin/alumno');

        //Turno::destroy($id);
        //return back();
    }
}
