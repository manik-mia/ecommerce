<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function create( Request $request, $id )
    {
        WishList::insert( [
            'user_id'    => Auth::id(),
            'product_id' => $request->id,
        ] );
        return response()->json( 'Product Added on your Wishlist Successfully' );

    }
    public function index()
    {
        $wishlists = WishList::with( 'product' )->latest()->get();
        $brands    = Brand::orderBy( 'brand_name_en', 'ASC' )->get();
        return view( 'user.wishlist', compact( 'brands', 'wishlists' ) );
    }
    public function delete( $id )
    {
        WishList::where( 'user_id', Auth::id() )->where( 'product_id', $id )->delete();
        return response()->json( 'Product Successfully removed from your wishlist' );
    }
}
