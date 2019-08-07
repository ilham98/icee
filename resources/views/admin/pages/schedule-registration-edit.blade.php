@extends('admin.master')

@section('title')
  @parent
  Schedule Registration
@endsection

@section('content')
    <div class="col-lg-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="card-title">
            <h6 class="m-0 font-weight-bold text-primary">Schedule</h6>
          </div>
        </div>
        <div class="card-body">
          <form action="/schedule-registration/{{ $student->student_id }}" method="POST">
                @include('admin.forms.schedule')
              <input type="submit" class="btn btn-primary" value="Update">
         </form>
        </div>
      </div>
    </div>
    @if(Session::has('edit-success'))
        <script type="text/javascript">
           Swal.fire(
                'Success!',
                'Your data has been updated.',
                'success'
            )
        </script>
    @endif
@endsection