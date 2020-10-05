@include('frontend.shared.header-new')
<section id="content" class="container-fluid">
    <div class="row">
        
        <div class="col-md-6 order-md-2 order-lg-2 mb-5" id="middlebar">
               @yield('content')
            <!-- <div class="row">
            </div> -->
        </div>

        <div class="col-md-3 order-md-1 order-lg-1" id="leftbar">
            @include('frontend.shared.leftbar')
        </div>

        <div class="col-md-3 order-sm-12" id="rightbar">
            @include('frontend.shared.rightbar')
        </div>
    </div>
</section>
@include('frontend.shared.footer-new')