<?php

namespace App\Http\Controllers;

use App\Department;
use App\Student;
use Illuminate\Http\Request;
use PDF;

class ScheduleCornerController extends Controller
{
    public function index(Request $request) {
    	$departments = Department::all();
    	$students = new Student;
    	$data = $request->all();
    	if(isset($data['year']))
            $students = $students->where('year', $data['year']);
        if(isset($data['semester']))
            $students = $students->where('semester', $data['semester']);
 		if(isset($data['search_query']))
            $students = $students->where(function($query) use($data) {
                $query->orWhere('student_number', 'like' , '%'.$data['search_query'].'%')->orWhere('name', 'like' , '%'.$data['search_query'].'%');
            });
        if(isset($data['level']))
            $students = $students->where('level', $data['level']);
        if(isset($data['department_id']))
            $students = $students->where('department_id', $data['department_id']);
    	$students = $students->whereHas('times', function($query) {
			    		$query->where('times.type', 'B');
			    	}, '>', 0)->whereHas('teachers', function($query) {
			    		$query->where('student_teacher.type', 'B');
			    	});
    	
        $students = $students->with(['times' => function($query) {
            $query->where('times.type', 'B');
        }]);
        $students = $students->paginate(20);
        $current = $students->currentPage();
    	return view('admin.pages.schedule-corner', compact('students', 'current', 'data', 'departments'));
    }

    public function export(Request $request) {
        $students = new Student;
        $data = $request->all();
        if(isset($data['year']))
            $students = $students->where('year', $data['year']);
        if(isset($data['semester']))
            $students = $students->where('semester', $data['semester']);
        if(isset($data['search_query']))
            $students = $students->where(function($query) use($data) {
                $query->orWhere('student_number', 'like' , '%'.$data['search_query'].'%')->orWhere('name', 'like' , '%'.$data['search_query'].'%');
            });
        if(isset($data['level']))
            $students = $students->where('level', $data['level']);
        if(isset($data['department_id']))
            $students = $students->where('department_id', $data['department_id']);
        $students = $students->whereHas('times', function($query) {
                        $query->where('times.type', 'B');
                    }, '>', 0)->whereHas('teachers', function($query) {
                        $query->where('student_teacher.type', 'B');
                    });
        $students = $students->with(['times' => function($query) {
            $query->where('times.type', 'B');
        }]);
        $students = $students->get();  
        $type = 'Corner';
        $pdf = PDF::loadView('exports.schedule-export', compact('students', 'type'))->setPaper('a4', 'landscape');

        // return $pdf->download('invoice.pdf');
        return $pdf->stream();
    }
}
