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
            <h6 class="m-0 font-weight-bold text-primary">Schedule</h6>
          </div>
        </div>
        <div class="card-body p-3">
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
              <form action="/schedules/export">
                  <div class="modal-body">
                <div class="p-3">
              @php
                $years = [];
                for($i = (int)date('Y'); $i > 2015; $i--) {
                  array_push($years, $i);
                }
              @endphp
              <div class="form-group">
                <label>Year</label>
                <select class="form-control" type="text" name="year">
                    <option value="">Choose Year</option>
                    @foreach($years as $year)
                      <option {{ Request::get('year') == $year ? 'selected' : '' }} value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Semester</label>
                <select class="form-control" type="text" name="semester">
                    <option value="">Choose Semester</option>
                    <option {{ Request::get('semester') == 1 ? 'selected' : '' }} value="1">1</option>
                    <option {{ Request::get('semester') == 2 ? 'selected' : '' }} value="2">2</option>
                </select>
              </div>
              <div class="form-group">
                <label>Level</label>
                <select class="form-control" type="text" name="level">
                    <option value="">Choose Level</option>
                    <option {{ Request::get('level') == 1 ? 'selected' : '' }} value="1">1</option>
                    <option {{ Request::get('level') == 2 ? 'selected' : '' }} value="2">2</option>
                    <option {{ Request::get('level') == 3 ? 'selected' : '' }} value="3">3</option>
                    <option {{ Request::get('level') == 4 ? 'selected' : '' }} value="4">4</option>
                    <option {{ Request::get('level') == 5 ? 'selected' : '' }} value="5">5</option>
                    <option {{ Request::get('level') == 6 ? 'selected' : '' }} value="6">6</option>
                </select>
              </div>
              <div class="form-group">
                <label>Department</label>
                <select class="form-control" type="text" name="department_id">
                    <option value="">Choose Department</option>
                    @foreach($departments as $department)
                      <option {{ Request::get('department_id') == $department->department_id ? 'selected' : '' }} value="{{ $department->department_id }}">{{ $department->name }}</option>
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