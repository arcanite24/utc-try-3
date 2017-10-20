<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turno;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TurnoFormRequest;
use DB;

class TurnoController extends Controller
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
            $turnos=DB::table('turno')
            ->where('descripciont','LIKE','%'.$query.'%')
            ->orwhere('id_turno','LIKE','%'.$query.'%')     
            //->where('condicion','=','1')
            ->orderBy('id_turno','asc')
            ->paginate(16);
            return view ('admin.turno.index',["turnos"=>$turnos,"searchTextp"=>$query]);   

        }          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.turno.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TurnoFormRequest $request)
    {
            $turno=new Turno;
            $turno->descripciont=$request->get('descripciont');
            $turno->save();
            return Redirect::to('admin/turno');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.turno.show',["turno"=>Turno::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.turno.edit',["turno"=>Turno::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TurnoFormRequest $request,$id)
    {
        $turno=Turno::findOrFail($id);
        $turno->descripciont=$request->get('descripciont');
        $turno->update();
        return Redirect::to('admin/turno');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turno=DB::table('turno')->where('id_turno','=',$id)->delete();
                return Redirect::to('admin/turno');

        //Turno::destroy($id);
        //return back();
    }
}
