@extends('admin.app')
@section('title', $news->title)
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="news-detail">
            <div class="border-bottom user">
                @if($news->user->image)
                <img src="{{$news->user->image}}" alt="">
                @endif
                <span class="name fa fa-user"> {{strtoupper($news->user->name)}}</span>
                <span class="fa fa-book"> {{ucfirst($news->user->role)}}</span>
            </div>
            <div class="border-bottom title">{{$news->title}}</div>
            <div class="cover">
                @if($news->image)
                <img class="news-img img-responsive" src="{{$news->image}}" alt="">
                @endif
            </div>
            <div class="content">
                <p>
                    {!!$news->content!!}
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="border-bottom card-title">
                <span class="fa fa-dot-circle {{$news->status=='published'?'success':($news->status=='under-review'?'warning':'danger')}}"></span> 
                <span>{{ucfirst($news->status)}}</span>
            </div>
            @if($news->status != 'published')
            <div class="card-body">
                <div class="card-text">
                    @if($news->status=='rejected')
                        Sorry! after reviewing your {{$news->type}}, it has been rejected. It has violated the terms and conditions of our website. You can edit and resubmit for review.
                    @elseif($news->status=='under-review')
                        Thank you! your {{$news->type}} has been submited for review. Administrator will review your {{$news->type}} and let you know.
                    @endif
                </div>
            </div>
            @endif
        </div>

        <div class="card">
            <div class="card-title border-bottom">Analytics</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td><span class="fa fa-eye"></span> Total Views</td>
                        <td>{{$news->views->count()}}</td>
                    </tr>
                    <tr>
                        <td><span class="fa fa-thumbs-up"></span> Total Likes</td>
                        <td>{{$news->likes->count()}}</td>
                    </tr>
                    <tr>
                        <td><span class="fa fa-comments"></span> Total Comments</td>
                        <td>{{$news->comments->count()}}</td>
                    </tr>
                </table>
            </div>
        </div>


        <div class="card">
            <div class="border-bottom card-title">Summary</div>
            <div class="card-body">
                <div class="card-text">{{$news->summary}}</div>
            </div>
        </div>
        @if($news->source)
        <div class="card">
            <div class="border-bottom card-title">Adaptation</div>
            <div class="card-body">
                <div class="card-text">{{$news->source}}</div>
                @if($news->source_url)
                <div class="card-text">{{$news->source_url}}</div>
                @endif
            </div>
        </div>
        @endif

        <div class="card">
            <div class="border-bottom card-title">Tags</div>
            <div class="card-body">
                <div class="card-text">
                    {{$news->tags}}
                </div>
            </div>
        </div>

        @if($news->references)
            <div class="card">
                <div class="border-bottom card-title">References</div>
                <div class="card-body">
                    <div class="card-text">
                    {!!$news->references!!}
                    </div>
                </div>
            </div>
        @endif

        @if(isAdmin() || isOwner($news->user_id))
        <div class="card">
            <div class="border-bottom card-title">Actions</div>
            <div class="card-body">
                <div class="card-text">
                    <a href="{{route('admin.news.create',[$news->type, $news])}}" class="btn btn-warning"><span class="fa fa-edit"> Edit</span></a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection