@extends('admin.app')
@section('title', 'News Listing')
@section('content')
    <div class="col-md-12">
        <div class="listing-table">
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Summary</th>
                        <th>Cover</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($news as $index=>$news_item)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$news_item->title}}</td>
                            <td>{{$news_item->summary}}</td>
                            <td>
                                <img src="{{$news_item->image}}" alt="" class="table-img img-responsive">
                            </td>

                            <td width="150">
                                <span class="badge {{($news_item->status=='published')?'badge-success':($news_item->status=='under-review'?'badge-warning':'badge-danger')}}">
                                    {{ucfirst($news_item->status)}}
                                </span>
                            </td>
                            <td width="200">
                                @if(isOwner($news_item->user_id) || isAdmin())
                                    <a href="{{route('admin.news.view',[$news_item->id, $news_item->slug])}}" class="btn btn-primary">
                                        <span class="fa fa-eye"> View</span>
                                    </a>
                                    <a href="{{route('admin.news.create', [$news_item->type, $news_item])}}" class="btn btn-warning">
                                        <span class="fa fa-edit"> Edit</span>
                                    </a>
                                    <a href="{{route('admin.news.delete', $news_item)}}" class="btn btn-danger"><span class="fa fa-trash"> Delete</span></a>
                                @else
                                    <span>Restricted</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7">No data available!</td></tr>
                    @endforelse
                </tbody>
                <tfoot>
                   @include('admin.shared.pagination', $collections = $news)
                </tfoot>
            </table>
        </div>
    </div>
@endsection