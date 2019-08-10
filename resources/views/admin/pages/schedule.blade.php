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
            <div class="col-sm-6">
              <div>
                <div class="col-sm-12 my-3">
                  <img style="width: 100%" src="/img/class.jpg">
                </div>
                <div class="col-sm-12 my-3 text-center">
                  <a class="h3 text-primary text-center" href="/schedules/class">Class</a>  
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div>
                <div class="col-sm-12 my-3">
                  <img style="width: 100%" src="/img/corner.jpg">
                </div>
                <div class="col-sm-12 my-3 text-center">
                  <a class="h3 text-primary text-center" href="/schedules/corner">Corner</a>  
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
@endsection