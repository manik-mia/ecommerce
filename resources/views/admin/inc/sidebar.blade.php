<div class="sl-sideleft">

  <div class="sl-sideleft-menu">
    <a href="{{route('admin.dashboard')}}" class="sl-menu-link @yield('dashboard')">
      <div class="sl-menu-item">
        <i class="menu-item-icon fa fa-dashboard tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <a href="{{url('/')}}" class="sl-menu-link" target="_blank">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Visit Site</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    
    <a href="{{route('admin.brand')}}" class="sl-menu-link @yield('brand')">
      <div class="sl-menu-item">
        <i class="menu-item-icon fa fa-gg tx-22"></i>
        <span class="menu-item-label">{{__('Brand')}}</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    
    <a href="#" class="sl-menu-link @yield('product')">
      <div class="sl-menu-item">
        <i class="menu-item-icon fa fa-product-hunt tx-20"></i>
        <span class="menu-item-label">Products</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{route('products.all')}}" class="nav-link @yield('all')">All Products</a></li>
      <li class="nav-item"><a href="{{route('product.create')}}" class="nav-link @yield('add-new')">Add New Product</a></li>
    </ul>

    <a href="#" class="sl-menu-link @yield('slider')">
      <div class="sl-menu-item">
        <i class="menu-item-icon fa fa-image tx-20"></i>
        <span class="menu-item-label">Slider</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{route('slider.index')}}" class="nav-link @yield('all-slides')">All Slides</a></li>
      <li class="nav-item"><a href="{{route('slider.create')}}" class="nav-link @yield('add-slide')">Add New Slide</a></li>
    </ul>

    <a href="#" class="sl-menu-link @yield('category')">
      <div class="sl-menu-item">
        <i class="menu-item-icon fa fa-tag tx-20"></i>
        <span class="menu-item-label">Category</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{route('admin.category')}}" class="nav-link @yield('all-category')">Categories</a></li>
      <li class="nav-item"><a href="{{route('admin.subCategory')}}" class="nav-link @yield('all-subcategory')">Sub Categories</a></li>
      <li class="nav-item"><a href="{{route('admin.subSubCategory')}}" class="nav-link @yield('all-subsubcategory')">Sub Sub Categories</a></li>
    </ul>
    <a href="#" class="sl-menu-link @yield('shipping-area')">
      <div class="sl-menu-item">
        <i class="menu-item-icon fa fa-tag tx-20"></i>
        <span class="menu-item-label">Shipping Area</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{route('shipping.division')}}" class="nav-link @yield('division')">Divisions</a></li>
      <li class="nav-item"><a href="{{route('shipping.district')}}" class="nav-link @yield('district')">Districts</a></li>
      <li class="nav-item"><a href="{{route('shipping.state')}}" class="nav-link @yield('state')">States</a></li>
    </ul>
    <a href="#" class="sl-menu-link @yield('order')">
      <div class="sl-menu-item">
        <i class="menu-item-icon fa fa-tag tx-20"></i>
        <span class="menu-item-label">Orders</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{route('admin.order.all')}}" class="nav-link @yield('order-all')">Pending Orders</a></li>
      <li class="nav-item"><a href="{{route('admin.order.confirmed')}}" class="nav-link @yield('confirmed')">Confirmed Orders</a></li>
      <li class="nav-item"><a href="{{route('admin.order.processed')}}" class="nav-link @yield('processing')">Processing Orders</a></li>
      <li class="nav-item"><a href="{{route('admin.order.shipped')}}" class="nav-link @yield('shipped')">Shipped Orders</a></li>
      <li class="nav-item"><a href="{{route('admin.order.picked')}}" class="nav-link @yield('picked')">Picked Orders</a></li>
      <li class="nav-item"><a href="{{route('admin.order.delievered')}}" class="nav-link @yield('delievered')">Delievered Orders</a></li>
      <li class="nav-item"><a href="{{route('admin.order.canceled')}}" class="nav-link @yield('canceled')">Canceled Orders</a></li>
      <li class="nav-item"><a href="{{route('admin.order.returned')}}" class="nav-link @yield('returned')">Returned Orders</a></li>
    </ul>
    <a href="{{route('admin.coupon')}}" class="sl-menu-link @yield('coupon')">
      <div class="sl-menu-item">
        <i class="menu-item-icon fa fa-gg tx-22"></i>
        <span class="menu-item-label">{{__('Coupon')}}</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <a href="{{route('admin.user.all')}}" class="sl-menu-link @yield('user')">
      <div class="sl-menu-item">
        <i class="menu-item-icon fa fa-user tx-22"></i>
        <span class="menu-item-label">{{__('User')}}</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <a href="{{route('admin.review.all')}}" class="sl-menu-link @yield('review')">
      <div class="sl-menu-item">
        <i class="menu-item-icon fa fa-user tx-22"></i>
        <span class="menu-item-label">{{__('Reviews')}}</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->

  </div><!-- sl-sideleft-menu -->

  <br>
</div><!-- sl-sideleft -->