@extends('admin.master')

@section('title')
	@parent
	Interview
@endsection

@section('content')
    <div class="col-lg-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
        	<div class="card-title">
        		<h6 class="m-0 font-weight-bold text-primary">Teacher Level</h6>
        	</div>
        </div>
        <div class="card-body">
          <form action="/teacher-level/{{ $teacher->teacher_id }}?year={{ Request::get('year') }}&semester={{ Request::get('semester') }}" method="POST">
              <div class="form-group col-sm-4">
                <select type="text" class="form-control" name="level" value="">
                  <option>Pilih Level</option>
                  <option {{ $teacher->level->count() > 0 ? ($teacher->level[0]->level == 1 ? 'selected' : '') : '' }} value='1'>1</option>
                  <option {{ $teacher->level->count() > 0 ? ($teacher->level[0]->level == 2 ? 'selected' : '') : '' }} value='2'>2</option>
                </select>
              </div>
              <input type="submit" class="btn btn-primary" value="Update">
              @csrf
              @method('PUT')
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