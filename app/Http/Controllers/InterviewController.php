<?php

namespace App\Http\Controllers;

use Auth;
use App\Student;
use App\Department;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    public function index(Request $request) {
        $data = $request->all();
        $departments = Department::all();
    	$students = new Student;
        $students = $students->where(['semester' => $request->semester, 'year' => $request->year]);
        if(isset($data['department_id']))
            $students = $students->where('department_id', $data['department_id']);
        $students = $students->paginate(20);
    	$current = $students->currentPage();
    	return view('teacher.pages.interview', compact('students', 'current', 'departments', 'data'));
    }

    public function edit($id) {
    	$student = Student::find($id);
    	return view('teacher.pages.interview-edit', compact('student'));
    }

    public function update(Request $request, $id) {
    	$request->validate([
    		'note' => 'required',
    		'level' => 'required'
    	]);

    	$body = $request->all();
        $body = array_merge($body, ['teacher_id' => Auth::user()->teacher->teacher_id]);
    	$student = Student::find($id);
    	$student->update($body);
    	return redirect('/interview/'.$id.'/edit')->with('edit-success', 'success');;
    }
}
