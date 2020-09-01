@include('frontend.shared.header')
<div class="main-body">
    <div class="wrap">
        <div class="col-md-8 content-left">
            @yield('content')
        </div>
        <div class="col-md-4 side-bar">
            @include('frontend.shared.right-sidebar')
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@include('frontend.shared.footer')