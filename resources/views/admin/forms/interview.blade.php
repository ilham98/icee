<div class="form-group">
  <label>Notes</label>
  <input class="form-control col-sm-5" name='note' aria-describedby="emailHelp" placeholder="Enter note" value="{{ old('note') ? old('note') : $student->note }}">
  <p class="text-danger">
      @if($errors->has('note')) 
        {{ $errors->first('note') }}  
      @endif  
  </p>
</div>
<div class="form-group">
  <label>Level</label>
  <select class="form-control col-sm-5" name='level'>
    <option value="">Pilih Level</option>
    @foreach([1,2,3,4,5,6] as $level) {
      <option value="{{ $level }}" {{ $level == (old('level') ? old('level') : $student->level) ? 'selected' : '' }}>{{ $level }}</option>
    }  
    @endforeach 
  </select>
  <p class="text-danger">
      @if($errors->has('level')) 
        {{ $errors->first('level') }}  
      @endif  
  </p>
</div>
@csrf
@method('PUT')