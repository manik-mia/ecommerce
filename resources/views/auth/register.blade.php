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
                <!-- create a new account -->
                <div class="col-sm-3 col-md-3"></div>
                <div class="col-md-6 col-sm-6 create-new-account">
                    <h4 class="checkout-subtitle">Create a new account</h4>
                    <p class="text title-tag-line">Create your new account.</p>
                    <form method="POST" action="{{ route('register') }}" class="register-form outer-top-xs" role="form">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="name">{{ __('Full Name') }}<span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="email">{{ __('E-Mail Address') }} <span>*</span></label>
                            <input type="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="phone">{{ __('Phone Number') }}</label>
                            <input type="text" class="form-control unicase-form-control text-input @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus />
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password">Password <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" required autocomplete="new-password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password-confirm">{{ __('Confirm Password') }} <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" id="password-confirm" name="password_confirmation" required autocomplete="new-password" />
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                    </form>
                    
                </div>	
            </div>	
        </div>
    </div>
</div>
@endsection
