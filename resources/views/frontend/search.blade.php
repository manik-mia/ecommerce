@extends('layouts.frontend-layout')
@section('title','Flipmart premium HTML5 & CSS3 Template')
@section('category','active')
@section('content')
 
<div class="body-content outer-top-xs" id="top-banner-and-menu">

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Handbags</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row'>
			<div class='col-md-3 sidebar'>
	            <!-- ===================== TOP NAVIGATION ================ -->
                @include('components.side-nav')
                <!-- ============= TOP NAVIGATION : END =========== -->	            
                <div class="sidebar-module-container">
	            	
	            	<div class="sidebar-filter">
		            	<!-- ============================================== SIDEBAR CATEGORY ============================================== -->
<div class="sidebar-widget wow fadeInUp">
<h3 class="section-title">shop by</h3>
	<div class="widget-header">
		<h4 class="widget-title">Category</h4>
	</div>
	<div class="sidebar-widget-body">
		<div class="accordion">
            @foreach ($categories as $category)
                
	    	<div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="#collapse-{{$category->id}}" data-toggle="collapse" class="accordion-toggle collapsed">
	                   {{session()->get('language')=='bangla' ? $category->category_name_bn : $category->category_name_en}}
	                </a>
	            </div><!-- /.accordion-heading -->
                
	            <div class="accordion-body collapse" id="collapse-{{$category->id}}" style="height: 0px;">
	                <div class="accordion-inner">
	                    <ul>
                            @foreach ($subCategories as $subCategory)
                            
                            @if ($subCategory->category_id==$category->id)
	                        <li>
                                <a href="#">{{session()->get('language')=='bangla' ? $subCategory->subcategory_name_bn : $subCategory->subcategory_name_en}}</a>
                
                            </li>
                            @endif
                            @endforeach
	                    </ul>
	                </div><!-- /.accordion-inner -->
	            </div><!-- /.accordion-body -->
	        </div><!-- /.accordion-group -->

            @endforeach
	    </div><!-- /.accordion -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

		            	<!-- ============================================== PRICE SILDER============================================== -->
<div class="sidebar-widget wow fadeInUp">
	<div class="widget-header">
		<h4 class="widget-title">Price Slider</h4>
	</div>
	<div class="sidebar-widget-body m-t-10">
		<div class="price-range-holder">
      	    <span class="min-max">
                 <span class="pull-left">$200.00</span>
                 <span class="pull-right">$800.00</span>
            </span>
            <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">

            <input type="text" class="price-slider" value="" >
   
        </div><!-- /.price-range-holder -->
        <a href="#" class="lnk btn btn-primary">Show Now</a>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== PRICE SILDER : END ============================================== -->

<!-- <!-- ============================================== Testimonials============================================== -->
@include('frontend.inc.testimonial')
    
<!-- ============================================== Testimonials: END ============================================== -->


	            	</div><!-- /.sidebar-filter -->
	            </div><!-- /.sidebar-module-container -->
            </div><!-- /.sidebar -->
			<div class='col-md-9'>
			
<div class="clearfix filters-container m-t-10">
	<div class="row">
		<div class="col col-sm-6 col-md-2">
			<div class="filter-tabs">
				<ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
					<li class="active">
						<a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a>
					</li>
					<li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
				</ul>
			</div><!-- /.filter-tabs -->
		</div><!-- /.col -->
		<div class="col col-sm-12 col-md-6">
			<div class="col col-sm-3 col-md-6 no-padding">
				<div class="lbl-cnt">
					<span class="lbl">Sort by</span>
					<div class="fld inline">
						<div class="dropdown dropdown-small dropdown-med dropdown-white inline">
							<button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
								Position <span class="caret"></span>
							</button>

							<ul role="menu" class="dropdown-menu">
								<li role="presentation"><a href="#">position</a></li>
								<li role="presentation"><a href="#">Price:Lowest first</a></li>
								<li role="presentation"><a href="#">Price:HIghest first</a></li>
								<li role="presentation"><a href="#">Product Name:A to Z</a></li>
							</ul>
						</div>
					</div><!-- /.fld -->
				</div><!-- /.lbl-cnt -->
			</div><!-- /.col -->
			<div class="col col-sm-3 col-md-6 no-padding">
				<div class="lbl-cnt">
					<span class="lbl">Show</span>
					<div class="fld inline">
						<div class="dropdown dropdown-small dropdown-med dropdown-white inline">
							<button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
								1 <span class="caret"></span>
							</button>

							<ul role="menu" class="dropdown-menu">
								<li role="presentation"><a href="#">1</a></li>
								<li role="presentation"><a href="#">2</a></li>
								<li role="presentation"><a href="#">3</a></li>
								<li role="presentation"><a href="#">4</a></li>
								<li role="presentation"><a href="#">5</a></li>
								<li role="presentation"><a href="#">6</a></li>
								<li role="presentation"><a href="#">7</a></li>
								<li role="presentation"><a href="#">8</a></li>
								<li role="presentation"><a href="#">9</a></li>
								<li role="presentation"><a href="#">10</a></li>
							</ul>
						</div>
					</div><!-- /.fld -->
				</div><!-- /.lbl-cnt -->
			</div><!-- /.col -->
		</div><!-- /.col -->
		<div class="col col-sm-6 col-md-4 text-right">
			<div class="pagination-container">
				<ul class="list-inline list-unstyled">
					<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
					<li><a href="#">1</a></li>	
					<li class="active"><a href="#">2</a></li>	
					<li><a href="#">3</a></li>	
					<li><a href="#">4</a></li>	
					<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
				</ul><!-- /.list-inline -->
			</div><!-- /.pagination-container -->		
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
			<div class="search-result-container ">
				<div id="myTabContent" class="tab-content category-list">
					<div class="tab-pane active " id="grid-container">
						<div class="category-product">
							<div class="row">									
										
							@foreach ($products as $product)			
								<div class="col-sm-6 col-md-4 wow fadeInUp">
									<div class="products">
										
										@include('components.product.product',['product'=>$product])
							
									</div><!-- /.products -->
								</div><!-- /.item -->
				
							@endforeach
				
							</div><!-- /.row -->
						</div><!-- /.category-product -->
									
					</div><!-- /.tab-pane -->
										
					<div class="tab-pane "  id="list-container">
						<div class="category-product">
							@foreach ($products as $product)				
							<div class="category-product-inner wow fadeInUp">
								<div class="products">				
									<div class="product-list product">
										<div class="row product-list-row">
											<div class="col col-sm-4 col-lg-4">
												<div class="product-image">
													<div class="image">
														@if(session()->get('language')==='bangla')
														<a href="{{route('product.detail',['id'=>$product->id,'slug'=>$product->product_slug_en])}}">
															<img src="{{asset($product->product_thumbnail)}}" alt="{{$product->product_name_bn}}">
														</a>
														@else
														<a href="{{route('product.detail',['id'=>$product->id,'slug'=>$product->product_slug_en])}}">
															<img src="{{asset($product->product_thumbnail)}}" alt="{{$product->product_name_en}}">
														</a>
														@endif
													</div><!-- /.image -->
												</div><!-- /.product-image -->
											</div><!-- /.col -->
											<div class="col col-sm-8 col-lg-8">
												<div class="product-info">
													<h3 class="name">
														@if(session()->get('language')==='bangla')
														<a href="{{route('product.detail',['id'=>$product->id,'slug'=>$product->product_slug_en])}}">
															{{$product->product_name_bn}}
														</a>
														@else
														<a href="{{route('product.detail',['id'=>$product->id,'slug'=>$product->product_slug_en])}}">
															{{$product->product_name_en}}
														</a>
														@endif
													</h3>
													<div class="rating rateit-small"></div>
													<div class="product-price">
														@if ($product->discount==null)
															<span class="price">
																@if (session()->get('language')==='bangla')
																	৳{{toBanglaNumber($product->discount_price)}}
																@else
																	৳{{$product->discount_price}}
																@endif
															</span>
														@else
															<span class="price"> 
																@if (session()->get('language')==='bangla')
																	৳{{toBanglaNumber($product->discount_price)}}
																@else
																	৳{{$product->discount_price}}
																@endif	
															</span>
															<span class="price-before-discount">
																@if (session()->get('language')==='bangla')
																	৳{{toBanglaNumber($product->selling_price)}}
																@else
																	৳{{$product->selling_price}}
																@endif
																
															</span>
														@endif
																	
													</div><!-- /.product-price -->
													<div class="description m-t-10">
														@if (session()->get('language')=='bangla')
															{!! $product->short_desc_bn!!}
														@else
															{!!$product->short_desc_en!!}
														@endif
													</div>
													<div class="cart clearfix animate-effect">
														<div class="action">
															<ul class="list-unstyled">
																<li class="add-cart-button btn-group">
																	<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																		<i class="fa fa-shopping-cart"></i>
																	</button>
																	<button class="btn btn-primary cart-btn" type="button">
																		@if(session()->get('language')==='bangla')
																			কার্টে যুক্ত করুন 
																		@else
																			Add to Cart
																		@endif
																	</button>
																							
																</li>
															
																<li class="lnk wishlist">
																	<a class="add-to-cart" href="detail.html" title="Wishlist">
																		<i class="icon fa fa-heart"></i>
																	</a>
																</li>

																<li class="lnk">
																	<a class="add-to-cart" href="detail.html" title="Compare">
																		<i class="fa fa-signal"></i>
																	</a>
																</li>
															</ul>
														</div><!-- /.action -->
													</div><!-- /.cart -->
																	
												</div><!-- /.product-info -->	
											</div><!-- /.col -->
										</div><!-- /.product-list-row -->
											@if ($product->discount==null)
												<div class="tag new">
													<span>
														@if (session()->get('language')==='bangla')
															নতুন
														@else
															new
														@endif
													</span>
												</div>  
											@else
											<div class="tag hot">
												<span>
													@if (session()->get('language')==='bangla')
														{{toBanglaNumber($product->discount)}}%
													@else
														{{$product->discount}}%
													@endif
												</span>
											</div> 
										@endif   
									</div><!-- /.product-list -->
								</div><!-- /.products -->
							</div><!-- /.category-product-inner -->
					
							@endforeach
											
						</div><!-- /.category-product -->
				</div><!-- /.tab-pane #list-container -->
			</div><!-- /.tab-content -->
			<div class="clearfix filters-container">
									
				<div class="text-right">
					<div class="pagination-container">
						<ul class="list-inline list-unstyled">
							<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
							<li><a href="#">1</a></li>	
							<li class="active"><a href="#">2</a></li>	
							<li><a href="#">3</a></li>	
							<li><a href="#">4</a></li>	
							<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
						</ul><!-- /.list-inline -->
					</div><!-- /.pagination-container -->						   

				</div><!-- /.text-right -->
							
			</div><!-- /.filters-container -->

		</div><!-- /.search-result-container -->

	</div><!-- /.col -->
</div><!-- /.row -->
		<!-- ================ BRANDS CAROUSEL ================== -->

	<!-- ===================== BRANDS CAROUSEL ===================== -->
	<div id="brands-carousel" class="logo-slider wow fadeInUp">

		
		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
	{{-- @include('frontend.inc.brand-carousel',['brands'=>$brands]) --}}
<!-- ===================== BRANDS CAROUSEL : END ===================== -->
	</div><!-- /.container -->

</div><!-- /.body-content -->



@endsection