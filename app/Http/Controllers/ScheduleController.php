<?php

namespace App\Http\Controllers;

use App\Time;
use App\Student;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function getDay($day) {
        switch($day) {
                case '1':
                    return 'Senin';
                case '2':
                    return 'Selasa';
                case '3':
                    return 'Rabu';
                case '4':
                    return 'Kamis';
                case '5':
                    return 'Jum\'at';
                case '6':
                    return 'Sabtu';
                return 'Senin';
            } 
    }

    public function index() {
    	$students = Student::paginate(10);
    	$current = $students->currentPage();
    	return view('admin.pages.schedule', compact('students', 'current'));
    }

    public function edit($id) {
        $class_schedule = Time::where('type', 'A')->get();
        $corner_schedule = Time::where('type', 'B')->get();
        foreach($class_schedule as $cs) {
            $cs->day = $this->getDay($cs->day);
        }
        foreach($corner_schedule as $cs) {
            $cs->day = $this->getDay($cs->day);
        }

        $class_schedule_id = Student::find($id)->times()->where('times.type', 'A')->first() ? Student::find($id)->times()->where('times.type', 'A')->first()->time_id : '';

        $corner_schedule_id = Student::find($id)->times()->where('times.type', 'B')->first() ? Student::find($id)->times()->where('times.type', 'B')->first()->time_id : '';

    	$student = Student::find($id);
    	return view('admin.pages.schedule-edit', compact(
            'student', 
            'class_schedule', 
            'corner_schedule',
            'class_schedule_id',
            'corner_schedule_id'
        ));
    }

    public function update(Request $request, $id) {
    	$request->validate([
    		'class_schedule_id' => 'required',
    		'corner_schedule_id' => 'required'
    	]);

        $student = Student::find($id);
        $student->times()->sync([
            $request->class_schedule_id,
            $request->corner_schedule_id
        ]);

    	$body = $request->all();
    	$student = Student::find($id);
    	$student->update($body);
    	return redirect('/schedule/'.$id.'/edit')->with('edit-success', 'success');;
    }
}
