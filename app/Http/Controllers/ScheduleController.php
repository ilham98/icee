<?php

namespace App\Http\Controllers;

use App\Time;
use App\Student;
use Illuminate\Http\Request;
use PDF;

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
        $departments = \App\Department::all();
    	return view('admin.pages.schedule', compact('students', 'current', 'departments'));
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
        $students = $students->with(['times' => function($query) {
            $query->where('times.type', 'A');
        }]);
        $students = $students->whereHas('times', function($query) {
                        $query->where('times.type', 'A');
                    }, '>', 0)->whereHas('teachers', function($query) {
                        $query->where('student_teacher.type', 'A');
                    })->get();
        $pdf = PDF::loadView('exports.schedule-export', compact('students'))->setPaper('a4', 'landscape');

        // return $pdf->download('invoice.pdf');
        return $pdf->stream();
    }
}

