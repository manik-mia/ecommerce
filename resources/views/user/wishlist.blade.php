@extends('layouts.frontend-layout')
@section('title',"Wishlist Page")
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">{{session()->get('language')=='bangla' ? "হোম" : 'Home'}}</a></li>
				<li class='active'><a href="">{{session()->get('language')=='bangla' ? "উইশলিস্ট" : 'WishList'}}</a></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4" class="heading-title">My Wishlist</th>
				</tr>
			</thead>
			<tbody>
                @forelse ($wishlists as $wishlist)
                    
				<tr>
					<td class="col-md-2"><img src="{{asset($wishlist->product->product_thumbnail)}}" alt="{{$wishlist->product->product_name_en}}"></td>
					<td class="col-md-7">
						<div class="product-name"><a href="{{route('product.detail',['id'=>$wishlist->product->id,'slug'=>$wishlist->product->product_slug_en])}}">{{$wishlist->product->product_name_en}}</a></div>
						<div class="rating">
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star non-rate"></i>
							<span class="review">( 06 Reviews )</span>
						</div>
                        @if ($wishlist->product->discount==null)
                        <div class="price">
							<span>৳ {{$wishlist->product->selling_price}}</span>
						</div> 
                        @else
                        <div class="price">
							৳ {{$wishlist->product->discount_price}}
							<span>৳ {{$wishlist->product->selling_price}}</span>
						</div> 
                        @endif
						
					</td>
					<td class="col-md-2">
						<input type="hidden" name="product_id" id="product-id" class="product-id" value="{{$wishlist->product->id}}">
						<button type="button" class="btn-upper btn btn-primary" onclick="addToCart()">Add to cart</button>
					</td>
					<td class="col-md-1 close-btn">
						<button type="submit" class="btn btn-danger" onclick="removeWishlist({{$wishlist->product->id}})" ><i class="fa fa-times"></i></button>
					</td>
				</tr>
                
                @empty
                    Your WishList is Empty
                @endforelse
			</tbody>
		</table>
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		@include('frontend.inc.brand-carousel',['brands'=>$brands])
<!-- ======= BRANDS CAROUSEL : END=========== -->	
	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
@section('scripts')
    <script type="text/javascript">
        function removeWishlist(id) {
            
            axios.get("/user/wishlist/remove-product/"+id)
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
						text:'Porduct Remove Fail!!',
					})
				}
            })
            .catch(function (error) {
                
            })
        }

    </script>
@endsection