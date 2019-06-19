<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        dd(Auth::user());
    }

    public function dashboard()
    {
        $role = Auth::user()->role_id;
        if($role === 1)
            return view('admin.dashboard');
        if($role === 2)
            return view('teacher.dashboard');
        if($role === 3)
            return view('student.dashboard');
    }
}
