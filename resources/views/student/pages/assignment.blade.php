@extends('student.master')

@section('title', 'Attendance')

@section('content')
	<div class="card">
    <div class="card-header py-3">
          <div class="card-title">
            <h6 class="m-0 font-weight-bold text-primary">Assignment</h6>
          </div>
      </div>
    <div class="card-body">
      <form class="row">
        <div class="form-group col-sm-3">
          <label>Week</label>
          <select type="text" name="week" class="form-control">
            <option value="">Choose Week</option>
            @foreach([1,2,3,4,5,6,7,8,9,10,11,12,13,14] as $week)
              <option {{ Request::get('week') == $week ? 'selected' : '' }} value="{{ $week }}">{{ $week }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-sm-2">
          <label><span class="text-white">S</span></label>
          <div>
            <input type="submit" name="" value="Filter" class="btn btn-primary">
          </div>
          
        </div>
      </form>
      @if($topics->count() > 0 && Request::get('week'))
      <form class="row" method="POST" action="/assignments?week={{ Request::get('week') }}">
        @foreach($topics as $i => $topic)
          @php
            $assignment = App\Assignment::where([
              'student_id' => Auth::user()->student->student_id,
              'topic_id' => $topic->topic_id,
              'week' => Request::get('week')
            ])->first();
            $vocabularies = $assignment ? $assignment->vocabularies : [];
            $v = [];
            foreach($vocabularies as $vocabulary) {
                array_push($v, $vocabulary->word);
            }
            $vocabularies = implode($v, ', ');
          @endphp
          <div class="col-sm-6 my-3">
            <div class="">Topic {{ $i+1 }}</div> 
            <div class="h5 text-primary">{{ $topic->conversation }}</div> 
            <div class="form-group">
              <label>Student Comment</label>
              <textarea name="student_comment[{{ $topic->topic_id }}]" class="form-control">{{ $assignment ? $assignment->student_comment : '' }}</textarea>
            </div>     
            <div class="form-group">
              <label>Partner</label>
              <input value="{{ $assignment ? $assignment->partner : '' }}" name="partner[{{ $topic->topic_id }}]" class="form-control">
            </div> 
            <div class="form-group">
              <label>Minute</label>
              <input value="{{ $assignment ? $assignment->minute : '' }}" name="minute[{{ $topic->topic_id }}]" class="form-control">
            </div>
            <div class="form-group">
              <label>Vocabularies</label>
              <input value="{{ $vocabularies }}" name="vocabularies[{{ $topic->topic_id }}]" class="form-control">
            </div>
          </div>
        @endforeach
        @csrf
        @method('POST')
        <div class="d-flex col-12">
          <input type='submit' value="Save Changes" class="btn btn-success" />
        </div>
      </form>
      @else
        No Assignment
      @endif
    </div>
  </div>

  @if(Session::has('insert-success'))
    <script type="text/javascript">
        Swal.fire(
            'Success!',
            'Your data has been inserted.',
            'success'
        )
    </script>
  @endif
@endsection