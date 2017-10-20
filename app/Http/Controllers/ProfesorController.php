<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfesorFormRequest;
use DB;
use Illuminate\Support\Facades\hash;

class ProfesorController extends Controller
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
            $profesor=DB::table('profesores')
            ->where('name','LIKE','%'.$query.'%')
            ->orwhere('cardex','LIKE','%'.$query.'%')

            //->where('condicion','=','1')
            ->orderBy('id_profesores','asc')
            ->paginate(16);
            return view ('admin.profesor.index',["profesores"=>$profesor,"searchTextp"=>$query]);   

        }          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.profesor.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfesorFormRequest $request)
    {
            $profesor=new Profesor;
            $profesor->name=$request->get('name');
            $profesor->cardex=$request->get('cardex');
            //$profesor->password=$request->get('pass');
            $profesor->password= Hash::make($request->password);
            $profesor->email=$request->get('email');
            $profesor->save();
            return Redirect::to('admin/profesor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.profesor.show',["profesor"=>Profesor::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.profesor.edit',["profesor"=>Profesor::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfesorFormRequest $request,$id)
    {
        $profesor=Profesor::findOrFail($id);
        $profesor->name=$request->get('nombre');
        $profesor->cardex=$request->get('cardex');
        $profesor->password=$request->get('password');
        $profesor->email=$request->get('emailEdit');
        $profesor->update();
        return Redirect::to('admin/profesor');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesor=DB::table('profesores')->where('id_profesores','=',$id)->delete();
                return Redirect::to('admin/profesor');

        //Turno::destroy($id);
        //return back();
    }
}
