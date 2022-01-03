@extends('layouts.frontend-layout')
@section('title',"Stripe | Online Payment Gateway")
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class='active'>Stripe</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box">
            <div class="row">
                
                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
					<div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">You Have to Pay Now</h4>
                                </div>
                                <div class="">
                                    @if (session()->has('coupon'))
										
										<div class="cart-grand-total" style="font-size: 18px;">
											Total<span class="inner-left-md" style="color:rgb(6, 168, 6);font-size: 20px;">$ {{round($totalAmount/85)}}</span> <del>${{round($cartTotal/85)}}</del>
										</div>
										@else
										<div class="cart-grand-total" style="font-size: 20px">
											Total:<span class="inner-left-md" style="color:rgb(6, 168, 6);">${{round($cartTotal/85)}}</span>
										</div>
									@endif
                                </div>
                            </div>
                        </div>
                    </div><!-- checkout-progress-sidebar -->
                </div>
                
                <div class="col-md-8">
                    <!-- checkout-progress-sidebar -->
					<div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Cradit or Debit Card Info</h4>
                                </div>
                                <div class="stripe">
                                    <div class="panel panel-default credit-card-box">
                                        <div class="panel-heading display-table" >
                                           <div class="row display-tr" >
                                              <h3 class="panel-title display-td" >Payment Details</h3>
                                              <div class="display-td" >                            
                                                 <img class="">
                                              </div>
                                           </div>
                                        </div>
                                        <div class="panel-body">
                                           @if (Session::has('success'))
                                           <div class="alert alert-success text-center">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                              <p>{{ Session::get('success') }}</p>
                                           </div>
                                           @endif
                                           <form
                                              role="form"
                                              action="{{route('payment.stripe')}}"
                                              method="post"
                                              class="require-validation"
                                              data-cc-on-file="false"
                                              data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                              id="payment-form">
                                              @csrf
                                              <!-- Hidden Fields Start-->

                                              <input type="hidden" name="name" value="{{$shippingInfo['name']}}">

                                              <input type="hidden" name="email" value="{{$shippingInfo['email']}}">

                                              <input type="hidden" name="phone" value="{{$shippingInfo['phone']}}">

                                              <input type="hidden" name="division_id" value="{{$shippingInfo['division_id']}}">

                                              <input type="hidden" name="district_id" value="{{$shippingInfo['district_id']}}">

                                              <input type="hidden" name="state_id" value="{{$shippingInfo['state_id']}}">

                                              <input type="hidden" name="post_code" value="{{$shippingInfo['post_code']}}">

                                              <input type="hidden" name="notes" value="{{$shippingInfo['notes']}}">

                                              <input type="hidden" name="payment_method" value="{{$shippingInfo['payment_method']}}">

                                              <!-- Hidden Fields End-->
                                              
                                              <div class='form-row row'>
                                                 <div class='col-xs-12 form-group required'>
                                                    <label class='control-label'>Name on Card</label> <input
                                                       class='form-control' size='4' type='text'>
                                                 </div>
                                              </div>
                                              <div class='form-row row'>
                                                 <div class='col-xs-12 form-group card required'>
                                                    <label class='control-label'>Card Number</label> <input
                                                       autocomplete='off' class='form-control card-number' size='20'
                                                       type='text'>
                                                 </div>
                                              </div>
                                              <div class='form-row row'>
                                                 <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                                       class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                       type='text'>
                                                 </div>
                                                 <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Month</label> <input
                                                       class='form-control card-expiry-month' placeholder='MM' size='2'
                                                       type='text'>
                                                 </div>
                                                 <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Year</label> <input
                                                       class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                       type='text'>
                                                 </div>
                                              </div>
                                              <div class='form-row row'>
                                                 <div class='col-md-12 error form-group hide'>
                                                    <div class='alert-danger alert'>Please correct the errors and try
                                                       again.
                                                    </div>
                                                 </div>
                                              </div>
                                              <div class="row">
                                                 <div class="col-xs-12">
                                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($
                                                        @if (session()->has('coupon'))
                                                            {{round($totalAmount/85)}}
                                                        @else
                                                            {{round($cartTotal/85)}}
                                                        @endif)</button>
                                                 </div>
                                              </div>
                                           </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- checkout-progress-sidebar -->
                </div>
            </div>
		</div><!-- /.checkout-box -->
	
	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
@section('scripts')
    
	<script src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
    </script>
@endsection