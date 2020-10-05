@extends('frontend.main')
@section('title', __('Register'))
@section('content')
<div class="col-md-12 order-sm-1 order-md-2">
    <div class="card">
        <div class="card-header">{{__('Register')}}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('register', app()->getLocale()) }}">
                @csrf

                <div class="required-info">
                    {{__('Field with * are required')}}
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-form-label">{{ __('Name') }} *</label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{__('Enter your name here')}}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="col-form-label">{{ __('E-Mail Address') }} *</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{__('Enter your email address')}}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="countryField" class="col-form-label">{{ __('Select Country') }}</label>
                            <select name="country" id="country" class="form-control">
                                @foreach($countries as $country)
                                    <option value="{{$country->country}}">{{$country->country}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobileNumber">{{__('Mobile Number')}}</label>
                            <input type="number" class="form-control" name="mobile_number" id="mobileNumber" placeholder="{{__('Enter mobile number')}}">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group blood-group">
                            <label for="bloodGroup">{{__('Blood Group')}}</label>
                            <select name="blood_group" id="bloodGroup" class="form-control">
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Password') }} *</label>
            
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{__('Create new password')}}">
            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
            
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }} *</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{__('Confirm Password')}}">
                        </div>
                    </div>
                </div>



                <div class="form-group mb-0">
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            {{ __('Register') }}
                        </button>
                        <a href="{{route('login', app()->getLocale())}}"><small>Already have account?</small></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('assets/countrypicker/css/flags.css')}}">
@endsection

@section('scripts')
<script src="{{asset('assets/countrypicker/js/jquery.flagstrap.min.js')}}"></script>
<script>
    $('#basic').flagStrap();
</script>
@endsection
