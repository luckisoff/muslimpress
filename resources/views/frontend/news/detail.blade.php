@extends('frontend.main')
@section('title', $news->title)
@section('keywords', $news->tags)
@section('description', $news->summary)
@section('content')
    <div class="card news-detail">
        <div class="card-body">
            <div class="card-title">
                <h3>{{$news->title}}</h3>
            </div>

            <img class="card-img-top" src="{{$news->image}}" alt="$news->title">
            <blockquote class="blockquote text-justify mt-2">{{$news->summary}}</blockquote>
            <!-- <vue-goodshare></vue-goodshare> -->
            <p class="card-text text-justify">{!!$news->content!!}</p>
            <!-- <vue-goodshare></vue-goodshare> -->

            <div class="likes mt-2 mb-2">
                <like-component :article="{{json_encode($news)}}"></like-component>
                <comments :article="{{json_encode($news)}}"></comments>
            </div>
        </div>
    </div>
@endsection