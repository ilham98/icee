<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Student;
use App\Time;
use Illuminate\Http\Request;
use PDF;

class StudentAttendance extends Controller
{

	public function __construct() {
		$this->teacher_id = '';
		$this->time_id = '';
		$this->week = '';
	}

    public function index(Request $request) {
    	$this->teacher_id = $request->teacher_id;
    	$this->time_id = $request->time_id;
    	$this->week = $request->week;
    	$teachers = Teacher::all();
    	$students = Student::whereHas('times', function($query) {
        	    		$query->where('times.time_id', $this->time_id);
        	    	})->whereHas('teachers', function($query) {
            			$query->where('teachers.teacher_id', $this->teacher_id);
    		          })->where(['semester' => $request->semester, 'year' => $request->year])->with(['attendances' => function($query) {
                			$query->where('week', $this->week);
                		}])->get(); 
    	$times = Time::orderBy('type', 'ASC')->get();
    	return view('admin.pages.student-attendances', compact('students', 'times', 'teachers'));
    }

    public function export(Request $request) {
        $request->validate([
            'teacher_id' => 'required',
            'time_id' => 'required'
        ]);
        $this->teacher_id = $request->teacher_id;
        $this->time_id = $request->time_id;
        $time = \App\Time::find($this->time_id);
        $teacher = \App\Teacher::find($this->teacher_id);
        $teachers = Teacher::all();
        $students = Student::whereHas('times', function($query) {
                        $query->where('times.time_id', $this->time_id);
                    })->whereHas('teachers', function($query) {
                        $query->where('teachers.teacher_id', $this->teacher_id);
                      })->where(['semester' => $request->semester, 'year' => $request->year])->with(['attendances'])->get(); 

        $pdf = PDF::loadView('exports.attendances-export', compact('students', 'time', 'teacher'));

        // return $pdf->download('invoice.pdf');
        return $pdf->stream();
    }
}
