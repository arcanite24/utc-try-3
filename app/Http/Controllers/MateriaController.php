<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MateriaFormRequest;
use DB;

class MateriaController extends Controller
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
            $materias=DB::table('materia')->where('descripcionm','LIKE','%'.$query.'%')
            //->where('condicion','=','1')
            ->orderBy('id_materia','asc')
            ->paginate(16);
            return view ('admin.materia.index',["materias"=>$materias,"searchText"=>$query]);   

        }          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.materia.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriaFormRequest $request)
    {
            $materia=new Materia;
            $materia->descripcionm=$request->get('descripcionm');
            $materia->save();
            return Redirect::to('admin/materia');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.materia.show',["materia"=>Materia::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.materia.edit',["materia"=>Materia::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MateriaFormRequest $request,$id)
    {
        $materia=Materia::findOrFail($id);
        $materia->descripcionm=$request->get('descripcionm');
        $materia->update();
        return Redirect::to('admin/materia');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materias=DB::table('materia')->where('id_materias','=',$id)->delete();
                return Redirect::to('admin/materia');

        //Turno::destroy($id);
        //return back();
    }
}
