<div class="card mb-5">
    <div class="card-header">{{__("Most Viewed")}}</div>
    <ul class="list-group list-group-flush">
        @forelse(getMostCount('views_count') as $news)
            <li class="list-group-item">
                <a href="{{rawurldecode(route('frontend.news.detail', [app()->getLocale(),$news, $news->slug]))}}">{{$news->title}}</a>
            </li>
        @empty
            <li class="list-group-item">No data avaialable</li>
        @endforelse
    </ul>
</div>
<!-- <div class="card mb-5">
    <img class="card-img-top" src="image.jpg" alt="Card image cap">
</div> -->

<div class="card mb-5">
    <div class="card-header">{{__("Categories")}}</div>
    <category-component></category-component>
</div>