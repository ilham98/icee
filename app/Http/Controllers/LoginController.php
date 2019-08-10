<?php

namespace App\Http\Controllers;

use App\User;
use App\Student;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Configuration;

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

    public function showRegisterPage(Request $request) {
        $departments = Department::all();
        $register_status = false;
        $configuration = Configuration::first();
        // dd($configuration);
        $time = date('Y-m-d',time());
        if($time >= $configuration->registration_open && $time <= $configuration->registration_close){
            $register_status = true;
        }

        return view('auth.register', compact('departments', 'register_status'));
    }

    public function register(Request $request) {
        // $request->validate([
        //     'name' => 'required|email',
        //     'password' => 'required',
        //     'name' => 'required',
        //     'student_number' => 'required',
        //     'reason' => 'required',
        //     'department_id' => 'required' 
        // ]);
        $body = $request->except('email', 'password');
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 3
        ]);
        Student::create(array_merge($body, ['user_id' => $user->user_id, 'year' => $request->year, 'semester' => $request->semester]));
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/dashboard');
        }


        return redirect('/register')->with(['error' => 'invalid email or password']);
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
