<?php

namespace App\Http\Controllers;

use App\User;
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
        $role = Auth::user()->role;
        if($role === '1')
            return view('admin.dashboard');
        if($role === '2')
            return view('teacher.dashboard');
        if($role === '3') {
            $user = User::where('user_id', Auth::user()->user_id)->with('student')->first();
            $class = $user->student->times()->where('times.type', 'A')->first();
            $corner = $user->student->times()->where('times.type', 'B')->first();
            $class_teacher = $user->student->teachers()->where('student_teacher.type', 'A')->first();
            $corner_teacher = $user->student->teachers()->where('student_teacher.type', 'B')->first();
            return view('student.dashboard', compact('user', 'class', 'corner', 'class_teacher', 'corner_teacher'));
        }
    }
}
