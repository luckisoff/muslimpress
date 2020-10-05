<div class="card mb-5">
    <div class="card-header">Most Commented</div>
    <ul class="list-group list-group-flush">
        @forelse(getMostCount('comments_count') as $news)
            <li class="list-group-item">{{$news->title}}</li>
        @empty
            <li class="list-group-item">No data avaialable</li>
        @endforelse
    </ul>
</div>

<div class="card mb-5">
    <div class="card-header">Most Liked</div>
    <ul class="list-group list-group-flush">
        @forelse(getMostCount('likes_count') as $news)
            <li class="list-group-item">{{$news->title}}</li>
        @empty
            <li class="list-group-item">No data avaialable</li>
        @endforelse
    </ul>
</div>