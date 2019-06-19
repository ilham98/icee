<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginPage() {
    	return view('auth.login');
    }

    public function login(Request $request) {
    	$credentials = $request->only('email', 'password');
    	if(Auth::attempt($credentials)) {
    		return redirect('/dashboard');
    	}
    	return redirect('/login');
    }
}
