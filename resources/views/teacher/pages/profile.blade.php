@extends('teacher.master')

@section('title')
  @parent
  Interview
@endsection


@section('content')
    <div class="col-lg-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="card-title">
            <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
          </div>
        </div>
        <div class="card-body">
          <form method="POST">
            <div class="form-group col-sm-3">
              <label>Name</label>
              <input value="{{ $teacher->name }}" name="name" class="form-control">
            </div>
            <div class="form-group col-sm-3">
              <label>Phone Number</label>
              <input value="{{ $teacher->phone_number }}" name="phone_number" class="form-control">
            </div>
            <div class="form-group col-sm-3">
              <label>Password</label>
              <input value="" type="password" placeholder="Password not change" name="password" class="form-control">
            </div>
            <div class="form-group col-sm-3">
              <input type="submit" class="btn btn-primary" value="Update Profile">
            </div>
            @method('PUT')
            @csrf
          </form>
        </div>
      </div>

    </div>
     @if(Session::has('update-success'))
        <script type="text/javascript">
            Swal.fire(
                'Success!',
                'Your data has been Updated.',
                'success'
            )
        </script>
    @endif
@endsection