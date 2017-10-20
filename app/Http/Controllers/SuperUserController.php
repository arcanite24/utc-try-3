<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SuperUser;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SuperUserFormRequest;
use DB;
use Illuminate\Support\Facades\hash;


class SuperUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  //  public function __construct(){
//$this->middleware('auth:admin');
    //}

    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchTextp'));
            $administrador=DB::table('SuperUser as a')
            ->join('plantel as p','a.id_plantel','=','p.id_plantel')
            ->join('tipoadmin as t','a.id_tipoAdmin','=','t.id_tipoAdmin')
            ->select('a.id_superuser','a.name','a.password','a.email','p.descripcion','t.descripcionTipoAdmin')
            ->orwhere('a.email','LIKE','%'.$query.'%')
            ->orwhere('a.name','LIKE','%'.$query.'%')            
            ->orwhere('a.id_administrador','LIKE','%'.$query.'%')
            //->where('condicion','=','1')
            ->orderBy('a.id_administrador','asc')
            ->paginate(16);
            return view ('superUser.superUser.index',["administradores"=>$administrador,"searchTextp"=>$query]);   
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
        return view("superUser.superUser.create",["planteles"=>$planteles]);       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuperUserFormRequest $request)
    {
            $administrador=new SuperUser;
            $administrador->name=$request->get('name');
            $administrador->password= Hash::make($request->password);
            $administrador->email=$request->get('email');
            $administrador->id_plantel=$request->get('id_plantel');
            $administrador->save();
            return Redirect::to('superUser/superUser');
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
        return view('superUser.superUser.show',["administrador"=>SuperUser::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$administrador=SuperUser::findOrFail($id);
    	$planteles=DB::table('plantel')->get();
        return view('admin.administrador.edit',["administrador"=>$administrador,"planteles"=>$plantel]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuperUserFormRequest $request,$id)
    {
         $administrador=SuperUser::findOrFail($id);
            $administrador->name=$request->get('name');
            $administrador->cardex=$request->get('cardex');
            $administrador->password= Hash::make($request->password);
            $administrador->email=$request->get('emailEdit');
            $administrador->id_plantel=$request->get('id_plantel');
        $administrador->update();
        return Redirect::to('superUser/superUser');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $administrador=DB::table('superUser')->where('id_superUser','=',$id)->delete();
            return Redirect::to('superUser/superUser');
        //Turno::destroy($id);
        //return back();
    }
}
//arquitectura de informacion, software.. direccion de proyecto, analisis de sistemas