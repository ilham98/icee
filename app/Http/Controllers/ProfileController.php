<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
	public function index() {
		$user = Auth::user();
		    if($user->role == 2) {
		    	$teacher = $user->teacher;
		    	return view('teacher.pages.profile', compact('teacher'));
		    } elseif($user->role == 3) {
		    	$student = $user->student;
		    	return view('student.pages.profile', compact('student'));
		    }
	}

	public function update(Request $request) {
		$user = Auth::user();
	    if($user->role == 2) {
	    	$teacher = $user->teacher;
	    	$teacher->update($request->only('name', 'phone_number'));
	    	if($request->password)
		    	$user->update(['password' => Hash::make($request->password)]);
	    	return redirect(url()->previous())->with('update-success', true);
	    } elseif($user->role == 3) {
	    	$student = $user->student;
	    	$student->update($request->only('name', 'phone_number', 'student_number'));
	    	if($request->password)
		    	$user->update(['password' => Hash::make($request->password)]);
		    return redirect(url()->previous())->with('update-success', true);
	    }
	}

}
