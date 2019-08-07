@extends('admin.master')

@section('title')
	@parent
	Configurations
@endsection

@section('content')
    <div class="col-lg-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
        	<div class="card-title">
        		<h6 class="m-0 font-weight-bold text-primary">Configuration</h6>
        	</div>
        </div>
        <div class="card-body">
          <form method="POST">
            <div class="row">
              <div class="form-group col-sm-4">
                <label>Current Year</label>
                <input class="form-control" name="current_year" value={{ $configuration->current_year }}>
              </div>
              <div class="form-group col-sm-4">
                <label>Current Semester</label>
                <input class="form-control" name="current_semester" value={{ $configuration->current_semester }}>
              </div>
            </div>
            <hr>
            <div class="text-primary mb-3 font-weight-bold">Registration</div>
            <div class="row">
              <div class="form-group col-sm-4">
                <label>Registration Open</label>
                <input class="form-control" name="registration_open" type="date" value={{ $configuration->registration_open }}>
              </div>
              <div class="form-group col-sm-4">
                <label>Registration Close</label>
                <input class="form-control" name="registration_close" type="date" value={{ $configuration->registration_close }}>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" name="" value="Save Changes" class="btn btn-primary">
            </div> 
            @csrf
            @method('POST')
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