@extends('layouts.frontend-layout')
@section('title',"$singleProduct->product_name_en")
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">{{session()->get('language')=='bangla' ? "হোম" : 'Home'}}</a></li>
				<li class='active'><a href="#">{{session()->get('language')=='bangla' ? $singleProduct->product_name_bn : $singleProduct->product_name_en}}</a></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
    
    				<!-- ============= HOT DEALS =========== -->
					<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
						<h3 class="section-title">{{session()->get('language')=='bangla' ? 'ধামাকা অফার':'hot deals'}}</h3>
						<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
							@foreach ($hotDeals as $product)
								@include('components.hot-deal.hot-deal',['product'=>$product])
							@endforeach
						</div><!-- /.sidebar-widget -->
					</div>

<!-- ============================================== NEWSLETTER ============================================== -->
					<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
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
<!-- ========== NEWSLETTER: END ================== -->

<!-- ================= Testimonials======================= -->
<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
	<div id="advertisement" class="advertisement">
        <div class="item">
            <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
		<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

         <div class="item">
         	<div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
		<div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>    
        </div><!-- /.item -->

        <div class="item">
            <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
		<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

    </div><!-- /.owl-carousel -->
</div>
    
<!--========= Testimonials: END ======== -->

 

				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                        <div class="product-item-holder size-big single-product-gallery small-gallery">

                            <div id="owl-single-product">
                                
                                @foreach ($singleProduct->images as $image)
                                <div class="single-product-gallery-item" id="slide{{$image->id}}">
                                    <a data-lightbox="image-{{$image->id}}" data-title="Gallery" href="{{asset($image->product_image_name)}}">
                                        <img class="img-responsive" alt="{{$singleProduct->product_name_en}}" src="{{asset($image->product_image_name)}}" data-echo="{{asset($image->product_image_name)}}" />
                                    </a>
                                </div><!-- /.single-product-gallery-item -->

                                @endforeach
                                

                            </div><!-- /.single-product-slider -->


                            <div class="single-product-gallery-thumbs gallery-thumbs">

                                <div id="owl-single-product-thumbnails">
                                    @foreach ($singleProduct->images as $image)
                                        
                                    <div class="item">
                                        <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="{{$image->id}}" href="#slide{{$image->id}}">
                                            <img class="img-responsive" width="85" alt="{{$singleProduct->product_name_en}}" src="{{asset($image->product_image_name)}}" data-echo="{{asset($image->product_image_name)}}" />
                                        </a>
                                    </div>

                                    @endforeach
                               
                                </div><!-- /#owl-single-product-thumbnails -->

                                

                            </div><!-- /.gallery-thumbs -->

                        </div><!-- /.single-product-gallery -->
                    </div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name">{{session()->get('language')=='bangla' ? $singleProduct->product_name_bn : $singleProduct->product_name_en}}</h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										@for ($i=1;$i<=5;$i++)
											<i style="color: #ffc808" class="glyphicon glyphicon-star{{($i<=$rating) ? '' : '-empty'}}"></i>
										@endfor
										<h4>{{$rating}} out of 5</h4>
									</div>
									<div class="col-sm-8">
										<div class="reviews">
											<a href="#" class="lnk">({{count($reviews)}} Reviews)</a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">
												{{session()->get('language')=='bangla'? 'Availability :':'Availability :'}}
											</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											@if ($singleProduct->product_quantity_en!=null)
											<span class="value">{{session()->get('language')=='bangla'? 'Availability :':'In Stock'}}</span>
											@else
												<span class="value">{{session()->get('language')=='bangla'? 'Availability :':'Out Of Stack Stock'}}</span>
											@endif
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
								{!!session()->get('language')=='bangla' ? $singleProduct->short_desc_bn : $singleProduct->short_desc_en!!}
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											<span class="price">৳{{session()->get('language')=='bangla' ? toBanglaNumber($singleProduct->discount_price) : $singleProduct->discount_price}}</span>
											<span class="price-strike">৳{{session()->get('language')=='bangla' ? toBanglaNumber($singleProduct->selling_price) : $singleProduct->selling_price}}</span>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
											   <i class="fa fa-signal"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->

							<div class="quantity-container info-container">
								<div class="row">
									<div class="col-md-6">
										@if (session()->get('language')==='bangla')
											<div class="form-group">
												<label for="color" class="label">রঙ নির্বাচন করুন:</label>
												<select name="color" class=" form-control color" id="color">
													@foreach ($productColorBn as $color)
														<option value="{{$color}}">{{$color}}</option>
													@endforeach
												</select>
											</div>
										@else
											<div class="form-group">
												<label for="color" class="label">Select Color:</label>
												<select name="color" class=" form-control color" id="color">
													@foreach ($productColorEn as $color)
														<option value="{{$color}}">{{$color}}</option>
													@endforeach
												</select>
											</div>
										@endif
									</div>
									<div class="col-md-6">
										@if (session()->get('language')==='bangla')
											<div class="form-group">
												<label for="size" class="label">সাইজ নির্বাচন করুন:</label>
												<select name="size" class=" form-control size" id="size">
													@foreach ($productSizeBn as $size)
														<option value="{{$size}}">{{$size}}</option>
													@endforeach
												</select>
											</div>
										@else
											<div class="form-group">
												<label for="size" class="label">Select Size:</label>
												<select name="size" class=" form-control size" id="size">
													@foreach ($productSizeEn as $size)
														<option value="{{$size}}">{{$size}}</option>
													@endforeach
												</select>
											</div>
										@endif
									</div>
								</div>
								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">
											{{session()->get('language')=='bangla'? 'পরিমান  ঃ': 'Qty:'}}
                                        </span>
									</div>
									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                <input type="text" value="1" min="1" class="quantity">
							              </div>
							            </div>
									</div>

									<div class="col-sm-7">
										<input type="hidden" name="product_id" id="product-id" class="product-id" value="{{$singleProduct->id}}">
										<button type="submit" class="btn btn-primary" onclick="addToCart()"><i class="fa fa-shopping-cart inner-right-vs"></i> {{session()->get('language')=='bangla' ? 'কার্টে যুক্ত করুন' : 'ADD TO CART'}}</button>
									</div>

									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->
							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">{{session()->get('language')=='bangla' ? 'বর্ণনা': 'DESCRIPTION'}}</a></li>
								<li><a data-toggle="tab" href="#review">{{session()->get('language')=='bangla' ? 'মতামত': 'REVIEW'}}</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">
                                            @if (session()->get('language')==='bangla')
                                                {!!$singleProduct->full_desc_bn!!}
                                            @else
                                                {!!$singleProduct->full_desc_en!!}
                                            @endif
                                        </p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>

											<div class="reviews">
												@foreach ($reviews as $review)
													
													<div class="review">
														<div class="review-title">
															<span class="summary">{{$review->user->name}}</span>
															<span class="date"><i class="fa fa-calendar"></i><span>{{$review->created_at->diffForHumans()}}</span></span>
														</div>
														<div class="text">"{{$review->comment}}"</div>
													</div>
											
												@endforeach
											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

								<div id="tags" class="tab-pane">
									<div class="product-tag">
										
										<h4 class="title">Product Tags</h4>
										<form role="form" class="form-inline form-cnt">
											<div class="form-container">
									
												<div class="form-group">
													<label for="exampleInputTag">Add Your Tags: </label>
													<input type="email" id="exampleInputTag" class="form-control txt">
													

												</div>

												<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
											</div><!-- /.form-container -->
										</form><!-- /.form-cnt -->

										<form role="form" class="form-inline form-cnt">
											<div class="form-group">
												<label>&nbsp;</label>
												<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
											</div>
										</form><!-- /.form-cnt -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">upsell products</h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
	    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="assets/images/products/p1.jpg" alt=""></a>
			</div><!-- /.image -->			

			            <div class="tag sale"><span>sale</span></div>            		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$650.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
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
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="assets/images/products/p2.jpg" alt=""></a>
			</div><!-- /.image -->			

			            <div class="tag sale"><span>sale</span></div>            		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$650.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
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
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="assets/images/products/p3.jpg" alt=""></a>
			</div><!-- /.image -->			

			                        <div class="tag hot"><span>hot</span></div>		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$650.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
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
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="assets/images/products/p4.jpg" alt=""></a>
			</div><!-- /.image -->			

			<div class="tag new"><span>new</span></div>                        		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$650.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
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
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="assets/images/blank.gif" data-echo="assets/images/products/p5.jpg" alt=""></a>
			</div><!-- /.image -->			

			                        <div class="tag hot"><span>hot</span></div>		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$650.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
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
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.html"><img  src="assets/images/blank.gif" data-echo="assets/images/products/p6.jpg" alt=""></a>
			</div><!-- /.image -->			

			<div class="tag new"><span>new</span></div>                        		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$650.99				</span>
										     <span class="price-before-discount">$ 800</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
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
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		@include('frontend.inc.brand-carousel',['brands'=>$brands])
<!-- ======= BRANDS CAROUSEL : END=========== -->	
	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection