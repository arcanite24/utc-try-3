<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrador;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AdministradorFormRequest;
use DB;
use Illuminate\Support\Facades\hash;


class AdministradorController extends Controller
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
            $administrador=DB::table('administrador as a')
            ->join('plantel as p','a.id_plantel','=','p.id_plantel')
            ->join('tipoadmin as t','a.id_tipoAdmin','=','t.id_tipoAdmin')
            ->select('a.id_administrador','a.name','a.cardex','a.password','a.email','p.descripcion','t.descripcionTipoAdmin')
            ->where('p.descripcion','LIKE','%'.$query.'%')
            ->orwhere('a.email','LIKE','%'.$query.'%')
            ->orwhere('a.name','LIKE','%'.$query.'%')            
            ->orwhere('a.cardex','LIKE','%'.$query.'%')
            ->orwhere('a.id_administrador','LIKE','%'.$query.'%')
            ->orwhere('t.descripcionTipoAdmin','LIKE','%'.$query.'%')
            //->where('condicion','=','1')
            ->orderBy('a.id_administrador','asc')
            ->paginate(16);
            return view ('admin.administrador.index',["administradores"=>$administrador,"searchTextp"=>$query]);   
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
        $tipoAdmins=DB::table('tipoAdmin')->get();
        return view("admin.administrador.create",["planteles"=>$planteles, "tipoAdmins"=>$tipoAdmins]);       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdministradorFormRequest $request)
    {
            $administrador=new Administrador;
            $administrador->name=$request->get('name');
            $administrador->cardex=$request->get('cardex');
            $administrador->password= Hash::make($request->password);
            $administrador->email=$request->get('email');
            $administrador->id_plantel=$request->get('id_plantel');
            $administrador->id_tipoAdmin=1;
            $administrador->save();
            return Redirect::to('admin/administrador');
//$encrypted = Crypt::encryptString('Hello world.');
//'secret' => encrypt($request->secret)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.administrador.show',["administrador"=>Administrador::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$administrador=Administrador::findOrFail($id);
    	$planteles=DB::table('plantel')->get();
        $tipoAdmins=DB::table('tipoAdmin')->get();
        return view('admin.administrador.edit',["administrador"=>$administrador,"planteles"=>$planteles, "tipoAdmins"=>$tipoAdmins]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdministradorFormRequest $request,$id)
    {
         $administrador=Administrador::findOrFail($id);
            $administrador->name=$request->get('name');
            $administrador->cardex=$request->get('cardex');
            $administrador->password= Hash::make($request->password);
            $administrador->email=$request->get('emailEdit');
            $administrador->id_plantel=$request->get('id_plantel');
            $administrador->id_tipoAdmin=1;     
        $administrador->update();
        return Redirect::to('admin/administrador');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $administrador=DB::table('administrador')->where('id_administrador','=',$id)->delete();
            return Redirect::to('admin/administrador');
        //Turno::destroy($id);
        //return back();
    }
}
//arquitectura de informacion, software.. direccion de proyecto, analisis de sistemas