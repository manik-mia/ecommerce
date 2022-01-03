@extends('layouts.frontend-layout')
@section('title',"Cart Page")
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th class="cart-romove item">Remove</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Price</th>
					<th class="cart-total last-item">Subtotal</th>
				</tr>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="#" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								<a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody id="cart-table">
				<tr>
					
				</tr>
			</tbody><!-- /tbody -->
		</table><!-- /table -->
	</div>
</div><!-- /.shopping-cart-table -->				

<div class="col-md-6 col-sm-12 estimate-ship-tax">
	<table class="table" id="coupon-section">

		<thead>
			<tr>
				<th>
					<span class="estimate-title">Discount Code</span>
					<p>Enter your coupon code if you have one..</p>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<div class="form-group">
						<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon.." id="coupon-code">
					</div>
					<div class="clearfix pull-right">
						<button type="submit" id="coupon-btn" class="btn-upper btn btn-primary">APPLY COUPON</button>
					</div>
				</td>
			</tr>
		</tbody><!-- /tbody -->

	</table><!-- /table -->
</div><!-- /.estimate-ship-tax -->

<div class="col-md-6 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead>
			<tr id="total-amount">
				
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<a href="{{route('user.checkout')}}" style="font-weight:600;" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->			</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
        
<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		@include('frontend.inc.brand-carousel',['brands'=>$brands])
<!-- ======= BRANDS CAROUSEL : END=========== -->	
	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
@section('scripts')
    <script type="text/javascript">
        
		//Increase Quantity
		function increaseQty(rawId) {
			
			axios.get("{{url('/cart/quantity/increase')}}/"+rawId)
			.then(function (response) {
				if (response.status===200) {

					$('#cart-table').empty();
					$('#total-amount').empty();

					getCartData();
					 
					getAllCartData();

					discountWithCoupon();
					
				}
			})
		}
		
		//Decrease Quantity
		function decreaseQty(rawId) {
			//let rawId=$('.remove-from-cart').val();
			axios.get("{{url('/cart/quantity/decrease')}}/"+rawId)
			.then(function (response) {
				if (response.status===200) {
					
					$('#cart-table').empty();
					$('#total-amount').empty();

					getCartData();
					 
					getAllCartData();

					discountWithCoupon(); 

				}
			})
		}

		function  discountWithCoupon() {
			axios.get("{{url('/coupon/discount')}}")
			.then(function (response) {
				
				$('#total-amount').empty();
				if (response.status===200) {
					let total=response.data.cartTotal;
					if ($.isEmptyObject(response.data.cartTotal)) {
						
						$('<th>').html(
							`<div class="cart-sub-total">
								Subtotal<span class="inner-left-md">৳${response.data.subtotal}</span>
							</div>
							<div class="cart-sub-total">
								Coupon<span class="inner-left-md">${response.data.coupon}</span>
								<button class="btn" id="remove-coupon" onclick="removeCoupon()"><i class="fa fa-times"></i></button>
							</div>
							<div class="cart-sub-total">
								Discount<span class="inner-left-md">৳${response.data.discount}</span>
							</div>
							<div class="cart-grand-total">
								Grand Total<span class="inner-left-md">৳${response.data.totalAmount}</span>
							</div>`
						).appendTo('#total-amount');
					}else {
						$('<th>').html(
						`<div class="cart-sub-total">
							Subtotal<span class="inner-left-md">৳${total}</span>
						</div>
						<div class="cart-grand-total">
							Grand Total<span class="inner-left-md">৳${total}</span>
						</div>`
						).appendTo('#total-amount');
					}
				}
			})
			.catch(function (error) {
				alert(error)
			})
		}

		//Coupon Apply
		$('#coupon-btn').on('click',function () {
			let couponCode=$('#coupon-code').val();
			axios.post("/coupon/apply",{
				'coupon_code':couponCode,
				'_token':"{{csrf_token()}}"
			})
			.then(function (response) {
				
				$('#coupon-section').hide();
				discountWithCoupon();
				if (response.status===200) {
					const ApplyCoupon=Swal.mixin({
						Toast:true,
						position:'top-end',
						showConfirmButton:false,
						timer:2000,
					})
					if ($.isEmptyObject(response.data.success)) {
						ApplyCoupon.fire({
							icon:'error',
							text:response.data.error,
						})
					}else {
						ApplyCoupon.fire({
							icon:'success',
							text:response.data.success,
						})
					}
				}
			})
			.catch(function (error) {
				alert(error);
			})
		})
		discountWithCoupon();
		
		function removeCoupon(){
			axios.get("{{url('/coupon/remove')}}")
			.then(function (response) {
				$('#coupon-section').show();
				$('#coupon-code').val('');
				discountWithCoupon();

				if (response.status===200) {
					const removeAlert=Swal.mixin({
						toast:true,
						position:'top-end',
						showConfirmButton:false,
						timer:2000
					})
					if ($.isEmptyObject(response.data.error)) {
						
						removeAlert.fire({
							icon:'success',
							text:response.data.success,
						})
					}else {
						removeAlert.fire({
							icon:'error',
							text:"Something Went Wrong",
						})
					}

				}
			})
			.catch(function (error) {
				alert(error)
			})
		}

		getCartData();
		
		
    </script>
@endsection