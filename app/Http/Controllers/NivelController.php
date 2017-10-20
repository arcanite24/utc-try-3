<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nivel;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\NivelFormRequest;
use DB;

class NivelController extends Controller
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
            $nivel=DB::table('nivel')->where('descripcionn','LIKE','%'.$query.'%')
            //->where('condicion','=','1')
            ->orderBy('id_nivel','asc')
            ->paginate(16);
            return view ('admin.nivel.index',["niveles"=>$nivel,"searchTextp"=>$query]);   

        }          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.nivel.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NivelFormRequest $request)
    {
            $nivel=new Nivel;
            $nivel->descripcionn=$request->get('descripcionn');
            $nivel->save();
            return Redirect::to('admin/nivel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.nivel.show',["nivel"=>Nivel::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.nivel.edit',["nivel"=>Nivel::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NivelFormRequest $request,$id)
    {
        $nivel=Nivel::findOrFail($id);
        $nivel->descripcionn=$request->get('descripcionn');
        $nivel->update();
        return Redirect::to('admin/nivel');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nivel=DB::table('nivel')->where('id_nivel','=',$id)->delete();
                return Redirect::to('admin/nivel');

        //Turno::destroy($id);
        //return back();
    }
}
