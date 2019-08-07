@extends('student.master')

@section('title', 'Student')

@section('content')
	<div class="card">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <div class="row">
        <div class="col-sm-7">
          <div class="form-group">
            <label>Name</label>
            <input disabled="" class="form-control" value="{{ $user->student->name }}">
          </div>
          <div class="form-group">
            <label>Student Number</label>
            <input disabled="" class="form-control" value="{{ $user->student->student_number }}">
          </div>
          <div class="form-group">
            <label>Department</label>
            <input disabled="" class="form-control" value='{{ $user->student->department->name }}'>
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input disabled="" class="form-control" value='{{ $user->student->phone_number }}'>
          </div>
          <div class="form-group">
            <label>Year</label>
            <input disabled="" class="form-control" value='{{ $user->student->year }}'>
          </div>
          <div class="form-group">
            <label>Semester</label>
            <input disabled="" class="form-control" value='{{ $user->student->semester }}'>
          </div>
        </div>
        <div class="col-sm-5">
          @if($class)
          <div class="card">
            <div class="card-body">
              <div>Class</div>
              <div class="form-group">
                <span class="badge text-primary h1" style="font-size: 150%">{{ generateDay($class->day) }}</span>
                <span class="badge badge-light h1" style="font-size: 150%">{{ timePretty($class->start) }}</span>
                @if($class_teacher)
                    <div class="h6 ml-2 text-primary">{{ $class_teacher->name }}</div>
                  @endif
              </div>
            </div>
          </div>
          @endif
          @if($corner)
            <div class="card mt-3">
              <div class="card-body">
                <div>Corner</div>
                <div class="form-group">
                  <span class="badge text-primary h1" style="font-size: 150%">{{ generateDay($corner->day) }}</span>
                  <span class="badge badge-light h1" style="font-size: 150%">{{ timePretty($corner->start) }}</span>
                  @if($corner_teacher)
                    <div class="h6 ml-2 text-primary">{{ $corner_teacher->name }}</div>
                  @endif
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection