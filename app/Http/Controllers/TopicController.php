<?php

namespace App\Http\Controllers;

use Auth;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function store(Request $request) {
    	$request->validate([
    		'conversation' => 'required'
    	]);


    	$body = array_merge($request->all(), ['year' => $request->year, 'semester' => $request->semester, 'teacher_id' => Auth::user()->teacher->teacher_id]);

		$topic = Topic::create($body);
    	

    	return redirect(url()->previous())->with('insert-success', 'success');
    }

    public function destroy($id) {
        $topic = Topic::find($id);
        
        $topic->delete();
        return redirect(url()->previous())->with('delete-success', 'success');
    }
}
