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
            <h6 class="m-0 font-weight-bold text-primary">Student</h6>
          </div>
        </div>
        <div class="card-body p-0">
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
              <td>{{ ($i+1)*$current }}</td>
              <td>{{ $n->name }}</td>
              <td>{{ $n->department->name }}</td>
              <td>{{ $n->level }}</td>
                        <td>
                            <a href="/interview/{{ $n->student_id }}/edit"><i class="fas fa-edit"></i></a>
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

    </div>

    @if($errors->any())
        <script type="text/javascript">
          $('#add').modal('show');
        </script>
    @endif
    <script type="text/javascript">
        $('.delete').click(function() {
            var id= $(this).data('id');
            $('#delete-form').attr('action', '/admin/students/' + id);
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => { 
              if (result.value) {
                 $('#delete-form').submit();
              }
            })
        })
    </script>
    @if(Session::has('delete-success')))
        <script type="text/javascript">
            Swal.fire(
                'Deleted!',
                'Your data has been deleted.',
                'success'
            )
        </script>
    @endif
     @if(Session::has('insert-success')))
        <script type="text/javascript">
            Swal.fire(
                'Success!',
                'Your data has been inserted.',
                'success'
            )
        </script>
    @endif
@endsection