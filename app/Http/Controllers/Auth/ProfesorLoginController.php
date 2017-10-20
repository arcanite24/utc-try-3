<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProfesorLoginController extends Controller
{
    public function __construct(){
		$this->middleware('guest:profesor');
	}
    public function showLoginForm(){
    	return view('auth.profesor-login');
    }

    public function login(Request $request){
    //	return true;
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password'=> 'required|min:6'
    		]);

    	if(Auth::guard('profesor')->attempt(['email'=> $request->email, 'password'=> $request->password], $request->remember)){
    		return redirect()->intended(route('profesor.dashboard'));
    	}
    	return redirect()->back()->withInput($request->only('email','remember'));
  
    }
}
