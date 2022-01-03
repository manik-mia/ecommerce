<header class="header-style-1">
	<!-- ===== TOP MENU ============ -->
<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">
					<li>
						<a href="{{route('user.wishlist.view')}}"><i class="icon fa fa-heart"></i>
							@if (Session::get('language')=='bangla')	
								উইশলিস্ট
							@else
								Wishlist
							@endif
						</a>
					</li>
					<li>
						<a href="{{route('user.cart.index')}}"><i class="icon fa fa-shopping-cart"></i>
							@if (Session::get('language')=='bangla')	
								আমার কার্ট
							@else
								My Cart
							@endif
						</a>
					</li>
					<li>
						<a href="{{route('user.checkout')}}" id="checkout"><i class="icon fa fa-check"></i>
							@if (Session::get('language')=='bangla')	
								চেকআউট
							@else
								CheckOut
							@endif
						</a>
					</li>
					@auth
					<li>
						<a href="{{route('user.dashboard')}}" target="_blank"><i class="icon fa fa-user"></i>
							@if (Session::get('language')=='bangla')	
								আমার অ্যাকাউন্ট
							@else
								My Account
							@endif
						</a>
					</li>
						@else
						<li>
							<a href="{{route('login')}}"><i class="icon fa fa-lock"></i>
							@if (Session::get('language')=='bangla')	
								লগিন
							@else
								Login
							@endif
							</a>
						</li>
						<li>
							<a href="{{route('register')}}"><i class="icon fa fa-lock"></i>
							@if (Session::get('language')=='bangla')	
								রেজিস্টার
							@else
								Register
							@endif
							</a>
						</li>
					@endauth
				</ul>
			</div><!-- /.cnt-account -->

			<div class="cnt-block">
				<ul class="list-unstyled list-inline">

					<li class="dropdown dropdown-small">
						@if (Session::get('language')=='bangla')	
							<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">ভাষা পরিবর্তন করুন </span><b class="caret"></b></a>
						@else
							<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">Change Language </span><b class="caret"></b></a>
						@endif
						
						<ul class="dropdown-menu">
							@if (Session::get('language')=='bangla')	
								<li><a href="{{route('language.english')}}">English</a></li>
							@else
								<li><a href="{{route('language.bangla')}}">বাংলা</a></li>
							@endif
						</ul>
					</li>
				</ul><!-- /.list-unstyled -->
			</div><!-- /.cnt-cart -->
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->
<!-- ===================== TOP MENU : END ==================== -->
	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-2 logo-holder">
					<!-- ==================== LOGO ================= -->
					<div class="logo">
						<a href="{{url('/')}}">	
							<img src="/assets/frontend/images/logo.png" alt="">
						</a>
					</div><!-- /.logo -->
					<!-- ======== LOGO : END ===== -->					
				</div><!-- /.logo-holder -->

				<div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
					<!-- /.contact-row -->
					<!-- ================ SEARCH AREA ===================== -->
					<div class="search-area">
						<form action="{{route('product.search')}}" method="GET">
							@csrf
							<div class="control-group">
								<input class="search-field" name="search" placeholder="Search here..." />
								<button class="search-button" type="submit" ></button>
							</div>
						</form>
					</div><!-- /.search-area -->
					<!-- =========== SEARCH AREA : END ============= -->	</div><!-- /.top-search-holder -->

				<div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
					<!-- ==== SHOPPING CART DROPDOWN ======= -->

	<div class="dropdown dropdown-cart">
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
			<div class="items-cart-inner">
            <div class="basket">
					<i class="glyphicon glyphicon-shopping-cart"></i>
				</div>
				<div class="basket-item-count"><span class="count" id="count"></span></div>
				<div class="total-price-basket">
					<span class="lbl">cart -</span>
					<span class="total-price">
						<span class="sign">৳</span><span class="value total" id="total"></span>
					</span>
				</div>
				
			
		    </div>
		</a>
		<ul class="dropdown-menu">
			<li id="mini-cart-list">
				<div class="cart-item product-summary" id="mini-cart">
					
				</div><!-- /.cart-item -->
				<div class="clearfix"></div>
		
				<div class="clearfix cart-total">
					<div class="pull-right">
						
							<span class="text">Sub Total :</span><span class='price total'>৳</span>
							
					</div>
					<div class="clearfix"></div>
						
					<a href="{{route('user.checkout')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>	
				</div><!-- /.cart-total-->
					
				
			</li>
		</ul><!-- /.dropdown-menu-->
	</div><!-- /.dropdown-cart -->

<!-- ======= SHOPPING CART DROPDOWN : END======= -->				</div><!-- /.top-cart-row -->
			</div><!-- /.row -->

		</div><!-- /.container -->

	</div><!-- /.main-header -->

	<!-- ===================== NAVBAR ===================== -->
<div class="header-nav animate-dropdown">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
	<div class="nav-outer">
		<ul class="nav navbar-nav">
			<li class="@yield('home') yamm-fw">
				<a href="{{url('/')}}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{session()->get('language')=='bangla'?'হোম':'Home'}}</a>
				
			</li>
			@foreach ($categories as $category)
			<li class="dropdown yamm mega-menu @yield($category->category_name_en)">
				<a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
					@if (session()->get('language')=='bangla')
						{{$category->category_name_bn}}
					@else
						{{$category->category_name_en}}
					@endif
				</a>
                <ul class="dropdown-menu container">
					
					<li>
               			<div class="yamm-content ">
            				<div class="row">
								@foreach ($subCategories as $subCategory)
								@if ($category->id===$subCategory->category_id)
								<div class="col-xs-12 col-sm-6 col-md-2 col-menu">
									<h2 class="title">
										<a href="{{route('product.category',['id'=>$subCategory->id,'slug'=>$subCategory->subcategory_slug_en])}}">
											@if (session()->get('language')=='bangla')
												{{$subCategory->subcategory_name_bn}}
											@else
												{{$subCategory->subcategory_name_en}}
											@endif
										</a>
									</h2>
									<ul class="links">
										@foreach ($subSubCategories as $subSubCategory)
											@if ($subCategory->id===$subSubCategory->subcategory_id)
												@if (session()->get('language')=='bangla')
													<li><a href="{{route('product.subSubCategory',['id'=>$subSubCategory->id,'slug'=>$subSubCategory->subsubcategory_slug_en])}}">{{$subSubCategory->subsubcategory_name_bn}}</a></li>
												@else
													<li><a href="{{route('product.subSubCategory',['id'=>$subSubCategory->id,'slug'=>$subSubCategory->subsubcategory_slug_en])}}">{{$subSubCategory->subsubcategory_name_en}}</a></li>
												@endif
											@endif
										@endforeach
									</ul>
                    			</div><!-- /.col -->
								
								@endif
								@endforeach					
							</div>
						</div>

					</li>
				</ul>
				
			</li>
			@endforeach
             <li class="dropdown  navbar-right special-menu">
				<a href="#">Todays offer</a>
			</li>
		</ul><!-- /.navbar-nav -->
		<div class="clearfix"></div>				
	</div><!-- /.nav-outer -->
</div><!-- /.navbar-collapse -->


            </div><!-- /.nav-bg-class -->
        </div><!-- /.navbar-default -->
    </div><!-- /.container-class -->

</div><!-- /.header-nav -->
<!-- ======== NAVBAR : END ============== -->

</header>