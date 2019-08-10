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
            <h6 class="m-0 font-weight-bold text-primary">Schedule Corner</h6>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Title</th>      
            <th>Time</th>
            <th>Teacher</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $i => $n)
            <tr>
              <td>{{ ($i+1)*$current }}</td>
              <td>{{ $n->name }}</td>
              <td>{{ generateDay($n->day).' '.$n->times[0]->start }}</td>
              <td>{{ $n->teachers[0]->name }}</td>
              <td>
                  <a href="/students/{{ $n->student_id }}/edit"><i class="fas fa-edit"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
        </div>
      </div>
    </div>
@endsection