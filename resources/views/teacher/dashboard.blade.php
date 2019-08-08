@extends('teacher.master')

@section('title')
  @parent
  Dashboard
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