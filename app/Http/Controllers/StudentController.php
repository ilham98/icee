<?php

namespace App\Http\Controllers;

use App\Student;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
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
            $students = $students->where('level', $data['department_id']);
        $students = $students->paginate(20);
    	return view('admin.pages.student', compact('students', 'departments', 'data'));
    }

    public function edit($id) {
        $departments = Department::all();
        $student = Student::findOrFail($id);

        return view('pages.student-edit', compact('departments', 'student'));
    }

    public function update(Request $request, $id) {
        $body = $request->all();
        $student = Student::findOrFail($id);
        if($request->password) {
            $user = $student->user;
            $user->password = Hash::make($request->password);
            $user->save();
        }
        $student->update($body);

        return redirect(url()->previous())->with('edit-success', true);
    }
}
