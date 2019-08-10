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
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="student_number" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="name">Department</label>
                                <select name="department_id" class="form-control">
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->department_id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Reason To Join</label>
                                <textarea id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="reason" required="">{{ old('reason') }}</textarea> 
                            </div>
                            <div class="form-group">
                                <label for="name">Phone Number</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone_number" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="email">Password</label>
                                    <input id="passsword" type="password" class="form-control @error('passsword') is-invalid @enderror" name="password" value="{{ old('passsword') }}" required autocomplete="passsword" autofocus>
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
