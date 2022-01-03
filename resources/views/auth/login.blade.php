@extends('layouts.frontend-layout')

@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->	
                <div class="col-sm-3 co-md-3"></div>		
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Sign in</h4>
                    <p class="">Hello, Welcome to your account.</p>
                    <div class="social-sign-in outer-top-xs">
                        <a href="{{route('user.login.facebook')}}" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                        <a href="{{route('user.login.google')}}" class="twitter-sign-in"><i class="fa fa-google"></i> Sign In with Google</a>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="register-form outer-top-xs" role="form">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="email">{{ __('E-Mail Address ') }}<span>*</span></label>
                            <input type="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password">{{ __('Password') }}<span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="radio outer-xs">
                            <label>
                                <input type="radio" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />Remember me!
                            </label>
                            <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                    </form>					
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sign-in -->
@endsection