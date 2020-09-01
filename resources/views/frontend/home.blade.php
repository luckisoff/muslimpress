@extends('frontend.main')
@section('title', 'This is home page')
@section('keywords')
@section('description')
@section('content')
<div class="slider">
    <div class="callbacks_wrap">
        <ul class="rslides" id="slider">
            @foreach($news as $news_item)
            <li>
                <img src="{{$news_item->image}}" alt="{{$news_item->title}}">
                <div class="caption">
                    <a href="{{route('frontend.news.detail', [app()->getLocale(),$news_item->id, $news_item->slug])}}">{{$news_item->title}}</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="articles">
    <header>
        <h3 class="title-head">All around the world</h3>
    </header>
    @foreach($news as $news_item)
    <div class="article">
        <div class="article-left">
            <a href="{{route('frontend.news.detail', [app()->getLocale(), $news_item->id, $news_item->slug])}}">
                <img src="{{$news_item->image}}" alt="{{$news_item->title}}"/>
            </a>
        </div>
        <div class="article-right">
            <div class="article-title">
                <p>{{$news_item->created_at}} 
                    <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>{{$news_item->comments->count()}}</a>
                    <a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>{{$news_item->views->count()}} </a>
                    <a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>{{$news_item->likes->count()}}</a></p>
                <a class="title" href="single.html"> {{$news_item->title}}</a>
            </div>
            <div class="article-text">
                <p>{{$news_item->summary}}</p>
                <a href="single.html"><img src="images/more.png" alt="" /></a>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    @endforeach
   

    <div class="life-style">
        <header>
            <h3 class="title-head">Life Style</h3>
        </header>
        <div class="life-style-grids">
            <div class="life-style-left-grid">
                <a href="single.html"><img src="images/l1.jpg" alt="" /></a>
                <a class="title" href="single.html">It is a long established fact that a reader will be distracted.</a>
            </div>
            <div class="life-style-right-grid">
                <a href="single.html"><img src="images/l2.jpg" alt="" /></a>
                <a class="title" href="single.html">There are many variations of passages of Lorem Ipsum available.</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="life-style-grids">
            <div class="life-style-left-grid">
                <a href="single.html"><img src="images/l3.jpg" alt="" /></a>
                <a class="title" href="single.html">Contrary to popular belief, Lorem Ipsum is not simply random text.</a>
            </div>
            <div class="life-style-right-grid">
                <a href="single.html"><img src="images/l4.jpg" alt="" /></a>
                <a class="title" href="single.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="sports-top">
        <div class="s-grid-left">
            <div class="cricket">
                <header>
                    <h3 class="title-head">Business</h3>
                </header>
                <div class="c-sports-main">
                        <div class="c-image">
                            <a href="single.html"><img src="images/bus1.jpg" alt="" /></a>
                        </div>
                        <div class="c-text">
                            <h6>Lorem Ipsum</h6>
                            <a class="power" href="single.html">It is a long established fact that a reader</a>
                            <p class="date">On Feb 25, 2015</p>
                            <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="s-grid-small">
                        <div class="sc-image">
                            <a href="single.html"><img src="images/bus2.jpg" alt="" /></a>
                        </div>
                    <div class="sc-text">
                        <h6>Lorem Ipsum</h6>
                        <a class="power" href="single.html">It is a long established fact that a reader</a>
                        <p class="date">On Mar 21, 2015</p>
                        <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                            <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    <div class="s-grid-small">
                        <div class="sc-image">
                            <a href="single.html"><img src="images/bus3.jpg" alt="" /></a>
                        </div>
                    <div class="sc-text">
                        <h6>Lorem Ipsum</h6>
                        <a class="power" href="single.html">It is a long established fact that a reader</a>
                        <p class="date">On Jan 25, 2015</p>
                        <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                            <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    <div class="s-grid-small">
                        <div class="sc-image">
                            <a href="single.html"><img src="images/bus4.jpg" alt="" /></a>
                        </div>
                    <div class="sc-text">
                        <h6>Lorem Ipsum</h6>
                        <a class="power" href="single.html">It is a long established fact that a reader</a>
                        <p class="date">On Jul 19, 2015</p>
                        <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                            <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                </div>
        </div>
        <div class="s-grid-right">
            <div class="cricket">
                    <header>
                        <h3 class="title-popular">Technology</h3>
                    </header>
                    <div class="c-sports-main">
                            <div class="c-image">
                                <a href="single.html"><img src="images/tec1.jpg" alt="" /></a>
                            </div>
                            <div class="c-text">
                                <h6>Lorem Ipsum</h6>
                                <a class="power" href="single.html">It is a long established fact that a reader</a>
                                <p class="date">On Apr 22, 2015</p>
                                <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="s-grid-small">
                            <div class="sc-image">
                                <a href="single.html"><img src="images/tec2.jpg" alt="" /></a>
                            </div>
                        <div class="sc-text">
                            <h6>Lorem Ipsum</h6>
                            <a class="power" href="single.html">It is a long established fact that a reader</a>
                            <p class="date">On Jan 19, 2015</p>
                            <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                                <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                        </div>
                        <div class="s-grid-small">
                            <div class="sc-image">
                                <a href="single.html"><img src="images/tec3.jpg" alt="" /></a>
                            </div>
                        <div class="sc-text">
                            <h6>Lorem Ipsum</h6>
                            <a class="power" href="single.html">It is a long established fact that a reader</a>
                            <p class="date">On Jun 25, 2015</p>
                            <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                                <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                        </div>
                        <div class="s-grid-small">
                            <div class="sc-image">
                                <a href="single.html"><img src="images/tec4.jpg" alt="" /></a>
                            </div>
                        <div class="sc-text">
                            <h6>Lorem Ipsum</h6>
                            <a class="power" href="single.html">It is a long established fact that a reader</a>
                            <p class="date">On Jul 19, 2015</p>
                            <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                                <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                        </div>
                    </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
    @endsection