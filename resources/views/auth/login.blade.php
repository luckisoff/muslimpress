@extends('frontend.main')
@section('title', __('Login'))
@section('content')
    <div class="col-md-12 order-sm-1 order-md-2">
        <div class="card">
            <div class="card-header">{{__('Login')}}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login', app()->getLocale()) }}">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{__('Enter your email address')}}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __($message) }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{__('Enter your password')}}">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ __($message) }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-sm">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request', app()->getLocale()) }}">
                                    <small>{{ __('Forgot Your Password?') }}</small>
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
