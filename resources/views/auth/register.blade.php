@extends('home-master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    @if($register_status)
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="name">Student Number</label>
                                    <input id="name" type="text" class="form-control @error('student_number') is-invalid @enderror" name="student_number" value="{{ old('student_number') }}" required autocomplete="name" autofocus>
                                    @if($errors->has('student_number'))
                                        <div class="text-danger">{{ $errors->first('student_number') }}</div>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @if($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="name">Department</label>
                                <select name="department_id" class="form-control">
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                        <option {{ $department->deparment_id == old('department_id') ? 'selected' : '' }} value="{{ $department->department_id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('department_id'))
                                    <div class="text-danger">{{ $errors->first('department_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">Reason To Join</label>
                                <textarea id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="reason" required="">{{ old('reason') }}</textarea> 
                                @if($errors->has('name'))
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">Phone Number</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="name" autofocus>
                                @if($errors->has('phone_number'))
                                    <div class="text-danger">{{ $errors->first('phone_number') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @if($errors->has('email'))
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Password</label>
                                    <input id="passsword" type="password" class="form-control @error('passsword') is-invalid @enderror" name="password" value="{{ old('passsword') }}" required autocomplete="passsword" autofocus>
                                    @if($errors->has('password'))
                                        <div class="text-danger">{{ $errors->first('password') }}</div>
                                    @endif
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div>We are not open registration yet.<br> For more information, meet us at Politeknik Negeri Samarinda library</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
