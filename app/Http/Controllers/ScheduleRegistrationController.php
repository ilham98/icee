<?php

namespace App\Http\Controllers;

use App\Time;
use App\Department;
use App\Student;
use Illuminate\Http\Request;

class ScheduleRegistrationController extends Controller
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

    public function index(Request $request) {
    	$data = $request->all();
        $departments = Department::all();
        $students = new Student;
        $students = $students->where(['semester' => $request->semester, 'year' => $request->year]);
        if(isset($data['search_query']))
            $students = $students->where(function($query) use($data) {
                $query->orWhere('student_number', 'like' , '%'.$data['search_query'].'%')->orWhere('name', 'like' , '%'.$data['search_query'].'%');
            });
        if(isset($data['level']))
            $students = $students->where('level', $data['level']);
        if(isset($data['department_id']))
            $students = $students->where('level', $data['department_id']);
        $students = $students->paginate(20);

        
        $current = $students->currentPage();
        // dd($students);
        return view('admin.pages.schedule-registration', compact('students', 'current', 'departments', 'data'));
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
    	return view('admin.pages.schedule-registration-edit', compact(
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
    	return redirect('/schedule-registration/'.$id.'/edit')->with('edit-success', 'success');;
    }
}
