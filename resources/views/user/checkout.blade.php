@extends('layouts.frontend-layout')
@section('title',"Checkout Page")
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box">
			<form class="register-form" action="{{route('shipping.store')}}" role="form" method="POST">
				@csrf
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="shipping-area">
									<h4 class="checkout-subtitle">Shipping Area</h4>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="info-title" for="name">Full Name <span>*</span></label>
												<input type="text" class="form-control unicase-form-control text-input" name="name" id="name" placeholder="Enter Your Full Name">
											</div>
											<div class="form-group">
												<label class="info-title" for="email">Email Address <span>*</span></label>
												<input type="email" name="email" class="form-control unicase-form-control text-input" id="email" placeholder="Enter Email Address">
											</div>
											<div class="form-group">
												<label class="info-title" for="phone">Phone Number <span>*</span></label>
												<input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone" placeholder="Enter Your Phone Number">
											</div>
											<div class="form-group">
												<label class="info-title" for="phone">Select Division <span>*</span></label>
												<select name="division_id" class="form-control select2 select2-show-search" id="division">
													<option value="">Choose One Division</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="info-title" for="phone">Select District <span>*</span></label>
												<select name="district_id" class="form-control select2 select2-show-search" id="district">
												</select>
											</div>
											<div class="form-group">
												<label class="info-title" for="phone">Select State <span>*</span></label>
												<select name="state_id" class="form-control select2 select2-show-search" id="state">
												</select>
											</div>
											<div class="form-group">
												<label class="info-title" for="phone">Post Code <span>*</span></label>
												<input type="text" class="form-control unicase-form-control text-input" name="post_code" id="post-code" placeholder="Enter Your Post Code">
											</div>
											<div class="form-group">
												<label class="info-title" for="phone">Notes <span>*</span></label>
												<textarea name="notes" id="notes" class="form-control"></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<button type="submit" class="btn btn-success">Save</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row">
							
							<div class="col-md-12">
								<!-- checkout-progress-sidebar -->
								<div class="checkout-progress-sidebar ">
									<div class="panel-group">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="unicase-checkout-title">Choose Your Payment Method</h4>
											</div>
											<div class="">
												<ul>
													<li>
														<input type="radio" name="payment_method" id="stripe" value="stripe">
														<label for="stripe">Stripe</label>
													</li>
													<li>
														<input type="radio" name="payment_method" id="paypal" value="paypal">
														<label for="paypal">Paypal</label>
													</li>
													<li>
														<input type="radio" name="payment_method" id="sslcommerz" value="sslcommerz_hosted">
														<label for="paypal">SSLCommerz(HostedPay)</label>
													</li>
													<li>
														<input type="radio" name="payment_method" id="sslcommerz" value="sslcommerz_easy">
														<label for="paypal">SSLCommerz(Easy Checkout)</label>
													</li>
													<li>
														<input type="radio" name="payment_method" id="cod" value="cod">
														<label for="cod">Cash On Delivey</label>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div><!-- checkout-progress-sidebar -->
							</div>
							<div class="col-md-12">
								<!-- checkout-progress-sidebar -->
								<div class="checkout-progress-sidebar ">
									<div class="panel-group">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
											</div>
											<div class="">
												<table class="table">
													<tbody>
														@foreach ($cartProducts as $product)
															<tr>
																<td style="padding: 0">
																	<div style="width:100px;">
																		<img style="width:100%;" src="{{asset($product->options->image)}}">
																	</div>
																</td>
																<td style="padding: 0">{{$product->name}}</td>
																<td style="padding: 0;color:rgb(6, 168, 6);">৳{{$product->price}}</td>
															</tr>
														@endforeach
													</tbody>
												</table>
											</div>
											<div class="">
												@if (session()->has('coupon'))
												<div class="cart-sub-total"  style="font-size: 18px">
													Subtotal<span class="inner-left-md">৳{{$subtotal}}</span>
												</div>
												<div class="cart-grand-total" style="font-size: 20px">
													Grand Total<span class="inner-left-md" style="color:rgb(6, 168, 6);">৳{{$total}}</span>
												</div>
												@else
												<div class="cart-grand-total" style="font-size: 20px">
													Grand Total:<span class="inner-left-md" style="color:rgb(6, 168, 6);">৳{{$total}}</span>
												</div>
												@endif
											</div>
										</div>
									</div>
								</div><!-- checkout-progress-sidebar -->
							</div>
						</div>
					</div>
				</div><!-- /.row -->
			</form>
		</div><!-- /.checkout-box -->

	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
@section('scripts')
    <script type="text/javascript">
        function getAllDivision() {
			axios.get("{{url('/user/checkout/division')}}")
			.then(function (response) {
				if (response.status===200) {
					$.each(response.data.divisions,function (id ,division) {
						$('#division').append(
							'<option value="'+division.id+'">'+division.name+'</option>'
						)
					})
				}
			})
			.catch(function (error) {
				console.log(error);
			})
		}
		getAllDivision();
		$('#division').on('change',function () {
			let divisionId=$('#division').val();
			axios.get("{{url('/user/checkout/district')}}/"+divisionId)
			.then(function (response) {
				console.log(response.data.districts);
				if (response.status===200) {
					$('#district').empty();
					$('#district').append(
						'<option value="">Choose One</option>'
					)
					$.each(response.data.districts,function (id ,district) {
						$('#district').append(
							'<option value="'+district.id+'">'+district.name+'</option>'
						)
					})
				}
			})
			.catch(function (error) {
				console.log(error);
			})
		})
		$('#district').on('change',function () {
			let districtId=$('#district').val();
			axios.get("{{url('/user/checkout/state')}}/"+districtId)
			.then(function (response) {
				if (response.status===200) {
					$('#state').empty();
					$('#state').append(
						'<option value="">Choose One</option>'
					)
					$.each(response.data.states,function (id ,state) {
						$('#state').append(
							'<option value="'+state.id+'">'+state.name+'</option>'
						)
					})
				}
			})
			.catch(function (error) {
				console.log(error);
			})
		})
    </script>
@endsection