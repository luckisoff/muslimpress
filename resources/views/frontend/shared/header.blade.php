<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title', settings('site_name'))</title>
<meta name="keywords" content="@yield('keywords', settings('keywords'))" />
<meta name="description" content="@yield('description', settings('description'))" />

<link href="{{asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('assets/css/fontawesome-all.min.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('assets/css/jquery.cookieBar.min.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- header-section-starts-here -->
	<div class="header">
		<div class="header-top">
			<div class="wrap">
				<div class="top-menu">
					<ul>
						<li><a href="#">{{__('Privacy Policy')}}</a></li>
						<li><a href="#">{{__('Terms of User')}}</a></li>
					</ul>
				</div>
				<div class="num">
                    <div class="top-menu">
                        <ul>
                            <li>
                                <a href="{{route('login', app()->getLocale())}}"><span class="fa fa-sign-in"></span> {{__('Login')}}</a>
                            </li>
                            <li>
                                <a href="{{route('login', app()->getLocale())}}"><span class="fa fa-user"></span> {{__('Register')}}</a>
                            </li>
                        </ul>
                    </div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="header-bottom">
			<div class="logo">
				<div class="row">
					<div class="col-md-4">
						<a href="index.html">Muslimpress</a>
						<span>{{__('Voice of the voiceless')}}</span>
					</div>
					<div class="col-md-8">
						
					</div>
				</div>
			</div>
			<div class="navigation">
				<nav class="navbar navbar-default" role="navigation">
		   <div class="wrap">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
			</div>
			<!--/.navbar-header-->
		
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					 <li class="active"><a href="index.html">Home</a></li>
						<li><a href="sports.html">Sports</a></li>
				    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Entertainment<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="entertainment.html">Movies</a></li>
							<li class="divider"></li>
							<li><a href="entertainment.html">Another action</a></li>
							<li class="divider"></li>
							<li><a href="entertainment.html">Articles</a></li>
							<li class="divider"></li>
							<li><a href="entertainment.html">celebrity</a></li>
							<li class="divider"></li>
							<li><a href="entertainment.html">One more separated link</a></li>
						</ul>
					  </li>
					<li><a href="shortcodes.html">Health</a></li>
					<li><a href="fashion.html">Fashion</a></li>
					  <li class="dropdown">
						<a href="business.html" class="dropdown-toggle" data-toggle="dropdown">Business<b class="caret"></b></a>
						<ul class="dropdown-menu multi-column columns-2">
							<div class="row">
								<div class="col-sm-6">
									<ul class="multi-column-dropdown">
										<li><a href="business.html">Action</a></li>
										<li class="divider"></li>
										<li><a href="business.html">bulls</a></li>
									    <li class="divider"></li>
										<li><a href="business.html">markets</a></li>
										<li class="divider"></li>
										<li><a href="business.html">Reviews</a></li>
										<li class="divider"></li>
										<li><a href="shortcodes.html">Short codes</a></li>
									</ul>
								</div>
								<div class="col-sm-6">
									<ul class="multi-column-dropdown">
									   <li><a href="business.html">features</a></li>	
										<li class="divider"></li>
										<li><a href="entertainment.html">Movies</a></li>
									    <li class="divider"></li>
										<li><a href="sports.html">sports</a></li>
										<li class="divider"></li>
										<li><a href="business.html">Reviews</a></li>
										<li class="divider"></li>
										<li><a href="business.html">Stock</a></li>
									</ul>
								</div>
							</div>
						</ul>
					</li>
					<li><a href="technology.html">Technology</a></li>
					<div class="clearfix"></div>
				</ul>
				<div class="search">
					<!-- start search-->
				    <div class="search-box">
					    <div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>
						</div>
				    </div>
					
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!--/.navbar-collapse-->
	 <!--/.navbar-->
			</div>
		</nav>
		</div>
	</div>
	<!-- header-section-ends-here -->
	<div class="wrap">
		<div class="move-text">
			<div class="breaking_news">
				<h2>Breaking News</h2>
			</div>
			<div class="marquee">
				<div class="marquee1"><a class="breaking" href="single.html">>>The standard chunk of Lorem Ipsum used since the 1500s is reproduced..</a></div>
				<div class="marquee2"><a class="breaking" href="single.html">>>At vero eos et accusamus et iusto qui blanditiis praesentium voluptatum deleniti atque..</a></div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>