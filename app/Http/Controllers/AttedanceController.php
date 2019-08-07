<?php

namespace App\Http\Controllers;

use Auth;
use App\Attendance;
use App\Time;
use App\Student;
use Illuminate\Http\Request;

class AttedanceController extends Controller
{
	function __construct() {
		$this->teacher_id = 'aaa';
		$this->time_id = 1;
		$this->year = 2018;
		$this->semester = 1;
		$this->type = 'A';
		$this->week = 1;
	}


    public function index(Request $request) {
    	$this->teacher_id = Auth::user()->teacher->teacher_id;
    	$this->time_id = $request->time_id;
    	$this->week = $request->week;

    	$students = Student::whereHas('times', function($query) {
        	    		$query->where('times.time_id', $this->time_id);
        	    	})->whereHas('teachers', function($query) {
            			$query->where('teachers.teacher_id', $this->teacher_id);
    		          })->where(['semester' => $request->semester, 'year' => $request->year])->with(['attendances' => function($query) {
                			$query->where('week', $this->week);
                		}])->get();   
    	$times = Time::orderBy('type', 'ASC')->get();
    	return view('teacher.pages.attendance', compact('students', 'times'));
    }

    public function store(Request $request) {
    	foreach($request->status as $i => $s) {
    		$attendance = Attendance::where([
    			'week' => $request->week,
    			'type' => $this->type,
    			'student_id' => $i
    		])->first();
	    		if(!$attendance) {
	    			Attendance::create([
		    			'week' => $request->week,
		    			'type' => $this->type,
		    			'student_id' => $i,
		    			'status' => $s
		    		]);
    			} else {
    				$attendance->status = $s;
    				$attendance->save();
    			}
    	}

    	return redirect(url()->previous());
    }
}
