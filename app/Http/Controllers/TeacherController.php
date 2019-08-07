<?php

namespace App\Http\Controllers;

use App\User;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index() {
    	$teachers = Teacher::paginate(20);
    	$current = $teachers->currentPage();
    	return view('admin.pages.teacher', compact('teachers', 'current'));
    }

    public function store(Request $request) {
    	$request->validate([
    		'name' => 'required',
    		'email' => 'required|email',
    		'phone_number' => 'required'
    	]);

    	$user = User::create([
    		'email' => $request->email,
    		'password' => Hash::make($request->email),
            'role' => 2
    	]);

    	$teacher = Teacher::create([
    		'name' => $request->name,
    		'phone_number' => $request->phone_number,
    		'user_id' => $user->user_id
    	]);

    	return redirect('/teachers')->with('insert-success', 'success');
    }

    public function edit($id){
        $teacher = Teacher::find($id);
        return view('admin.pages.teacher-edit', compact('teacher'));
    }

    public function update($id, Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required'
        ]);

        $teacher = Teacher::find($id);

        $teacher->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number
        ]);

        $user = User::find($teacher->user->user_id);
        $user->update([
            'email' => $request->email,
        ]);

        return redirect()->back()->with('edit-success', 'success');
    }

    public function destroy($id, Request $request) {
        $teacher = Teacher::find($id);
        $user = User::find($teacher->user->user_id);
        
        $teacher->delete();
        $user->delete();
        
        return redirect('/teachers')->with('delete-success', 'success');
    }
}
