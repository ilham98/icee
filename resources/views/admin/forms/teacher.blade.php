<div class="form-group">
  <label>Name</label>
  <input class="form-control" name='name' aria-describedby="emailHelp" placeholder="Enter name" value="{{ old('name') ? old('name') : (isset($teacher) ? $teacher->name : '') }}">
  <p class="text-danger">
      @if($errors->has('name')) 
        {{ $errors->first('name') }}  
      @endif  
  </p>
</div>
<div class="form-group">
  <label>Email</label>
  <input class="form-control" name='email' aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') ? old('email') : (isset($teacher) ? $teacher->user->email : '') }}">
  <p class="text-danger">
      @if($errors->has('email')) 
        {{ $errors->first('email') }}  
      @endif  
  </p>
</div>
<div class="form-group">
  <label>Phone</label>
  <input class="form-control" name='phone_number' aria-describedby="emailHelp" placeholder="Enter phone number" value="{{ old('phone_number') ? old('phone_number') : (isset($teacher) ? $teacher->phone_number : '') }}">
  <p class="text-danger">
      @if($errors->has('phone_number')) 
        {{ $errors->first('phone_number') }}  
      @endif  
  </p>
</div>