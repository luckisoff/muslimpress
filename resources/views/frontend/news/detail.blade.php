@extends('frontend.main')
@section('title', $news->title)
@section('keywords', $news->tags)
@section('description', $news->summary)
@section('content')
{!!$news->content!!}
@endsection