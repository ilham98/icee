<div class="form-group">
  <label>Title</label>
  <input class="form-control  col-sm-5" name='title' aria-describedby="emailHelp" placeholder="Enter title" value="{{ old('title') ? old('title') : $news->title }}">
  <p class="text-danger">
      @if($errors->has('title')) 
        {{ $errors->first('title') }}  
      @endif  
  </p>
</div>
 <div class="form-group">
  <label>Body</label>
  <textarea name='body' class="form-control" placeholder="Enter Body">{{ old('body') ? old('body') : $news->body }}</textarea>
  <p class="text-danger">
      @if($errors->has('body')) 
        {{ $errors->first('body') }}  
      @endif  
  </p>
</div>
@csrf
@method('PUT')