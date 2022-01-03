@extends('layouts.frontend-layout')
@section('title','Flipmart premium HTML5 & CSS3 Template')
@section('home','active')
@section('content')
 
<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">
	<!-- ===================== SIDEBAR ===================== -->	
		<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
			
<!-- ========= TOP NAVIGATION ========= -->
			@include('components.side-nav')
<!-- ========= TOP NAVIGATION : END ========= -->

	<!-- ===================== HOT DEALS ===================== -->
		<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
			<h3 class="section-title">{{session()->get('language')=='bangla' ? 'ধামাকা অফার':'hot deals'}}</h3>
			<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
				@foreach ($hotDeals as $product)
					@include('components.hot-deal.hot-deal',['product'=>$product])
				@endforeach
			</div><!-- /.sidebar-widget -->
		</div>
<!-- ===================== HOT DEALS: END ===================== -->


			<!-- ===================== SPECIAL OFFER ===================== -->

<div class="sidebar-widget outer-bottom-small wow fadeInUp">
	<h3 class="section-title">{{session()->get('language')=='bangla'?'স্পেশাল অফার':'Special Offer'}}</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
			@foreach ($specialOffers as $product)
	        <div class="item">
	        	<div class="products special-product">
						
		        	<div class="product">
						
						<div class="product-micro">
							
							<div class="row product-micro-row">
								
								<div class="col col-xs-5">
									<div class="product-image">
										<div class="image">
											<a href="{{route('product.detail',['id'=>$product->id,'slug'=>$product->product_slug_en])}}">
												<img src="{{asset($product->product_thumbnail)}}" alt="{{$product->product_name_en}}">
											</a>					
										</div><!-- /.image -->
									</div><!-- /.product-image -->
								</div><!-- /.col -->
								<div class="col col-xs-7">
									<div class="product-info">
										<h3 class="name"><a href="{{route('product.detail',['id'=>$product->id,'slug'=>$product->product_slug_en])}}">{{session()->get('language')=='bangla'?$product->product_name_bn:$product->product_name_en}}</a></h3>
										<div class="rating rateit-small"></div>
										<div class="product-price">	
											<span class="price">
												৳{{session()->get('language')=='bangla' ? toBanglaNumber($product->discount_price): $product->discount_price}}
											</span>
										</div><!-- /.product-price -->
									</div><!-- /.product-price -->
								</div>
							</div><!-- /.col -->
						</div><!-- /.product-micro-row -->
						
					</div><!-- /.product-micro -->
				</div>
			</div>
			@endforeach
		</div>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ===================== SPECIAL OFFER : END ===================== -->

<!-- ===================== SPECIAL DEALS ===================== -->

<div class="sidebar-widget outer-bottom-small wow fadeInUp">
	<h3 class="section-title">{{session()->get('language')=='bangla'?'স্পেশাল ডিল':'Special Deals'}}</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
			@foreach ($specialOffers as $product)
	        <div class="item">
	        	<div class="products special-product">
						
		        	<div class="product">
						<div class="product-micro">
							<div class="row product-micro-row">
								<div class="col col-xs-5">
									<div class="product-image">
										<div class="image">
											<a href="{{route('product.detail',['id'=>$product->id,'slug'=>$product->product_slug_en])}}">
												<img src="{{asset($product->product_thumbnail)}}" alt="{{$product->product_name_en}}">
											</a>					
										</div><!-- /.image -->
									</div><!-- /.product-image -->
								</div><!-- /.col -->
								<div class="col col-xs-7">
									<div class="product-info">
										<h3 class="name"><a href="{{route('product.detail',['id'=>$product->id,'slug'=>$product->product_slug_en])}}">{{session()->get('language')=='bangla'?$product->product_name_bn:$product->product_name_en}}</a></h3>
										<div class="rating rateit-small"></div>
										<div class="product-price">	
											<span class="price">
												৳{{session()->get('language')=='bangla' ? toBanglaNumber($product->discount_price): $product->discount_price}}
											</span>
										</div><!-- /.product-price -->
									</div><!-- /.product-price -->
								</div>
							</div><!-- /.col -->
						</div><!-- /.product-micro-row -->
					</div><!-- /.product-micro -->
	        	</div>
	        </div>
			@endforeach
	    </div>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ===================== SPECIAL DEALS : END ===================== -->
			<!-- ===================== NEWSLETTER ===================== -->
<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
	<h3 class="section-title">Newsletters</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<p>Sign Up for Our Newsletter!</p>
        <form role="form">
        	 <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
			  </div>
			<button class="btn btn-primary">Subscribe</button>
		</form>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ===================== NEWSLETTER: END ===================== -->
		
			<!-- ===================== Testimonials===================== -->
@include('frontend.inc.testimonial')
    
<!-- ===================== Testimonials: END ===================== -->

		</div><!-- /.sidemenu-holder -->
		<!-- ===================== SIDEBAR : END ===================== -->

		<!-- ===================== CONTENT ===================== -->
		<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
			<!-- ================= SECTION – HERO ================ -->
			
<div id="hero">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
		@foreach ($slider as $slide)
			
		<div class="item" style="background-image: url({{asset($slide->image)}});">
			<div class="container-fluid">
				<div class="caption bg-color vertical-center text-left">
                    <div class="slider-header fadeInDown-1">
						@if (session()->get('language')==='bangla')
							{{$slide->sub_title_bn}}
						@else
							{{$slide->sub_title_en}}
						@endif
					</div>
					<div class="big-text fadeInDown-1">
						@if (session()->get('language')==='bangla')
							{{$slide->title_bn}}
						@else
							{{$slide->title_en}}
						@endif
					</div>

					<div class="excerpt fadeInDown-2 hidden-xs">
					
					<span>
						@if (session()->get('language')==='bangla')
							{{$slide->description_bn}}
						@else
							{{$slide->description_en}}
						@endif
					</span>

					</div>
					<div class="button-holder fadeInDown-3">
						<a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
					</div>
				</div><!-- /.caption -->
			</div><!-- /.container-fluid -->
		</div><!-- /.item -->
		
		@endforeach
		
		

	</div><!-- /.owl-carousel -->
</div>
			
<!-- ================ SECTION – HERO : END ================ -->	

			<!-- ===================== INFO BOXES ===================== -->
<div class="info-boxes wow fadeInUp">
	<div class="info-boxes-inner">
		<div class="row">
			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						
						<div class="col-xs-12">
							<h4 class="info-box-heading green">money back</h4>
						</div>
					</div>	
					<h6 class="text">30 Days Money Back Guarantee</h6>
				</div>
			</div><!-- .col -->

			<div class="hidden-md col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						
						<div class="col-xs-12">
							<h4 class="info-box-heading green">free shipping</h4>
						</div>
					</div>
					<h6 class="text">Shipping on orders over $99</h6>	
				</div>
			</div><!-- .col -->

			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						
						<div class="col-xs-12">
							<h4 class="info-box-heading green">Special Sale</h4>
						</div>
					</div>
					<h6 class="text">Extra $5 off on all items </h6>	
				</div>
			</div><!-- .col -->
		</div><!-- /.row -->
	</div><!-- /.info-boxes-inner -->
	
</div><!-- /.info-boxes -->
<!-- ===================== INFO BOXES : END ===================== -->
			<!-- ===================== SCROLL TABS ===================== -->
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
	<div class="more-info-tab clearfix ">
	   <h3 class="new-product-title pull-left">
		@if(session()->get('language')==='bangla')
			নতুন পণ্যসমুহ
		@else
			New Products
		@endif
	   </h3>
		<ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
			<li class="active">
				<a data-transition-type="backSlide" href="#all" data-toggle="tab">
					@if(session()->get('language')==='bangla')
						সকল
					@else
						All
					@endif
				</a>
			</li>
			@foreach ($categories as $category)
				<li>
					<a data-transition-type="backSlide" href="#category-{{$category->id}}" data-toggle="tab">
						@if(session()->get('language')==='bangla')
							{{$category->category_name_bn}}
						@else
							{{$category->category_name_en}}
						@endif
					</a>
				</li>
			@endforeach
		</ul><!-- /.nav-tabs -->
	</div>

	<div class="tab-content outer-top-xs">
		<div class="tab-pane in active" id="all">			
			<div class="product-slider">
				<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
				    	
					@foreach($products as $product)
					<div class="owl-item" style="width: 170px;">
						<div class="item item-carousel">
							<div class="products">
								
								@include('components.product.product',['product'=>$product])
						  
							</div><!-- /.products -->
						</div>
					</div>
					@endforeach
				</div><!-- /.home-owl-carousel -->
			</div><!-- /.product-slider -->
		</div><!-- /.tab-pane -->
		@foreach ($categories as $category)
		<div class="tab-pane" id="category-{{$category->id}}">
			<div class="product-slider">
				<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
				    	
		
					@foreach($products as $product)
					
						@if ($product->category_id===$category->id)
						<div class="owl-item" style="width: 170px;">
							<div class="item item-carousel">
								
								<div class="products">
									
									@include('components.product.product',['product'=>$product])	
								</div><!-- /.products -->

							</div>
						</div>
						@endif

					@endforeach
		
				</div><!-- /.home-owl-carousel -->
			</div><!-- /.product-slider -->
		</div><!-- /.tab-pane -->
		
		@endforeach
	</div><!-- /.tab-content -->
</div><!-- /.scroll-tabs -->
<!-- ===================== SCROLL TABS : END ===================== -->

<!-- ===================== FEATURED PRODUCTS ===================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">{{session()->get('language')=='bangla'? 'ফিচার পণ্যসমুহ' :'Featured products'}}</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
	    @foreach ($featureProduct as $product)
			
		<div class="item item-carousel">
			<div class="products">
				@include('components.product.product',['product'=>$product])
      
			</div><!-- /.products -->
		</div><!-- /.item -->
		
		@endforeach
	</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->

<!-- Category Wise Product-->
@foreach ($categories as $category)
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">{{session()->get('language')=='bangla'? $category->category_name_bn :$category->category_name_en}}</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
	    @foreach ($products as $product)
			@if ($product->category_id===$category->id)
			<div class="item item-carousel">
				<div class="products">
					@include('components.product.product',['product'=>$product])
		
				</div><!-- /.products -->
			</div><!-- /.item -->
		
			@endif
		@endforeach
	</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
@endforeach

<!-- Brand Wise Product Show-->

@foreach ($brands as $brand)
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">{{session()->get('language')=='bangla'? $brand->brand_name_bn :$brand->brand_name_en}}</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
	    @foreach ($products as $product)
			@if ($product->brand_id===$brand->id)
			<div class="item item-carousel">
				<div class="products">
					@include('components.product.product',['product'=>$product])
		
				</div><!-- /.products -->
			</div><!-- /.item -->
		
			@endif
		@endforeach
	</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
@endforeach

<!-- =========== FEATURED PRODUCTS : END ========== -->

<!-- ============== BEST SELLER ========== -->

<div class="best-deal wow fadeInUp outer-bottom-xs">
	<h3 class="section-title">Best seller</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
	        	        <div class="item">
	        	<div class="products best-product">
		        							<div class="product">
							<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="assets/frontend/images/products/p20.jpg" alt="">
					</a>					
				</div><!-- /.image -->
					
											
					
								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">	
				<span class="price">
					$450.99				</span>
				
			</div><!-- /.product-price -->
			
			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->
      
</div>
		        		<div class="product">
				<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="assets/frontend/images/products/p21.jpg" alt="">
					</a>					
				</div><!-- /.image -->
					
					
								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">	
				<span class="price">
					$450.99				</span>
				
			</div><!-- /.product-price -->
			
			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->
      
						</div>
		        		        	</div>
	        </div>
	    		        <div class="item">
	        	<div class="products best-product">
		        							<div class="product">
							<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="assets/frontend/images/products/p22.jpg" alt="">
					</a>					
				</div><!-- /.image -->
					
					
								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">	
				<span class="price">
					$450.99				</span>
				
			</div><!-- /.product-price -->
			
			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->
      
						</div>
		        							<div class="product">
							<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="assets/frontend/images/products/p23.jpg" alt="">
						</a>					
				</div><!-- /.image -->
					
					
											
								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">	
				<span class="price">
					$450.99				</span>
				
			</div><!-- /.product-price -->
		
			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->
      
						</div>
		        		        	</div>
	        </div>
	    		        <div class="item">
	        	<div class="products best-product">
		        							<div class="product">
							<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="assets/frontend/images/products/p24.jpg" alt="">
					</a>					
				</div><!-- /.image -->
											
					
					
								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">	
				<span class="price">
					$450.99				</span>
				
			</div><!-- /.product-price -->
		
			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->
      
						</div>
		        							<div class="product">
							<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="assets/frontend/images/products/p25.jpg" alt="">
					</a>					
				</div><!-- /.image -->
					
					
								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">	
				<span class="price">
					$450.99				</span>
				
			</div><!-- /.product-price -->
			
			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->
      
						</div>
		        		        	</div>
	        </div>
	    		        <div class="item">
	        	<div class="products best-product">
		        							<div class="product">
							<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="assets/frontend/images/products/p26.jpg" alt="">
								</a>					
				</div><!-- /.image -->
											
					
					
								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">	
				<span class="price">
					$450.99				</span>
				
			</div><!-- /.product-price -->
	
			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->
      
						</div>
		        							<div class="product">
							<div class="product-micro">
	<div class="row product-micro-row">
		<div class="col col-xs-5">
			<div class="product-image">
				<div class="image">
					<a href="#">
						<img src="assets/frontend/images/products/p27.jpg" alt="">
					</a>					
				</div><!-- /.image -->
					
					
								</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col2 col-xs-7">
			<div class="product-info">
				<h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">	
				<span class="price">
					$450.99				</span>
				
			</div><!-- /.product-price -->
	
			</div>
		</div><!-- /.col -->
	</div><!-- /.product-micro-row -->
</div><!-- /.product-micro -->
      
						</div>
		        		        	</div>
	        </div>
	    		    </div>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ===================== BEST SELLER : END ===================== -->	

			<!-- ===================== BLOG SLIDER ===================== -->
<section class="section latest-blog outer-bottom-vs wow fadeInUp">
	<h3 class="section-title">latest form blog</h3>
	<div class="blog-slider-container outer-top-xs">
		<div class="owl-carousel blog-slider custom-carousel">
													
				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="assets/frontend/images/blog-post/post1.jpg" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->
					
					
						<div class="blog-post-info text-left">
							<h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>	
							<span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
							<p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
							<a href="#" class="lnk btn btn-primary">Read more</a>
						</div><!-- /.blog-post-info -->
						
						
					</div><!-- /.blog-post -->
				</div><!-- /.item -->
			
												
				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="assets/frontend/images/blog-post/post2.jpg" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->
					
					
						<div class="blog-post-info text-left">
							<h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>	
							<span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
							<p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
							<a href="#" class="lnk btn btn-primary">Read more</a>
						</div><!-- /.blog-post-info -->
						
						
					</div><!-- /.blog-post -->
				</div><!-- /.item -->
			
												
				<!-- /.item -->
			
												
				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="assets/frontend/images/blog-post/post1.jpg" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->
					
					
						<div class="blog-post-info text-left">
							<h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>	
							<span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
							<p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
							<a href="#" class="lnk btn btn-primary">Read more</a>
						</div><!-- /.blog-post-info -->
						
						
					</div><!-- /.blog-post -->
				</div><!-- /.item -->
			
												
				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="assets/frontend/images/blog-post/post2.jpg" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->
					
					
						<div class="blog-post-info text-left">
						<h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>	
							<span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
							<p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
							<a href="#" class="lnk btn btn-primary">Read more</a>
						</div><!-- /.blog-post-info -->
						
						
					</div><!-- /.blog-post -->
				</div><!-- /.item -->
			
												
				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="assets/frontend/images/blog-post/post1.jpg" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->
					
					
						<div class="blog-post-info text-left">
							<h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>	
							<span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
							<p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
							<a href="#" class="lnk btn btn-primary">Read more</a>
						</div><!-- /.blog-post-info -->
						
						
					</div><!-- /.blog-post -->
				</div><!-- /.item -->
			
						
		</div><!-- /.owl-carousel -->
	</div><!-- /.blog-slider-container -->
</section><!-- /.section -->
<!-- ===================== BLOG SLIDER : END ===================== -->	

			<!-- ===================== FEATURED PRODUCTS ===================== -->
<section class="section wow fadeInUp new-arriavls">
	<h3 class="section-title">New Arrivals</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
	    	
		@foreach ($products as $product)
			<div class="item item-carousel">
				<div class="products">
						
					@include('components.product.product',['product'=>$product])
				</div><!-- /.products -->
			</div><!-- /.item -->
		@endforeach
	</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ===================== FEATURED PRODUCTS : END ===================== -->

		</div><!-- /.homebanner-holder -->
		<!-- ===================== CONTENT : END ===================== -->
	</div><!-- /.row -->
	<!-- ===================== BRANDS CAROUSEL ===================== -->
	@include('frontend.inc.brand-carousel',['brands'=>$brands])
<!-- ===================== BRANDS CAROUSEL : END ===================== -->
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->

@endsection
@section('scripts')
	
<script type="text/javascript">
		
		
	</script>
@endsection