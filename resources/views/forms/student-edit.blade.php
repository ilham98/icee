<div class="form-group">
  <label>Student Number</label>
  <input class="form-control  col-sm-5" name='student_number' aria-describedby="emailHelp" placeholder="Enter student_number" value="{{ old('student_number') ? old('student_number') : $student->student_number }}">
  <p class="text-danger">
      @if($errors->has('student_number')) 
        {{ $errors->first('student_number') }}  
      @endif  
  </p>
</div>
<div class="form-group">
  <label>Name</label>
  <input class="form-control  col-sm-5" name='name' aria-describedby="emailHelp" placeholder="Enter name" value="{{ old('name') ? old('name') : $student->name }}">
  <p class="text-danger">
      @if($errors->has('name')) 
        {{ $errors->first('name') }}  
      @endif  
  </p>
</div>
<div class="form-group">
  <label>Phone Number</label>
  <input class="form-control  col-sm-5" name='phone_number' aria-describedby="emailHelp" placeholder="Enter phone number" value="{{ old('phone_number') ? old('phone_number') : $student->phone_number }}">
  <p class="text-danger">
      @if($errors->has('phone_number')) 
        {{ $errors->first('phone_number') }}  
      @endif  
  </p>
</div>
<div class="form-group">
  <label>Note</label>
  <input class="form-control  col-sm-5" disabled="" aria-describedby="emailHelp" placeholder="Enter note" value="{{ old('note') ? old('note') : $student->note }}">
  <p class="text-danger">
      @if($errors->has('note')) 
        {{ $errors->first('note') }}  
      @endif  
  </p>
</div>
<div class="form-group">
  <label>Reason</label>
  <textarea class="form-control  col-sm-5" disabled="" aria-describedby="emailHelp" placeholder="Enter reason" value="{{ old('reason') ? old('reason') : $student->reason }}"> 

  </textarea>
  <p class="text-danger">
      @if($errors->has('reason')) 
        {{ $errors->first('reason') }}  
      @endif  
  </p>
</div>
<div class="form-group">
  <label>Year</label>
  <input class="form-control  col-sm-5" disabled="" aria-describedby="emailHelp" placeholder="Enter year" value="{{ old('year') ? old('year') : $student->year }}">
  <p class="text-danger">
      @if($errors->has('year')) 
        {{ $errors->first('year') }}  
      @endif  
  </p>
</div>
<div class="form-group">
  <label>Semester</label>
  <input class="form-control  col-sm-5" disabled="" aria-describedby="emailHelp" placeholder="Enter semester" value="{{ old('semester') ? old('semester') : $student->semester }}">
  <p class="text-danger">
      @if($errors->has('semester')) 
        {{ $errors->first('semester') }}  
      @endif  
  </p>
</div>
<div class="form-group">
  <label>Interview Date</label>
  <input class="form-control  col-sm-5" disabled="" aria-describedby="emailHelp" placeholder="Enter interview date" value="{{ old('interview_date') ? old('interview_date') : $student->interview_date }}">
  <p class="text-danger">
      @if($errors->has('interview_date')) 
        {{ $errors->first('interview_date') }}  
      @endif  
  </p>
</div>
<div class="form-group">
  <label>Interviewer</label>
  <input class="form-control  col-sm-5" disabled="" aria-describedby="emailHelp" placeholder="No interviewer" value="{{ $student->interviewer ? $student->interviewer->name : '' }}">
  <p class="text-danger">
      @if($errors->has('teacher_id')) 
        {{ $errors->first('teacher_id') }}  
      @endif  
  </p>
</div>
<div class="form-group">
  <label>Level</label>
  <input class="form-control  col-sm-5" disabled="" aria-describedby="emailHelp" placeholder="No interviewer" value="{{ old('level') ? old('level') : $student->level }}">
  <p class="text-danger">
      @if($errors->has('level')) 
        {{ $errors->first('level') }}  
      @endif  
  </p>
</div>
<div class="form-group">
  <label>Password</label>
  <input class="form-control  col-sm-5" name='password' type="password" aria-describedby="emailHelp" placeholder="(Password not change)" value="">
  <p class="text-danger">
  </p>
</div>
@csrf
@method('PUT')