<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link href="{{asset('assets/css/fontawesome-all.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets/css/costume-style.css')}}" rel='stylesheet' type='text/css'>
    <title>@yield('title', 'Login')</title>
</head>
<body>
    <div id="languages">
		<ul>
			@foreach(config('app.available_locales') as $locale)
				<li class="{{$locale['code']==app()->getLocale()?'language-active':''}}"><a href="{{route('change-locale', $locale['code'])}}"> <img src="{{asset('assets/img/flags/'.$locale['flag'])}}" alt=""> {{$locale['name']}}</a></li>
			@endforeach
		</ul>
	</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="logo text-center">
                    <img src="{{settings('logo')}}" alt="">
                </div>
                <div class="links">
                    <a class="btn btn-default" href="{{route('login', app()->getLocale())}}">{{__('Login')}}</a>
                    <a class="btn btn-default" href="{{route('register', app()->getLocale())}}">{{__('Register')}}</a>
                    <a class="btn btn-default" href="/{{app()->getLocale()}}">{{__('Home')}}</a>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $('#country').select2({
            placeholder:"Select your country"
        });

        $('#bloodGroup').select2();
    </script>
</body>
</html>