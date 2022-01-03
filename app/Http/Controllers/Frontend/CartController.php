<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    //Mini Cart Start

    //Product Add To Mini Cart
    public function addToCard( Request $request, $id )
    {
        if ( Session::has( 'coupon' ) )
        {
            Session::forget( 'coupon' );
        }
        $product     = Product::findOrFail( $id );
        $color       = $request->color;
        $size        = $request->size;
        $quantity    = $request->quantity;
        $productName = $product->product_name_en;

        if ( $product->discount == null )
        {
            Cart::add( [
                'id'      => $id,
                'name'    => $product->product_name_en,
                'qty'     => $quantity,
                'weight'  => 0,
                'price'   => $product->selling_price,
                'options' => [
                    'size'  => $size,
                    'color' => $color,
                    'image' => $product->product_thumbnail,
                ],
            ] );
            return response()->json( $productName );
        }
        else
        {
            Cart::add( [
                'id'      => $id,
                'name'    => $product->product_name_en,
                'qty'     => $quantity,
                'weight'  => 0,
                'price'   => $product->discount_price,
                'options' => [
                    'size'  => $size,
                    'color' => $color,
                    'image' => $product->product_thumbnail,
                ],
            ] );
            return response()->json( $productName );
        }

    }
    //View Mini Cart Products
    public function viewCart()
    {
        $products = Cart::content();
        $qty      = Cart::count();
        $total    = Cart::total();
        return response()->json( [
            'products' => $products,
            'qty'      => $qty,
            'total'    => $total,
        ] );
    }

    //Remove Product From Mini Cart
    public function removeFromCart( $rowId )
    {

        Cart::remove( $rowId );
        if ( Session::has( 'coupon' ) )
        {
            Session::forget( 'coupon' );
        }
        return response()->json( 'Product Remove From Your Cart' );

    }
    //Mini Cart End

    //Main Cart start
    public function index()
    {

        $brands = Brand::orderBy( 'brand_name_en', 'ASC' )->get();
        return view( 'user.cart', compact( 'brands' ) );

    }

    //Apply Coupon
    public function applyCoupon( Request $request )
    {
        $couponCode = $request->coupon_code;
        $coupon     = Coupon::where( 'coupon_code', $couponCode )->first();

        if ( $coupon )
        {
            if ( $coupon->validity >= Carbon::now()->format( 'Y-m-d' ) )
            {
                $amount         = Cart::total();
                $discount       = $coupon->discount;
                $discountAmount = ( $amount * $discount ) / 100;
                $totalAmount    = $amount - $discountAmount;
                Session::put( 'coupon', [
                    'couponCode'     => $couponCode,
                    'couponDiscount' => $coupon->discount,
                    'discount'       => $discountAmount,
                    'subtotal'       => $amount,
                    'totalAmount'    => $totalAmount,
                ] );
                return response()->json( ['success' => "{$couponCode} Applied Successfully"] );
            }
            else
            {
                return response()->json( ['error' => 'Your Coupon is Expired'] );
            }
        }
        else
        {
            return response()->json( ['error' => 'Your Coupon is Invalid'] );
        }
    }
    //Get Coupon Discount
    public function couponDiscount()
    {
        if ( Session::has( 'coupon' ) )
        {
            $subtotal = round( Cart::total() );
            $coupon   = session()->get( 'coupon' )['couponCode'];
            $discount = session()->get( 'coupon' )['discount'];
            $total    = session()->get( 'coupon' )['totalAmount'];
            return response()->json( [
                'subtotal'    => $subtotal,
                'coupon'      => $coupon,
                'discount'    => $discount,
                'totalAmount' => $total,
            ] );
        }
        else
        {
            $total = Cart::total();
            return response()->json( [
                'cartTotal' => $total,
            ] );
        }
    }
    //Remove Coupon
    public function removeCoupon()
    {

        Session::forget( 'coupon' );
        return response()->json( ['success' => 'Coupon successfully Removed'] );

    }

    //Increase Qty
    public function increaseQty( $rawId )
    {
        $product = Cart::get( $rawId );
        Cart::update( $rawId, $product->qty + 1 );
        if ( Session::has( 'coupon' ) )
        {
            $amount         = Cart::total();
            $couponCode     = session()->get( 'coupon' )['couponCode'];
            $couponDiscount = session()->get( 'coupon' )['couponDiscount'];
            $discountAmount = ( $amount * $couponDiscount ) / 100;
            $totalAmount    = $amount - $discountAmount;
            Session::put( 'coupon', [
                'couponCode'     => $couponCode,
                'couponDiscount' => $couponDiscount,
                'discount'       => $discountAmount,
                'subtotal'       => $amount,
                'totalAmount'    => $totalAmount,
            ] );

        }
        return response()->json( 'success' );
    }

    //Decrease Qty
    public function decreaseQty( $rawId )
    {
        $product = Cart::get( $rawId );
        if ( $product->qty > 1 )
        {
            Cart::update( $rawId, $product->qty - 1 );
            if ( Session::has( 'coupon' ) )
            {
                $amount         = round( Cart::total() );
                $couponCode     = session()->get( 'coupon' )['couponCode'];
                $couponDiscount = session()->get( 'coupon' )['couponDiscount'];
                $discountAmount = ( $amount * $couponDiscount ) / 100;
                $totalAmount    = $amount - $discountAmount;
                Session::put( 'coupon', [
                    'couponCode'     => $couponCode,
                    'couponDiscount' => $couponDiscount,
                    'discount'       => $discountAmount,
                    'subtotal'       => $amount,
                    'totalAmount'    => $totalAmount,
                ] );

            }
            return response()->json( 'success' );
        }

    }

}
