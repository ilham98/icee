<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="">
    table {
        border-collapse: collapse;
    }

    table td, table th {
      padding: 3px 10px;
    }
  </style>
</head>
<body>
  <h3>Student Attendace</h3>
  <table> 
      <tr>
        <td>Teacher</td>
        <td>:</td>
        <td>{{ $teacher->name }}</td>
      </tr>
      <tr>
        <td>Time</td>
        <td>:</td>
        <td>{{ date('h:i A', strtotime($time->start)) }}</td>
      </tr>
      <tr>
        <td>Type</td>
        <td>:</td>
        <td>{{ $time->type == 'A' ? 'Class' : 'Corner' }}</td>
      </tr>
  </table>
  <table style="margin-top: 20px; width: 100%" class="table" border="1">
          <thead>
            <tr>
              <th rowspan="2">No</th>
              <th rowspan="2">S. Number</th>
              <th rowspan="2">Name</th>
              <th colspan="14" style="text-align: center;">Weeks</th>
            </tr>
            <tr> 
                @for($x = 1; $x <= 14; $x++)
                  <th>{{ $x }}</th>
                @endfor
            </tr>
          </thead>
          <tbody>
            @foreach($students as $i => $n)
              <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $n->student_number }}</td>
                <td>{{ $n->name }}</td>
                @for($x = 1; $x <= 14; $x++)
                  <td>
                    {{ $n->attendances->count() > 0 ? ($n->attendances()->where('week', $x)->first() ? $n->attendances()->where('week', $x)->first()->status : '') : '' }}
                  </td>
                @endfor
              </tr>
            @endforeach
          </tbody>
        </table>
</body>
</html>