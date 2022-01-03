<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\State;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        if ( Cart::total() > 0 )
        {
            if ( Session::has( 'coupon' ) )
            {
                // $brands       = Brand::latest()->get();
                $cartProducts = Cart::content();
                $subtotal     = Cart::total();
                $total        = Session::get( 'coupon' )['totalAmount'];
                return view( 'user.checkout', compact( 'cartProducts', 'subtotal', 'total' ) );
            }
            else
            {
                // $brands       = Brand::latest()->get();
                $cartProducts = Cart::content();
                $total        = Cart::total();
                return view( 'user.checkout', compact( 'cartProducts', 'total' ) );
            }
        }
        else
        {
            return redirect()->to( '/' )->withError( 'Please Add At least One Product to your Cart' );
        }

    }
    public function getDivision()
    {
        $divisions = Division::orderBy( 'name', 'ASC' )->get();
        return response()->json( ['divisions' => $divisions] );
    }
    public function getDistrict( $id )
    {

        $districts = District::where( 'division_id', $id )->orderBy( 'name', 'ASC' )->get();
        return response()->json( ['districts' => $districts] );
    }
    public function getState( $id )
    {

        $states = State::where( 'district_id', $id )->orderBy( 'name', 'ASC' )->get();
        return response()->json( ['states' => $states] );
    }
    //
    public function storeShippingInfo( Request $request )
    {

        $shippingInfo                   = [];
        $shippingInfo['name']           = $request->name;
        $shippingInfo['email']          = $request->email;
        $shippingInfo['phone']          = $request->phone;
        $shippingInfo['division_id']    = $request->division_id;
        $shippingInfo['district_id']    = $request->district_id;
        $shippingInfo['state_id']       = $request->state_id;
        $shippingInfo['post_code']      = $request->post_code;
        $shippingInfo['notes']          = $request->notes;
        $shippingInfo['payment_method'] = $request->payment_method;

        $cartProducts = Cart::content();
        $cartQty      = Cart::count();
        $cartTotal    = Cart::total();
        if ( $request->payment_method === 'stripe' )
        {
            if ( Session::has( 'coupon' ) )
            {
                $totalAmount = Session::get( 'coupon' )['totalAmount'];
                return view( 'user.payment.stripe', compact( 'shippingInfo', 'cartTotal', 'totalAmount' ) );
            }
            else
            {
                return view( 'user.payment.stripe', compact( 'shippingInfo', 'cartTotal' ) );
            }

        }
        elseif ( $request->payment_method === 'paypal' )
        {
            if ( Session::has( 'coupon' ) )
            {
                $totalAmount = Session::get( 'coupon' )['totalAmount'];
                return view( 'user.payment.stripe', compact( 'shippingInfo', 'cartTotal', 'totalAmount' ) );
            }
            else
            {
                return view( 'user.payment.stripe', compact( 'shippingInfo', 'cartTotal' ) );
            }

        }
        elseif ( $request->payment_method === 'sslcommerz_hosted' )
        {
            if ( Session::has( 'coupon' ) )
            {
                $totalAmount = Session::get( 'coupon' )['totalAmount'];
                return view( 'user.payment.sslcommerz.hosted-checkout', compact( 'shippingInfo', 'cartProducts', 'cartQty', 'cartTotal', 'totalAmount' ) );
            }
            else
            {
                return view( 'user.payment.sslcommerz.hosted-checkout', compact( 'shippingInfo', 'cartProducts', 'cartQty', 'cartTotal' ) );
            }
        }
        elseif ( $request->payment_method === 'sslcommerz_easy' )
        {
            if ( Session::has( 'coupon' ) )
            {
                $totalAmount = Session::get( 'coupon' )['totalAmount'];
                return view( 'user.payment.sslcommerz.eassy-checkout', compact( 'shippingInfo', 'cartProducts', 'cartQty', 'cartTotal', 'totalAmount' ) );
            }
            else
            {
                return view( 'user.payment.sslcommerz.eassy-checkout', compact( 'shippingInfo', 'cartProducts', 'cartQty', 'cartTotal' ) );
            }
        }
        elseif ( $request->payment_method === 'card' )
        {

        }
        else
        {

        }
    }
}
