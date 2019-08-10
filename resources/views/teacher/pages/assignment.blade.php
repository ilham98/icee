@extends('teacher.master')

@section('title', 'Assignment')

@section('content')
	<div class="card">
    <div class="card-header py-3">
          <div class="card-title">
            <h6 class="m-0 font-weight-bold text-primary">Assignment</h6>
          </div>
      </div>
    <div class="card-body">
      <form class="row">
        <div class="form-group col-sm-3">
          <label>Schedule</label>
          <select type="text" name="time_id" class="form-control">
            <option value="">Choose Schedule</option>
            @foreach($times as $time)
              <option {{ Request::get('time_id') == $time->time_id ? 'selected' : '' }} value="{{ $time->time_id }}">{{ getClassType($time->type) }} {{ $time->start }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-sm-3">
          <label>Week</label>
          <select type="text" name="week" class="form-control">
            <option value="">Choose Week</option>
            @foreach([1,2,3,4,5,6,7,8,9,10,11,12,13,14] as $week)
              <option {{ Request::get('week') == $week ? 'selected' : '' }} value="{{ $week }}">{{ $week }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-sm-2">
          <label><span class="text-white">S</span></label>
          <div>
            <input type="submit" name="" value="Filter" class="btn btn-primary">
          </div>
        </div>
      </form>
      <div class="row">
        <form id="delete-form" action="" method="POST">
            @csrf
            @method('DELETE')
         </form>
        @foreach($topics as $i => $topic)
          <div class="p-3 col-sm-6">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                    <p class="text-black font-weight-bold">Topic {{ $i+1  }}</p>
                    <i class="fas fa-trash text-danger delete" data-id="{{ $topic->topic_id }}"></i>
                </div>
                
                <p class="text-primary font-weight-bold">{{ $topic->conversation }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      @if($students->count() > 0 && Request::get('time_id') && Request::get('week'))
      @if($topics->count() < 4)
        <button 
          type="button" 
          href="" 
          class="btn btn-primary d-inline-block my-3" 
          data-toggle="modal" 
          data-target="#add"
        >Add Conversation</button>
      @endif
      <form class="p-3" action="/topics?time_id={{Request::get('time_id')}}&week={{Request::get('week')}}" method="POST">
      @component('components.modal')
          @slot('id', 'add')
          @slot('title', 'Add Conversation')
          @slot('body')
            
              <div class="form-group">
                <label>Conversation</label>
                <input class="form-control" type="" name="conversation" value="">
              </div>
              <div class="form-group">
                <label class="text-white">|</label>
              </div>
          @endslot
        @endcomponent
        @csrf
        @method('POST')
      </form>
      <form method="POST">
        <div> 
          <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Collected?</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>
            @foreach($students as $i => $n)
              <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $n->name }}</td>
                <td>{{ $n->assignments()->where('week', Request::get('week'))->get()->count() > 0 ? 'yes' : 'no' }}</td>
                <td>
                  <a href="/assignments/{{ $n->student_id }}?week={{ Request::get('week') }}" class="btn btn-warning">View Detail</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
        @csrf
        @method('POST')
        <div class="d-flex">
          <input type='submit' value="Save Changes" class="ml-auto btn btn-success" />
        </div>
      </form>
      @else
        No Data
      @endif
    </div>
  </div>
  @if(Session::has('insert-success'))
    <script type="text/javascript">
        Swal.fire(
            'Success!',
            'Your data has been inserted.',
            'success'
        )
    </script>
  @endif
  @if(Session::has('delete-success'))
      <script type="text/javascript">
          Swal.fire(
              'Deleted!',
              'Your data has been deleted.',
              'success'
          )
      </script>
  @endif
  <script type="text/javascript">
        $('.delete').click(function() {
            var id= $(this).data('id');
            $('#delete-form').attr('action', '/topics/' + id);
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
@endsection