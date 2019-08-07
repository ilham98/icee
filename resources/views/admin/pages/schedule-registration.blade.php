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
            <h6 class="m-0 font-weight-bold text-primary">Student</h6>
          </div>
        </div>
         @include('components.student-filter-and-search')
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
                            <a href="/schedule-registration/{{ $n->student_id }}/edit"><i class="fas fa-edit"></i></a>
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