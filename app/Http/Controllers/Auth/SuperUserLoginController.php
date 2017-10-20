<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class SuperUserLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:superUser');
	}
    public function showLoginForm(){
    	return view('auth.superUser-login');
    }


    public function login(Request $request){
    //	return true;
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password'=> 'required|min:6'
    		]);

    	if(Auth::guard('superUser')->attempt(['email'=> $request->email, 'password'=> $request->password], $request->remember)){
    		return redirect()->intended(route('superUser.dashboard'));
    	}else{
            Session::flash('danger', 'Verifique que su Email y Pasword sean Correctos');
        }
    	return redirect()->back()->withInput($request->only('email','remember'));
  
    }
}
