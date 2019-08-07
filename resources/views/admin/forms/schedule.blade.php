
<div class="form-group">
  <label>Class Schedule</label>
  <select class="form-control col-sm-5" name='class_schedule_id'>
    <option value="">Choose class schedule</option>
    @foreach($class_schedule as $cs)
      <option {{ $class_schedule_id == $cs->time_id ? 'selected' : '' }} value={{  $cs->time_id }}>{{ $cs->day }} -- {{ $cs->start }}</option>
    @endforeach
  </select>
  <p class="text-danger">
    @if($errors->has('class_schedule_id')) 
      {{ $errors->first('class_schedule_id') }}  
    @endif  
  </p>
</div>
<div class="form-group">
  <label>Class Corner</label>
  <select class="form-control col-sm-5" name='corner_schedule_id'>
    <option value="">Choose corner schedule</option>
    @foreach($corner_schedule as $cs)
      <option {{ $corner_schedule_id == $cs->time_id ? 'selected' : '' }} value={{  $cs->time_id }}>{{ $cs->day }} -- {{ $cs->start }}</option>
    @endforeach
  </select>
  <p class="text-danger">
      @if($errors->has('corner_schedule_id'))
        {{ $errors->first('corner_schedule_id') }}  
      @endif  
  </p>
</div>
@csrf
@method('PUT')