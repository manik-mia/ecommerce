<!DOCTYPE html>
<html lang="en">
	
<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
		<meta id="csrf-token" content="{{csrf_token()}}">
	    <meta name="robots" content="all">

	    <title>@yield('title')</title>
	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
	    <!-- Customizable CSS -->
		
	    <link rel="stylesheet" href="{{asset('assets/frontend/css/main.css')}}">
	    <link rel="stylesheet" href="{{asset('assets/frontend/css/blue.css')}}">
	    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.css')}}">
		<link rel="stylesheet" href="{{asset('assets/frontend/css/owl.transitions.css')}}">
		<link rel="stylesheet" href="{{asset('assets/frontend/css/animate.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/frontend/css/rateit.css')}}">
		<link href="{{asset('assets/backend/lib/select2/css/select2.min.css')}}" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap-select.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/frontend/css/lightbox.css')}}">
		<link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">

		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="{{asset('assets/frontend/css/font-awesome.css')}}">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

		
	</head>
    <body class="cnt-home">
		<!-- ====================== HEADER ===================== -->
		@include('frontend.inc.header')

		<!-- ================ HEADER : END ========== -->
		@yield('content')

	<!-- ======= FOOTER ======= -->
		@include('frontend.inc.footer')
	<!-- ======= FOOTER : END======= -->


	@include('components.product.modal')
	<!-- For demo purposes – can be removed on production -->
	
	
	<!-- For demo purposes – can be removed on production : End -->

	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="{{asset('assets/frontend/js/jquery-1.11.1.min.js')}}"></script>
	
	<script type="text/javascript" src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
	
	<script type="text/javascript" src="{{asset('assets/frontend/js/bootstrap-hover-dropdown.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
	
	<script type="text/javascript" src="{{asset('assets/frontend/js/echo.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.easing-1.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/frontend/js/bootstrap-slider.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery.rateit.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/lightbox.min.js')}}"></script>
    <script src="{{asset('assets/backend/lib/select2/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/bootstrap-select.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/wow.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/frontend/js/scripts.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/backend/js/sweetalert2@11.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/backend/js/axios.min.js')}}" type="text/javascript"></script>
	<script type="text/javascript" src="{{asset('assets/frontend/js/custom.js')}}" type="text/javascript"></script>
	<script type="text/javascript">
		
		axios.defaults.headers.common['X-CSRF-TOKEN']=$('meta#csrf-token').attr('content');


		function viewProduct(id){
			let url='/product/view/'+id;
			axios.get(url)
			.then(function (response) {
				if (response.status===200) {
					let product=response.data.product;
					let category=response.data.category;
					let brand=response.data.brand;
					let colorBn=response.data.colorsBn;
					let colorEn=response.data.colorsEn;
					let sizeBn=response.data.sizesBn;
					let sizeEn=response.data.sizesEn;
						$('.image').attr('src','/'+product.product_thumbnail);
						$('#product-id').val(product.id);
						$('#color').empty();
						$('#size').empty();
						$('#price').empty();
						$('.discount-price-modal').empty();
						if (product.discount_price==null) {
							$('.product-price').text(product.selling_price);
						}else {
							$('.discount-price-modal').text(product.discount_price);
							$('#price').addClass('delete').text(product.selling_price);
						}
					@if (session()->get('language')==='bangla')
						$('.product-name').text(product.product_name_bn);
						$('.category').text(category.category_name_bn);
						$('.brand').text(brand.brand_name_bn);
						$('.code').text(product.product_code);
						if (product.product_quantity_bn!==null) {
							$('.stock').text('মজুদ আছে').addClass('in-stock');
						} else {
							$('.stock').text('মজুদ নেই').addClass('out-stock');
						}
						$('.stock').text(product.product_code);
						if (product.product_color_bn!== null) {
							
							$.each(colorBn,function (key,value) {
								$('#color').append(
									'<option value="'+value+'">'+value+'</option>'
								)
							})
							
							$('.color-group').removeClass('d-none')	
						}
						else {
							$('.color-group').addClass('d-none')
						}
						if (product.product_size_bn!== null) {
							
							$.each(sizeBn,function (key,value) {
							$('#size').append(
								'<option value="'+value+'">'+value+'</option>'
								)
							})	
							$('.size-group').removeClass('d-none')	
						}
						else {
							$('.size-group').addClass('d-none');
						}
						
					@else
						$('.product-name').text(product.product_name_en);
						$('.category').text(category.category_name_en);
						$('.brand').text(brand.brand_name_en);
						$('.code').text(product.product_code);
						if (product.product_quantity_en!==null) {
							$('.stock').text('In Stack').addClass('in-stock');
						} else {
							$('.stock').text('Out of Stack').addClass('out-stock');
						}
						if (product.product_color_en!== null) {
							
							$.each(colorEn,function (key,value) {
							$('#color').append(
								'<option value="'+value+'">'+value+'</option>'
								)
							})
							$('.color-group').removeClass('d-none')		
						}
						else {
							$('.color-group').addClass('d-none');
						}
						if (product.product_size_en!== null) {
							
							$.each(sizeEn,function (key,value) {
							$('#size').append(
								'<option value="'+value+'">'+value+'</option>'
								)
							})
							$('.size-group').removeClass('d-none')		
						}
						else {
							$('.size-group').addClass('d-none');
						}
					@endif
				}
			}).catch(function (error) {
				alert(error);
			})
		}
		function addToCart() {
			$('#view-product-modal').modal('hide');
			let id=$('.product-id').val();
			let url ="/product/add-to-cart/"+id;
			axios.post(url,{
				'id':id,
				'color':$('.color').val(),
				'size':$('.size').val(),
				'quantity':$('.quantity').val(),
				'_token':'{{csrf_token()}}',
			})
			.then(function (response) {
				getCartData();
				
				//discountWithCoupon();
				const Toast=Swal.mixin({
					toast:true,
					position:'top-end',
					showConfirmButton:false,
					timer:3000,

				})
				if ($.isEmptyObject(response.error)) {
					Toast.fire({
						icon:'success',
						text:response.data+" Added On your cart",
					})
				}else {
					Toast.fire({
						icon:'error',
						text:response.data+" Add fail On your cart",
					})
				}
			}).catch(function (error) {
				
			})
		}
		function getCartData() {
			
			axios.get("{{route('product.cart.view')}}")
			.then(function (response) {
				$('#count').text(response.data.qty);
				$('.total').text(response.data.total);
				var miniCart='';
				$.each(response.data.products,function(key,value){
					miniCart+=`<div class="row">
						<div class="col-xs-4">
							<div class="image">
								<a href="detail.html"><img src="/${value.options.image}" alt=""></a>
							</div>
						</div>
						<div class="col-xs-7">
							
							<h3 class="name"><a href="index8a95.html?page-detail">${value.name}</a></h3>
							<div class="price">৳ ${value.price}</div>
						</div>
						<div class="col-xs-1 action">
							<input type="hidden" value="${value.rowId}" class="remove-from-cart">
							<button type="submit" onclick="removeMiniCartData()"><i class="fa fa-trash"></i></button>
						</div>
					</div>
					<hr>`
				});
				$('#mini-cart').html(miniCart);
			})
		}
		
		getCartData();

		function getAllCartData() {
			
			axios.get("{{route('product.cart.view')}}")
			.then(function (response) {
				$.each(response.data.products,function(key,value){
					$('<tr>').html(  
                    `<td class="romove-item">
						<input type="hidden" value="${value.rowId}" class="remove-from-cart">
						<button type="submit" onclick="removeMiniCartData()" title="cancel" class="btn icon remove-cart-product"><i class="fa fa-trash-o"></i>
						</button>
					</td>
					'<td class="cart-image">'
						<a class="entry-thumbnail" href="">
						    <img src="/${value.options.image}" alt="">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="detail.html">${value.name}Floral Print Buttoned</a></h4>
						<div class="cart-product-info">
							<span class="product-color">COLOR:<span style="text-transform:capitalize">${value.options.color}</span></span>
						</div>
					</td>
					<td class="cart-product-quantity">
						<div stye="display:flex;">
				            <button class="btn btn-danger" id="${value.rowId}" ${value.qty > 1 ? '' : 'disabled'} onclick="decreaseQty(this.id)">-</button>
				            <button class="btn">${value.qty}</button>
				            <button class="btn btn-success" id="${value.rowId}"  onclick="increaseQty(this.id)">+</button>
			              </div>
		            </td>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price">৳ ${value.price}</span></td>
					<td class="cart-product-grand-total"><span class="cart-grand-total-price">৳ ${value.qty*value.price}</span></td>`
                    ).appendTo('#cart-table');
				});
			})
		}
		
		
		
		getAllCartData();

		function removeMiniCartData() {
			let rawId=$('.remove-from-cart').val();
			axios.get("/product/remove-from-cart/"+rawId)
			.then(function (response) {
				$('#cart-table').empty();
				$('#coupon-code').val('');
				$('#coupon-section').show();
				getAllCartData();

				getCartData();

				discountWithCoupon();

				const Toast=Swal.mixin({
					toast:true,
					position:'top-end',
					showConfirmButton:false,
					timer:3000,

				})
				if ($.isEmptyObject(response.error)) {
					Toast.fire({
						icon:'success',
						text:response.data,
					})
				}else {
					Toast.fire({
						icon:'error',
						text:'Product remove failed from cart',
					})
				}
			}).catch(function (error) {
				
			})
		}
        
		function addToWishList(id) {
			@if (Auth()->check())
				axios.post("/user/wishlist-add/"+id,{
					'id':id,
					'_token':"{{csrf_token()}}",
				})
				.then(function (response) {
					const Toast=Swal.mixin({
					toast:true,
					position:'top-end',
					showConfirmButton:false,
					timer:3000,

					})
					if ($.isEmptyObject(response.error)) {
						Toast.fire({
							icon:'success',
							text:response.data,
						})
					}else {
						Toast.fire({
							icon:'error',
							text:'Porduct Add into Wishlist Fail',
						})
					}
				}).catch(function (error) {
					
				})
				
			@else 
				Swal.fire({
					icon:'error',
					text:"You have to login first. Otherwise You can't add this product on your wishlist" ,
				})
			@endif
		}
		@if (session()->has('success'))
            Swal.fire({
                icon:'success',
                text:"{{session('success')}}"
            })
        @endif
        @if (session()->has('error'))
            Swal.fire({
                icon:'error',
                text:"{{session('error')}}"
            })
        @endif
		$('#checkout').on('click',function () {
			
			@if (Auth()->check())
			@else
                Swal.fire({
                    title:"Your not logged in!",
                    text:'Please login first',
                    icon:'warning',
                })
			@endif
		})
	</script>
	@yield('scripts')

</body>

</html>