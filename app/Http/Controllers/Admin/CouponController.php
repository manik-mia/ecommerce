<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view( 'admin.coupon.index', compact( 'coupons' ) );
    }

    public function store( Request $request )
    {
        $request->validate( [
            'coupon_code' => 'required',
            'discount'    => 'required',
            'validity'    => 'required',
        ] );
        $coupon = Coupon::create( [
            'coupon_code' => $request->coupon_code,
            'discount'    => $request->discount,
            'validity'    => $request->validity,
        ] );
        if ( $coupon )
        {
            return redirect()->back()->withSuccess( 'Coupon Added Successfully' );
        }
        else
        {
            return redirect()->back()->withInput()->withError( 'Coupon Add Fail' );
        }
    }
    public function edit( $id )
    {
        $coupon = Coupon::findOrFail( $id );
        return view( 'admin.coupon.edit-coupon', compact( 'coupon' ) );
    }
    public function update( Request $request, $id )
    {

        $request->validate( [
            'coupon_code' => 'required',
            'discount'    => 'required',
            'validity'    => 'required',
        ] );
        $coupon = Coupon::findOrFail( $id )->update( [
            'coupon_code' => $request->coupon_code,
            'discount'    => $request->discount,
            'validity'    => $request->validity,
        ] );
        if ( $coupon )
        {
            return redirect()->route( 'admin.coupon' )->withSuccess( 'Coupon Updated Successfully' );
        }
        else
        {
            return redirect()->back()->withInput()->withError( 'Coupon Update Fail' );
        }
    }
    public function delete( $id )
    {
        $coupon = Coupon::findOrFail( $id )->delete();
        if ( $coupon )
        {
            return redirect()->back()->withSuccess( 'Coupon Deleted Successfully' );
        }
        else
        {
            return redirect()->back()->withError( 'Coupon Delete Fail' );
        }
    }
}
