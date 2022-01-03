<div class="product">		
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
    </div><!-- /.product-image -->


    <div class="product-info text-left">
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
        <div class="rating" style="color: #ffc808">
            @php
                
                $rating=$product->reviews->avg('rating')
            @endphp
            @for ($i=1;$i<=5;$i++)
                <i class="glyphicon glyphicon-star{{$i<=$rating ? '' : '-empty'}}"></i>
            @endfor
        </div>
        <div class="description"></div>

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

    </div><!-- /.product-info -->
    <div class="cart clearfix animate-effect">
        <div class="action">
            <ul class="list-unstyled">
                <li class="add-cart-button btn-group">
                    <button data-toggle="modal" id="product-view" onclick="viewProduct({{$product->id}})" data-target="#view-product-modal" class="btn btn-primary icon" type="button" title="View Product">
                        <i class="fa fa-eye"></i>													
                    </button>
                    
                    <button class="btn btn-primary cart-btn" type="button">
                        @if(session()->get('language')==='bangla')
                            কার্টে যুক্ত করুন 
                        @else
                            Add to Cart
                        @endif
                    </button>
                                            
                </li>
               
                <li>
                    <input type="hidden" name="wishlist_add" value="{{$product->id}}">
                    {{-- <a href="#" data-toggle="tooltip" class="add-to-cart add-to-wishlist" title="" data-original-title="Wishlist">
                         <i class="icon fa fa-heart"></i>
                    </a> --}}
                    <button onclick="addToWishList({{$product->id}})" data-toggle="tooltip" class="btn add-to-wishlist" title="" data-original-title="Wishlist">
                         <i class="icon fa fa-heart"></i>
                    </button>
                </li>

                <li>
                    <button data-toggle="tooltip" class="btn compare" title="" data-original-title="Compare">
                        <i class="icon fa fa-signal"></i>
                    </button>
                </li>
            </ul>
        </div><!-- /.action -->
    </div><!-- /.cart -->
</div><!-- /.product -->