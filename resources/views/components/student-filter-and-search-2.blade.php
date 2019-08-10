<div class="p-3">
          <form class="row">
              <div class="form-group col-sm-4">
                <label>Search</label>
                <input class="form-control" value="{{ Request::get('student_number') }}"type="text" name="student_number" placeholder='Student number or name'>
              </div>
                <div class="form-group col-sm-2">
                  <label class="text-white">|</label>
                  <input type="submit" class="btn btn-primary d-block" value="Search">
                </div>
          </form>
          <form class="row">
              @php
                $years = [];
                for($i = (int)date('Y'); $i > 2015; $i--) {
                  array_push($years, $i);
                }
              @endphp
              <div class="form-group col-sm-2">
                <label>Year</label>
                <select class="form-control" type="text" name="year">
                    <option value="">Choose Year</option>
                    @foreach($years as $year)
                      <option {{ Request::get('year') == $year ? 'selected' : '' }} value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group col-sm-3">
                <label>Semester</label>
                <select class="form-control" type="text" name="semester">
                    <option value="">Choose Semester</option>
                    <option {{ Request::get('semester') == 1 ? 'selected' : '' }} value="1">1</option>
                    <option {{ Request::get('semester') == 2 ? 'selected' : '' }} value="2">2</option>
                </select>
              </div>
              <div class="form-group col-sm-2">
                <label>Level</label>
                <select class="form-control" type="text" name="level">
                    <option value="">Choose Level</option>
                    <option {{ Request::get('level') == 1 ? 'selected' : '' }} value="1">1</option>
                    <option {{ Request::get('level') == 2 ? 'selected' : '' }} value="2">2</option>
                    <option {{ Request::get('level') == 3 ? 'selected' : '' }} value="3">3</option>
                    <option {{ Request::get('level') == 4 ? 'selected' : '' }} value="4">4</option>
                    <option {{ Request::get('level') == 5 ? 'selected' : '' }} value="5">5</option>
                    <option {{ Request::get('level') == 6 ? 'selected' : '' }} value="6">6</option>
                </select>
              </div>
              <div class="form-group col-sm-3">
                <label>Department</label>
                <select class="form-control" type="text" name="department_id">
                    <option value="">Choose Department</option>
                    @foreach($departments as $department)
                      <option {{ Request::get('department_id') == $department->department_id ? 'selected' : '' }} value="{{ $department->department_id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group col-sm-2">
                <label class="text-white">|</label>
                <input type="submit" class="btn btn-primary d-block" value="Filter">
              </div>
          </form>
          </div>