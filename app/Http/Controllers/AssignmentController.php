<?php

namespace App\Http\Controllers;

use Auth;
use App\Vocabulary;
use App\Assignment;
use App\Topic;
use App\Attendance;
use App\Time;
use App\Student;
use Illuminate\Http\Request;

class AssignmentController extends Controller
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
    	$this->time_id = $request->time_id;
    	$this->week = $request->week;
    
    	$students = Student::whereHas('times', function($query) {
        	    		$query->where('times.time_id', $this->time_id);
        	    	})->where(['semester' => $request->semester, 'year' => $request->year])->with(['attendances' => function($query) {
                			$query->where('week', $this->week);
                		}]);
                    
        if(Auth::user()->role === '2') {
            $this->teacher_id = Auth::user()->teacher->teacher_id;
            $students = $students->whereHas('teachers', function($query) {
                            $query->where('teachers.teacher_id', $this->teacher_id);
                          });
            $topics = Topic::where([
                'time_id' => $this->time_id, 
                'year' => $request->year,
                'semester' => $request->semester,
                'week' => $request->week,
                'teacher_id' => $this->teacher_id
            ])->get();

        } elseif (Auth::user()->role === '3') {
            $student = Auth::user()->student;
            $teacher_id = $student->teachers()->where('student_teacher.type', 'A')->first()->teacher_id;
            $time = $student->times()->where('times.type', 'A')->first();
            $topics = Topic::where([
                'time_id' => $time->time_id, 
                'year' => $request->year,
                'semester' => $request->semester,
                'week' => $request->week,
                'teacher_id' => $teacher_id
            ])->get();
        } 

        $students = $students->get();
    	$times = Time::orderBy('type', 'ASC')->get();
        if(Auth::user()->role === '2') {
        	return view('teacher.pages.assignment', compact('students', 'times', 'topics'));
        } else {
            return view('student.pages.assignment', compact('students', 'times', 'topics'));
        }
    }

    public function store(Request $request) {
    	if (Auth::user()->role === '3') {
            foreach($request->student_comment as $i => $sc) {
                $assignment = Assignment::where([
                    'student_id' => Auth::user()->student->student_id,
                    'topic_id' => $i,
                    'week' => $request->week 
                ])->first();

                if(!$assignment) {
                    $assignment = Assignment::create([
                        'student_id' => Auth::user()->student->student_id,
                        'topic_id' => $i,
                        'student_comment' => $sc,
                        'minute' => $request->minute[$i],
                        'week' => $request->week,
                        'partner' => $request->partner[$i]
                    ]);
                } else {
                    $assignment->update([
                        'student_id' => Auth::user()->student->student_id,
                        'topic_id' => $i,
                        'student_comment' => $sc,
                        'minute' => $request->minute[$i],
                        'week' => $request->week,
                        'partner' => $request->partner[$i]
                    ]);
                }
                Vocabulary::where('assignment_id', $assignment->assignment_id)->delete();
                $vocabs = explode(',', $request->vocabularies[$i]);
                foreach($vocabs as $v) {
                    Vocabulary::create([
                        'assignment_id' => $assignment->assignment_id,
                        'word' => trim($v)
                    ]);
                }
                
            }
        }

    	return redirect(url()->previous())->with('insert-success', true);
    }

    public function edit($id, Request $request) {
        $time = Student::find($id)->times()->where('times.type', 'A')->first();
        $topics = Topic::where([
                'time_id' => $time->time_id, 
                'year' => $request->year,
                'semester' => $request->semester,
                'week' => $request->week,
                'teacher_id' => Auth::user()->teacher->teacher_id
            ])->get();
        return view('teacher.pages.assignment-edit', compact('topics'));
    }
}
