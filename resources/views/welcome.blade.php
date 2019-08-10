@extends('home-master')

@section('title')
  ICEE | Welcome
@endsection


@section('content')
        <div class="d-flex align-items-center justify-content-center my-3 position-relative">
            <img class="col-sm-8" src="/img/welcome.jpg">
            <div class="col-sm-8 p-3 text-center position-absolute text-light" style="background: rgba(52, 144, 220, 0.8)">
                <div class="h5">LET ENGLISH THROW OPEN YOUR WORLD!</div>
                <div class="h3">WELCOME TO ICEE</div>
                <div class="d-md-block d-none">
Whether you are an instructor or a learner joining the ICEE Team, communication for growth is at the forefront of what we’re working together towards. Our patented programs and activities are designed to be a catalyst that helps learners reach their goals and fulfill their potential. Learn more about the positive impact we have and join us in bringing about positive change.
                </div>
            </div>
        </div>
        <div class="d-flex p-3 justify-content-center position-relative">
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
                    <a href="/public/news" class="btn btn-primary">See More News</a>
                </div>
                </div>
            </div>
        </div>
@endsection