<?php

namespace App\Http\Controllers;

use Auth;
use App\Department;
use App\Student;
use Illuminate\Http\Request;

class PickStudentController extends Controller
{
    public function index(Request $request) {
    	$students = Student::whereHas('times', function($query){}, '=', 2);
        $students = $students->where(['semester' => $request->semester, 'year' => $request->year]);
        $departments = Department::all();
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

    	$data = $request->all();
        $departments = Department::has('students')->get();
        if(isset($data['search_query']))
            $students = $students->where(function($query) use($data) {
                $query->orWhere('student_number', 'like' , '%'.$data['search_query'].'%')->orWhere('name', 'like' , '%'.$data['search_query'].'%');
                });
        if(isset($data['level']))
            $students = $students->where('level', $data['level']);
        if(isset($data['department_id']))
            $students = $students->where('department_id', $data['department_id']);
        

        $teacher = Auth::user()->teacher;

        $level = $teacher->level()->where(['year' => $request->year, 'semester' => $request->semester])->first();
        if(!$level){  
            $students = $students->whereIn('level', [10]);
        } else if($level->level == 1) {
            $students = $students->whereIn('level', [1,2,3]);
        } else if($level->level == 2) {
            $students = $students->whereIn('level', [4,5,6]);
        }

        $levels = $students->get()->map(function($s) {
            return $s->level;
        })->unique()->all();
    
        $students = $students->paginate(20);        
        $current = $students->currentPage();
        return view('teacher.pages.pick-student', compact('students', 'current', 'departments', 'data', 'classState', 'cornerState', 'levels', 'level'));

    }

    public function pick($id, Request $request) {
    	$student = Student::find($id);
    	$id = Auth::user()->teacher->teacher_id;
		$student->teachers()->attach([$id => ['type' => $request->type]]);

    	return redirect('/pick-student');
    }

    public function unpick($id, Request $request) {
        $student = Student::find($id);
        $id = Auth::user()->teacher->teacher_id;
        $student->teachers()->wherePivot('type', $request->type)->detach([$id]);

        return redirect('/pick-student');
    }
}
