@extends('frontend.main')
@section('title', $cat_name?ucfirst($cat_name):ucfirst($type))
@section('keywords')
@section('description')
@section('content')
    <news-component></news-component>
    <!-- <div class="col-md-6 mb-5">
        <div class="card">
            <img class="card-img-top" src="image.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-3"><span class="fa fa-comment-o color-orange"></span> 6K</div>
                    <div class="col-sm-3"><span class="fa fa-heart-o color-orange"></span> 6K</div>
                    <div class="col-sm-6"><span class="fa fa-bookmark-o color-orange"></span> Bookmark</div>
                </div>
            </div>
        </div>
    </div> -->
@endsection

@push('scripts')

@endpush