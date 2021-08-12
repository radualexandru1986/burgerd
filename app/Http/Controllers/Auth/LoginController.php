<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	use ThrottlesLogins;
	
	public function index()
	{
		if (Auth::user()){
			return redirect()->to('admin/dashboard');
		}
		return view('auth.login');
	}
	
	
    public function authenticate(Request $request)
	{
		$credentials = $request->validate([
			'email'=> ['required', 'email'],
			'password'=>['required'],
		]);
		
		$remember = true;
		
		if($this->hasTooManyLoginAttempts($request)){
			return redirect()->to('login');
		}
		if(Auth::attempt($credentials,$remember)) {
			
			$request->session()->regenerate();
			
			$this->clearLoginAttempts($request);
			
			return redirect()->intended('/admin/dashboard');
			
		}else{
			$this->incrementLoginAttempts($request);
			return redirect()->back();
		}
	}
	
	public function username()
	{
		return 'email';
	}
	
}
