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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    	$credentials = $request->only('email', 'password');
    	if(Auth::attempt($credentials)) {
    		return redirect('/dashboard');
    	}

    	return redirect('/login')->with(['error' => 'invalid email or password']);
    }
}
