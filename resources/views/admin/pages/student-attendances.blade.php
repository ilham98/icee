@extends('admin.master')

@section('title')
  @parent
  Student Attendance
@endsection

@section('content')
  <div class="card">
    <div class="card-header py-3">
          <div class="card-title">
            <h6 class="m-0 font-weight-bold text-primary">Attendance</h6>
          </div>
      </div>
    <div class="card-body">
      <form class="row">
        <div class="form-group col-sm-3">
          <label>Teacher</label>
          <select type="text" name="teacher_id" class="form-control">
            <option value="">Choose Teacher</option>
            @foreach($teachers as $teacher)
              <option {{ Request::get('teacher_id') == $teacher->teacher_id ? 'selected' : '' }} value="{{ $teacher->teacher_id }}">{{ $teacher->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-sm-3">
          <label>Schedule</label>
          <select type="text" name="time_id" class="form-control">
            <option value="">Choose Schedule</option>
            @foreach($times as $time)
              <option {{ Request::get('time_id') == $time->time_id ? 'selected' : '' }} value="{{ $time->time_id }}">{{ getClassType($time->type) }} - {{ generateDay($time->day) }} - {{ $time->start }}</option>
            @endforeach
          </select>
        </div>
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
      <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#exampleModal">
            Print As Pdf
          </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/student-attendance/export">
                  <div class="modal-body">
                <div class="p-3">
              <div class="form-group">
          <label>Teacher</label>
          <select type="text" name="teacher_id" class="form-control">
            <option value="">Choose Teacher</option>
            @foreach($teachers as $teacher)
              <option {{ Request::get('teacher_id') == $teacher->teacher_id ? 'selected' : '' }} value="{{ $teacher->teacher_id }}">{{ $teacher->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Schedule</label>
          <select type="text" name="time_id" class="form-control">
            <option value="">Choose Schedule</option>
            @foreach($times as $time)
              <option {{ Request::get('time_id') == $time->time_id ? 'selected' : '' }} value="{{ $time->time_id }}">{{ getClassType($time->type) }} - {{ generateDay($time->day) }} - {{ $time->start }}</option>
            @endforeach
          </select>
        </div>
          </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Print As Pdf</button>
              </div>
              </form>
              
            </div>
          </div>
        </div>
      @if($students->count() > 0 && Request::get('teacher_id') && Request::get('time_id') && Request::get('week'))
      <form method="POST" action="/attendances?week={{ Request::get('week') }}">
        <div> 
          <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Option</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($students as $i => $n)
              <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $n->name }}</td>
                <td>
                  P <input type="radio" class="mr-2" 
                  {{ $n->attendances->count() > 0 && $n->attendances[0]->status === 'P' ? 'checked' : '' }} value='P' name="status[{{ $n->student_id }}]">
                  L <input class="mr-2"  {{ $n->attendances->count() > 0 && $n->attendances[0]->status === 'L' ? 'checked' : '' }} type="radio" value='L' name="status[{{ $n->student_id }}]">
                  S <input class="mr-2"  {{ $n->attendances->count() > 0 && $n->attendances[0]->status === 'S' ? 'checked' : '' }} type="radio" value='S' name="status[{{ $n->student_id }}]">
                  A <input class="mr-2"  {{ $n->attendances->count() > 0 && $n->attendances[0]->status === 'A' ? 'checked' : '' }} type="radio" value='A' name="status[{{ $n->student_id }}]">
                  H <input class="mr-2"  {{ $n->attendances->count() > 0 && $n->attendances[0]->status === 'H' ? 'checked' : '' }} type="radio" value='H' name="status[{{ $n->student_id }}]">
                  E <input class="mr-2"  {{ $n->attendances->count() > 0 && $n->attendances[0]->status === 'E' ? 'checked' : '' }} type="radio" value='E' name="status[{{ $n->student_id }}]">
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
        @csrf
        @method('POST')
        <div class="d-flex">
          <input type='submit' value="Save Changes" class="ml-auto btn btn-success" />
        </div>
      </form>
      @else
        No Data
      @endif
    </div>
  </div>
  @if(Session::has('update-success'))
        <script type="text/javascript">
           Swal.fire(
                'Success!',
                'Your data has been updated.',
                'success'
            )
        </script>
    @endif
@endsection