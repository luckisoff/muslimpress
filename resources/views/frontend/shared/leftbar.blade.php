<div class="card mb-5">
    <div class="card-header">Most Viewed</div>
    <ul class="list-group list-group-flush">
        @forelse(getMostCount('views_count') as $news)
            <li class="list-group-item">{{$news->title}}</li>
        @empty
            <li class="list-group-item">No data avaialable</li>
        @endforelse
    </ul>
</div>
{{base_path()}}
<div class="card mb-5">
    <img class="card-img-top" src="image.jpg" alt="Card image cap">
</div>

<div class="card mb-5">
    <div class="card-header">Categories</div>
    <category-component></category-component>
</div>