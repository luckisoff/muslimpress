<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title', settings('site_name', 'Muslimpress'))</title>
    <meta name="keywords" content="@yield('keywords', settings('keywords'))" />
    <meta name="description" content="@yield('description', settings('description'))" />
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="icon" href="{{settings('icon')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">   
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Expletus+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/custome.css')}}"> 

</head>
<body>
   <div id="app">
    <!-- header navbar -->
    <section class="container-fluid border-bottom shadow-sm mb-5 fixed-top" id="header">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-white">
                    <a class="navbar-brand" href="/{{app()->getLocale()}}">
                        <span class="prefix">M</span><span class="suffix">uslimpress</span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
            
                    <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
                        <ul class="nav navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="/{{app()->getLocale()}}"><span class="fa fa-home color-orange"></span> {{__('Home')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="fa fa-star color-orange"></span> {{__('Featured')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('frontend.home', [app()->getLocale(),'article'])}}"><span class="fa fa-newspaper-o color-orange"></span> {{__('Articles')}}</a>
                            </li>
                            @if(user())
                            
                            <li>
                                <div class="dropdown">
                                    <span class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fa fa-user color-orange"></span> {{user()->name}}
                                    </span>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="#" class="dropdown-item"><span class="fa fa-cog"></span> Setting</a>
                                        @if(isAdmin())
                                        <a href="{{route('admin.index')}}" class="dropdown-item"><span class="fa fa-cogs"></span> Dashboard</a>
                                        @endif
                                        <a href="{{route('logout', app()->getLocale())}}" onclick="document.getElementById('logout-main').submit();event.preventDefault();" class="dropdown-item"><span class="fa fa-power-off"></span> Sign out</a>
                                    </div>

                                    <form action="{{route('logout', app()->getLocale())}}" method="post" id="logout-main">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{route('login', app()->getLocale())}}" class="nav-link"><span class="fa fa-sign-in color-orange"></span> {{__('Login')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('register', app()->getLocale())}}" class="nav-link"><span class="fa fa-user color-orange"></span> {{__('Register')}}</a>
                                </li>
                            @endif

                            <li>
                                <div class="dropdown">
                                    <span class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fa fa-globe color-orange"></span> {{getLocaleDetail()['name']}}
                                    </span>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach(config('app.available_locales') as $locale)
                                    <a class="dropdown-item" href="{{route('change-locale', $locale['code'])}}">{{$locale['name']}}</a>
                                    @endforeach
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                  </nav>
            </div>
        </div>
    </section>
    <!-- /haeader navbar -->
   
