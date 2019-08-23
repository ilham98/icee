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
	<h3>Students</h3>
	<table border="1" style="border-collapse: collapse;">	
		<thead>
			<tr>	
				<th>Student Number</th>
				<th>Name</th>
				<th>Deparment</th>
				<th>Phone Number</th>
				<th>Level</th>
			</tr>
		</thead>
		<tbody>
			@foreach($students as $s)
				<tr>
					<td>{{ $s->student_number }}</td>
					<td>{{ $s->name }}</td>
					<td>{{ $s->department->name }}</td>
					<td>{{ $s->phone_number }}</td>
					<td>{{ $s->level }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>