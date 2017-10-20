<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CarreraFormRequest;
use DB;

class CarreraController extends Controller
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
            $query=trim($request->get('searchText'));
            $carreras=DB::table('carrera')->where('descripcionc','LIKE','%'.$query.'%')
            //->where('condicion','=','1')
            ->orderBy('id_carrera','asc')
            ->paginate(16);
            return view ('admin.carrera.index',["carreras"=>$carreras,"searchText"=>$query]);   

        }          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.carrera.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarreraFormRequest $request)
    {
            $carrera=new Carrera;
            $carrera->descripcionc=$request->get('descripcionc');
            $carrera->save();
            return Redirect::to('admin/carrera');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.carrera.show',["carrera"=>Carrera::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.carrera.edit',["carrera"=>Carrera::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarreraFormRequest $request,$id)
    {
        $carrera=Carrera::findOrFail($id);
        $carrera->descripcionc=$request->get('descripcionc');
        $carrera->update();
        return Redirect::to('admin/carrera');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrera=DB::table('carrera')->where('id_carrera','=',$id)->delete();
                return Redirect::to('admin/carrera');

        //Turno::destroy($id);
        //return back();
    }
}
