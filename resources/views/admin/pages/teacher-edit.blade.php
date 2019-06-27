@extends('admin.master')

@section('title')
	@parent
	Teacher
@endsection

@section('content')
    <div class="col-lg-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
        	<div class="card-title">
        		<h6 class="m-0 font-weight-bold text-primary">Teacher</h6>
        	</div>
        </div>
        <div class="card-body">
          <form action="/admin/teachers/{{ $teacher->teacher_id }}" method="POST">
              @component('admin.forms.teacher', compact('teacher'))
              @endcomponent
              <input type="submit" class="btn btn-primary" value="Update">
              @csrf
              @method('PUT')
         </form>
        </div>
      </div>
    </div>
    @if(Session::has('edit-success')))
        <script type="text/javascript">
           Swal.fire(
                'Success!',
                'Your data has been updated.',
                'success'
            )
        </script>
    @endif
@endsection