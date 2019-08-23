<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="">

  * {
    font-family: 'Sans-serif';
  }

    table.desc td {
      padding: 3px 5px;
    }

    table {
        border-collapse: collapse;
    }

    table.assignment td, table th {
      padding: 3px 10px;
    }

    table.assignment th {
      text-align: center;
    }

    table.assignment td {
      vertical-align: middle;
    }

    table.assignment td:nth-child(1) {
      font-weight: bold;
      text-align: center;
      padding-top: 20px;
      padding-bottom: 20px;
    }
  </style>
</head>
<body>
  <h3 style="text-align: center;">English Speaking Assignment</h3>
    <table class="desc" style="width: 100%">
      <tr>
        <td style="width: 50%">
          <table>
            <tr>
              <td>Name</td>
              <td>:</td>
              <td>{{ $student->name }}</td>
            </tr>
            <tr>
              <td>Teacher</td>
              <td>:</td>
              <td>{{ $teacher->name }}</td>
            </tr>
          </table>
        </td>
        <td>
          <table>
            <tr>
              <td>Date</td>
              <td>:</td>
              <td>{{ Request::get('week') }}</td>
            </tr>
            <tr>
              <td>Class Schedule</td>
              <td>:</td>
              <td>{{ generateDay($time->day) }}, {{ date('H:i A', strtotime($time->start)) }}</td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  @php
    $assignments = [];
  @endphp
  <table class="assignment" style="margin-top: 20px; width: 100%" class="table" border="1">
          <thead>
            <tr>
              <th style="width: 20%"></th>
              <th style="width: 15%">Day 1</th>
              <th style="width: 15%">Day 2</th>
              <th style="width: 15%">Day 3</th>
              <th style="width: 15%">Day 4</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Conversation<br>Topics</td>
              @for($x = 0; $x < 4; $x++)
                <td>{{ isset($topics[$x]) ? $topics[$x]->conversation : ''  }}</td>
              @endfor
            </tr>
            <tr>
              <td>New<br>Vocabulary<br>Words</td>
              @for($x = 0; $x < 4; $x++)
              @php
                $assignment = null;
                $vocabularies = '';
                if(isset($topics[$x])) {
                  $assignment = App\Assignment::where([
                    'student_id' => Auth::user()->student->student_id,
                    'topic_id' => $topics[$x]->topic_id,
                    'week' => Request::get('week')
                  ])->first();
                  $vocabularies = $assignment ? $assignment->vocabularies : [];
                  $v = [];
                  foreach($vocabularies as $vocabulary) {
                      array_push($v, $vocabulary->word);
                  }
                  $vocabularies = implode($v, ', ');
                }

                array_push($assignments, $assignment);
            @endphp
                <td>{{ isset($vocabularies) ? $vocabularies : ''  }}</td>
              @endfor
            </tr>
            <tr>
              <td>Student<br>Comment</td>
              @for($x = 0; $x < 4; $x++)
                <td>{{ isset($assignments[$x]) ? $assignments[$x]->student_comment : ''  }}</td>
              @endfor
            </tr>
            <tr>
              <td>Teacher<br>Comment</td>
              @for($x = 0; $x < 4; $x++)
                <td>{{ isset($assignments[$x]) ? $assignments[$x]->teacher_comment : ''  }}</td>
              @endfor
            </tr>
            <tr>
              <td>Speaking<br>Partner</td>
              @for($x = 0; $x < 4; $x++)
                <td>{{ isset($assignments[$x]) ? $assignments[$x]->partner : ''  }}</td>
              @endfor
            </tr>
             <tr>
              <td>Number of<br>Minutes</td>
              @for($x = 0; $x < 4; $x++)
                <td>{{ isset($assignments[$x]) ? $assignments[$x]->minute : ''  }}</td>
              @endfor
            </tr>
          </tbody>
        </table>
</body>
</html>