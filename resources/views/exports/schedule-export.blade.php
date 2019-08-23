<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="">
		table td, table th {
			padding: 5px;
		}
	</style>
</head>
<body>
	<h3>Schedules</h3>
	@if(isset($type))
	<h5>Type: {{ $type }}</h5>
	@endif
	<table border="1" style="border-collapse: collapse;">	
		<thead>
			<tr>	
				<th>Student Number</th>
				<th>Name</th>
				<th>Deparment</th>
				<th>Schedules</th>
				<th>Teacher</th>
			</tr>
		</thead>
		<tbody>
			@foreach($students as $s)
				<tr>
					<td>{{ $s->student_number }}</td>
					<td>{{ $s->name }}</td>
					<td>{{ $s->department->name }}</td>
					@if(!isset($type))
					<td style="text-align: center">{{ $s->times()->where('type', 'A')->first() ? 'Class: '.$s->times()->where('type', 'A')->first()->start : '' }}
						<br>
						{{ $s->times()->where('type', 'B')->first() ? 'Corner: '.$s->times()->where('type', 'B')->first()->start : '' }}
						{{ $s->times->count() == 0 ? '-' : '' }}
					</td>
					<td style="text-align: center">{{ $s->teachers()->where('type', 'A')->first() ? 'Class: '.$s->teachers()->where('type', 'A')->first()->name : '' }}
						<br>
						{{ $s->teachers()->where('type', 'B')->first() ? 'Corner: '.$s->teachers()->where('type', 'B')->first()->name : '' }}
						{{ $s->teachers->count() == 0 ? '-' : '' }}
					</td>
					@else
						@if($type === 'Class')
					<td style="text-align: center">{{ $s->times()->where('type', 'A')->first() ? $s->times()->where('type', 'A')->first()->start : '' }} 
					</td>
					<td style="text-align: center">{{ $s->teachers()->where('type', 'A')->first() ? $s->teachers()->where('type', 'A')->first()->name : '' }}
					</td>
						@elseif($type === 'Corner')
					<td style="text-align: center">{{ $s->times()->where('type', 'B')->first() ? $s->times()->where('type', 'B')->first()->start : '' }} 
					</td>
					<td style="text-align: center">{{ $s->teachers()->where('type', 'B')->first() ? $s->teachers()->where('type', 'B')->first()->name : '' }}
					</td>
						@endif

					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>