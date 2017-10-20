<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GrupoPlantel;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GrupoPlantelFormRequest;
use DB;

class GrupoPlantelController extends Controller
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
            $grupo=DB::table('plantel_has_grupos as pg')
            ->join('grupos as g','g.id_grupos','=','pg.id_grupos')
            ->join('plantel as p','pg.id_plantel','=','p.id_plantel')
            ->select('g.descripciong','p.descripcion')
            ->where('g.descripciong','LIKE','%'.$query.'%')
            ->orwhere('p.descripcion','LIKE','%'.$query.'%')
            //->where('condicion','=','1')
            ->orderBy('g.id_grupos','asc')
            ->paginate(16);
            return view ('admin.grupoplantel.index',["grupos"=>$grupo,"searchTextp"=>$query]);   
        }          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$planteles=DB::table('plantel')->get();
    	$grupos=DB::table('grupos')->get();
    	return view("admin.grupoplantel.create",["planteles"=>$planteles,"grupos"=>$grupos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
            $grupo=new GrupoPlantel;
            $grupo->id_plantel='id_plantel';
            $grupo->id_grupos='id_grupos';
            $grupo->save();
            return Redirect::to('admin/grupoplantel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.grupoplantel.show',["grupo"=>Grupo::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo=DB::table('plantel_has_grupos')->where('id_grupos','=',$id)
        ->where('id_plantel','=',$id)
        ->delete();
                return Redirect::to('admin/grupoplantel');

        //Turno::destroy($id);
        //return back();
    }
}
