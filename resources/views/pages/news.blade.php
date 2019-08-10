@extends('home-master')

@section('title')
  ICEE | News
@endsection

@section('content')
    <div class="d-flex p-3 justify-content-center">
        <div class="card col-sm-6">
            <div class="card-body">
            @foreach($news as $n)
                <div class="d-flex justify-content-between">
                    <a href="/public/news/{{ $n->news_id }}" class="text-primary h5">{{ $n->title }}</a>
                    <div>{{ date('M d Y', strtotime($n->updated_at)) }}</div>
                </div>
                <div>{{ substr($n->body, 0, 100) }}{{ strlen($n->body) > 100 ? '...' : '' }}</div>
                <hr>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $news->links() }}
            </div>
            </div>
        </div>
    </div>
@endsection