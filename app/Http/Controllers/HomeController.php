<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function dashboard(Request $request)
    {
        $role = Auth::user()->role;
        if($role === '1'){
            $applicant_students = Student::where(['year' => $request->year, 'semester' => $request->semester])->get();
            $students = Student::whereHas('times', function(){}, '>', 1)->whereHas('teachers')->get();
            $teachers = Teacher::whereHas('students', function($query) use($request){
                $query->where(['year' => $request->year, 'semester' => $request->semester]);
            })->get();

            $chart = Student::select('year', 'semester', DB::raw('count(name) as c'))->groupBy('year', 'semester')->get();

            return view('admin.dashboard', compact('applicant_students', 'students', 'chart', 'teachers'));
        } 
        if($role === '2'){
            $classStudent = Student::with('teachers')->whereHas('teachers', function($query) {
            $query->where('student_teacher.type', 'A');
            })->whereHas('times', function($query) {
                    $query->where('times.type', 'A');
                })->get();

            $cornerStudent = Student::with('teachers')
                ->whereHas('teachers', function($query) {
                    $query->where('student_teacher.type', 'B');
                })->whereHas('times', function($query) {
                    $query->where('times.type', 'B');
                })->get();

            $classState = $classStudent->groupBy([
                function($s) {
                    $time = $s->times()->where('type', 'A')->first();
                    return generateDay($time->day).' '.timePretty($time->start);
                }
            ]);

            $cornerState = $cornerStudent->groupBy([
                function($s) {
                    $time = $s->times()->where('type', 'B')->first();
                    return generateDay($time->day).' '.timePretty($time->start);
                }
            ]);
            return view('teacher.dashboard', compact('classState', 'cornerState'));
        }
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
