@extends('layouts.frontend-layout')
@section('title',"Stripe | Online Payment Gateway")
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class='active'>SSLCommerz (Hosted Checkout)</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill">{{$cartQty}}</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach ($cartProducts as $cartProduct)
                            
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0" style="font-size: 18px;">{{$cartProduct->name}}</h6>
                                <small class="text-muted">{{$cartProduct->options->color}}</small>
                            </div>
                            <span class="text-muted">Price: {{$cartProduct->price}}TK</span>
                        </li>
                        
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                            <span style="font-size: 18px;">Total (BDT)  </span>
                            @if (session()->has('coupon'))
                                <strong style="font-size: 20px;">{{$totalAmount}}TK</strong> <del style="font-size: 18px;">{{$cartTotal}}TK</del>
                            @else
                            <strong style="font-size: 20px;">{{$cartTotal}}TK</strong>
                            @endif
                        </li>
                    </ul>

                    <form action="{{ route('payment.sslcommerz.hosted') }}" style="margin-block: 50px;" method="POST" class="needs-validation">
                        @csrf
                        <!-- Hidden Fields Start-->

                        <input type="hidden" name="name" id="name" value="{{$shippingInfo['name']}}">

                        <input type="hidden" name="email" id="email" value="{{$shippingInfo['email']}}">

                        <input type="hidden" name="phone" id="phone" value="{{$shippingInfo['phone']}}">

                        <input type="hidden" name="division_id" id="division-id" value="{{$shippingInfo['division_id']}}">

                        <input type="hidden" name="district_id" id="district-id" value="{{$shippingInfo['district_id']}}">

                        <input type="hidden" name="state_id" id="state-id" value="{{$shippingInfo['state_id']}}">

                        <input type="hidden" name="post_code" id="post-code" value="{{$shippingInfo['post_code']}}">

                        <input type="hidden" name="notes" id="notes" value="{{$shippingInfo['notes']}}">

                        <input type="hidden" name="payment_method" id="payment-method" value="{{$shippingInfo['payment_method']}}">

                        <!-- Hidden Fields End-->
                        @if (session()->has('coupon'))
                            <input type="hidden" id="name" value="{{$totalAmount}}" name="amount" id="total-amount" required/>
                        @else
                            <input type="hidden" id="name" value="{{$cartTotal}}" name="amount" id="total-amount" required/>
                        @endif
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                    </form>
                </div>
            </div>
		</div><!-- /.checkout-box -->
	
	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
@section('scripts')
    <script type="text/javascript">
        (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);

    </script>
@endsection