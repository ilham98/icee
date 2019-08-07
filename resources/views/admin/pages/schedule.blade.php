@extends('admin.master')

@section('title')
  @parent
  Schedule
@endsection

@section('content')
    <div class="col-lg-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="card-title">
            <h6 class="m-0 font-weight-bold text-primary">Student</h6>
          </div>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="col-sm-6 ">
              <a class="h3 text-primary" href="/schedules/class">Class</a>
              <div><div>Bla bla bla Bla bla bla Bla bla bla</div></div>
            </div>
            <div class="col-sm-6">
              <a class="h3 text-success" href="/schedules/corner">Corner</a>
              <div><div>Bla bla bla Bla bla bla Bla bla bla</div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection