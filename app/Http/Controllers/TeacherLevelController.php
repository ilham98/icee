<?php

namespace App\Http\Controllers;

use Auth;
use App\TeacherLevel;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherLevelController extends Controller
{
    public function index(Request $request) {
    	$teachers = Teacher::with(['level' => function($query) use($request){
    		$query->where(['year' => $request->year, 'semester' => $request->semester]);
    	}])->paginate(20);
    	$current = $teachers->currentPage();
    	return view('admin.pages.teacher-level', compact('teachers', 'current'));
    }

    public function edit(Request $request, $id) {
    	$teacher = Teacher::with(['level' => function($query) use($request){
    		$query->where(['year' => $request->year, 'semester' => $request->semester]);
    	}])->where('teacher_id', $id)->first();
    	return view('admin.pages.teacher-level-edit', compact('teacher'));
    }

    public function update(Request $request, $id) {
    	$teacher = Teacher::find($id);
    	$level = $teacher->level()->where(function($query) use($request){
    		$query->where(['year' => $request->year, 'semester' => $request->semester]);
    	})->first();
    	if($level)
	    	$level->update(array_merge($request->all(), ['teacher_id', $id]));
	    else
	    	TeacherLevel::create(array_merge($request->all(), ['teacher_id' => $id]));
    	return redirect(url()->previous());
    }
}
