@extends('home-master')

@section('content')
    <div class="d-flex p-3 justify-content-center">
        <div class="card col-sm-6">
            <div class="card-body">
                <div>{{ date('M d Y', strtotime($news->updated_at)) }}</div>
                <div class="h4 my-2 text-primary">{{ $news->title }}</div>
                <div class="text-dark">{{ $news->body }}</div>
            </div>
        </div>
    </div>
@endsection