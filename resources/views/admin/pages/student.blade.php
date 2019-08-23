@extends('admin.master')

@section('title')
  @parent
  Student
@endsection


@section('content')
    <div class="col-lg-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="card-title">
            <h6 class="m-0 font-weight-bold text-primary">Student</h6>
          </div>
        </div>

         @include('components.student-filter-and-search-2')
         <!-- Button trigger modal -->
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
              <form action="/students/export">
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
         @if($students->count() > 0)
        <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Department</th>
            <th>Level</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $i => $n)
            <tr>
              <td>{{ ($students->currentPage() - 1) * $students->perPage() + $i+1 }}</td>
              <td>{{ $n->name }}</td>
              <td>{{ $n->department->name }}</td>
              <td>{{ $n->level }}</td>
                        <td>
                            <a href="/students/{{ $n->student_id }}/edit"><i class="fas fa-edit"></i></a>
                        </td>
            </tr>
          @endforeach
        </tbody>
      </table>  
      @else
        <div class="p-3">Data Empty</div>
      @endif
      <div class="p-3">
        {{ $students->appends($data)->links() }} 
      </div>   
        </div>
      </div>
@endsection