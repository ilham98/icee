@extends('admin.master')

@section('title')
	@parent
	Teacher
@endsection

@section('content')
    <div class="col-lg-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
        	<div class="card-title">
        		<h6 class="m-0 font-weight-bold text-primary">Teachers</h6>
        	</div>
          	<div class="card-title">
        		<h6 class="m-0 font-weight-bold text-primary">
        			<button 
        				type="button" 
        				href="" 
        				class="btn btn-primary" 
        				data-toggle="modal" 
        				data-target="#add"
        			>Add Teacher</button>
        		</h6>
        	</div>
        </div>
        <div class="card-body p-0">
          <table class="table">
    		  	<thead>
    		  		<tr>
    		  			<th>No</th>
    		  			<th>Name</th>
                <th>Phone Number</th>
                <th>Option</th>
    		  		</tr>
    		  	</thead>
    		  	<tbody>
    		  		@foreach($teachers as $i => $t)
    		  			<tr>
    		  				<td>{{ ($i+1)*$current }}</td>
    		  				<td>{{ $t->name }}</td>
                  <td>{{ $t->phone_number }}</td>
                  <td>
                      <a href="/teachers/{{ $t->teacher_id }}"><i class="fas fa-edit"></i></a>
                      <i class="fas fa-trash text-danger delete" data-id="{{ $t->teacher_id }}"></i>
                  </td>
    		  			</tr>
    		  		@endforeach
    		  	</tbody>
    		  </table>
        </div>
      </div>
        <form action="/teachers" method="POST">
    		@component('admin.components.modal')
    			@slot('id', 'add')
    			@slot('title', 'Add Teacher')
    			@slot('body')
    				@include('admin.forms.teacher')
    			@endslot
    		@endcomponent
        @csrf
        @method('POST')
         </form>
         <form id="delete-form" action="" method="POST">
            @csrf
            @method('DELETE')
         </form>
    </div>

    @if($errors->any())
        <script type="text/javascript">
        	$('#add').modal('show');
        </script>
    @endif
    <script type="text/javascript">
        $('.delete').click(function() {
            var id= $(this).data('id');
            $('#delete-form').attr('action', '/teachers/' + id);
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