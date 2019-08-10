@extends('teacher.master')

@section('title')
  @parent
  Pick Student
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
          <div class="row p-3">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="text-primary h4">Class</div>
                  @if($classState->count() > 0)
                    @php
                      $length = 0;
                    @endphp
                    @foreach($classState as $i => $cs)
                      <div>{{ $i }}</div>
                      <div><span class="text-primary font-weight-bold">{{ $cs->count() }}</span> student{{ $cs->count() > 1 ? 
                      's' : '' }}</div>
                      @php
                        $length++;
                      @endphp
                      @if($length < $classState->count())
                        <hr>
                      @endif
                    @endforeach
                  @else
                    <div>You're not pick any student yet.</div>
                    <div>The student you've choosen would shown here.</div>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                 <div class="card-body">
                  <div class="text-success h4">Corner</div>
                  @if($cornerState->count() > 0)
                    @php
                      $length = 0;
                    @endphp
                    @foreach($cornerState as $i => $cs)
                      <div>{{ $i }}</div>
                      <div><span class="text-success font-weight-bold">{{ $cs->count() }}</span> student{{ $cs->count() > 1 ? 
                      's' : '' }}</div>
                      @php
                        $length++;
                      @endphp
                      @if($length < $cornerState->count())
                        <hr>
                      @endif
                    @endforeach
                  @else
                    <div>You're not pick any student yet.</div>
                    <div>The student you've choosen would shown here.</div>
                  @endif
                </div>
              </div>
            </div>
          </div>
          @include('components.student-filter-and-search')
          @if($students->count() > 0)
          <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Level</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $i => $n)
            <tr>
              <td>{{ ($i+1)*$current }}</td>
              <td>{{ $n->name }}</td>
              <td>{{ $n->level }}</td>
                        <td>
                            @if(!$n->teachers()->where('student_teacher.type', 'A')->first())
                            <a href="/pick-student/{{ $n->student_id }}/pick?type=A">Pick to class <i class="fas fa-edit"></i></a>
                            <br>
                            @else
                            <a href="/pick-student/{{ $n->student_id }}/unpick?type=A">Unpick from class <i class="fas fa-edit"></i></a>
                            <br>
                            @endif
                            @if(!$n->teachers()->where('student_teacher.type', 'B')->first())
                            <a href="/pick-student/{{ $n->student_id }}/pick?type=B">Pick to corner <i class="fas fa-edit"></i></a>
                            @else
                            <a href="/pick-student/{{ $n->student_id }}/unpick?type=B">Unpick from corner <i class="fas fa-edit"></i></a>
                            <br>
                            @endif
                        </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      @else
        <div class="p-3">There is no student who have registered</div>
      @endif
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