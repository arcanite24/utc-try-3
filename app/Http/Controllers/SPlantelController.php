<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plantel;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PlantelFormRequest;
use DB;

class PlantelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
       // $this->middleware('auth:superUser');

    }


    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchTextp'));
            $planteles=DB::table('plantel')
            ->where('descripcion','LIKE','%'.$query.'%')
            ->orwhere('id_plantel','LIKE','%'.$query.'%')
            
            //->where('condicion','=','1')
            ->orderBy('id_plantel','asc')
            ->paginate(16);
            return view ('superUser.plantel.index',["planteles"=>$planteles,"searchTextp"=>$query]);   

        }          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("superUser.plantel.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlantelFormRequest $request)
    {
            $plantel=new Plantel;
            $plantel->descripcion=$request->get('descripcion');
            $plantel->save();
            return Redirect::to('superUser/plantel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('superUser.plantel.show',["plantel"=>Plantel::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('superUser.plantel.edit',["plantel"=>Plantel::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlantelFormRequest $request,$id)
    {
        $plantel=Plantel::findOrFail($id);
        $plantel->descripcion=$request->get('descripcion');
        $plantel->update();
        return Redirect::to('superUser/plantel');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plantel=DB::table('plantel')->where('id_plantel','=',$id)->delete();
                return Redirect::to('superUser/plantel');

        //Turno::destroy($id);
        //return back();
    }
}
