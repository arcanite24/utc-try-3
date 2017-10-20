<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuatrimestre;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CuatrimestreFormRequest;
use DB;

class CuatrimestreController extends Controller
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
            $cuatrimestres=DB::table('cuatrimestre')->where('descripcioncu','LIKE','%'.$query.'%')
            //->where('condicion','=','1')
            ->orderBy('id_cuatrimestre','asc')
            ->paginate(16);
            return view ('admin.cuatrimestre.index',["cuatrimestres"=>$cuatrimestres,"searchTextp"=>$query]);   

        }          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.cuatrimestre.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CuatrimestreFormRequest $request)
    {
            $cuatrimestre=new Cuatrimestre;
            $cuatrimestre->descripcioncu=$request->get('descripcioncu');
            $cuatrimestre->save();
            return Redirect::to('admin/cuatrimestre');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.cuatrimestre.show',["cuatrimestre"=>Cuatrimestre::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.cuatrimestre.edit',["cuatrimestre"=>Cuatrimestre::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CuatrimestreFormRequest $request,$id)
    {
        $cuatrimestre=Cuatrimestre::findOrFail($id);
        $cuatrimestre->descripcioncu=$request->get('descripcioncu');
        $cuatrimestre->update();
        return Redirect::to('admin/cuatrimestre');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuatrimestre=DB::table('cuatrimestre')->where('id_cuatrimestre','=',$id)->delete();
                return Redirect::to('admin/cuatrimestre');

        //Turno::destroy($id);
        //return back();
    }
}
