<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class OrderController extends Controller
{
    //Indexing All Order
    public function index()
    {
        $orders = Order::where( 'user_id', Auth::id() )->latest()->get();
        $user   = User::findOrFail( Auth::id() );
        return view( 'user.order.index', compact( 'orders', 'user' ) );

    }
    //Indexing Return Order
    public function returnOrder()
    {
        $orders = Order::where( 'user_id', Auth::id() )->where( 'status', 'returned' )->latest()->get();
        $user   = User::findOrFail( Auth::id() );
        return view( 'user.order.return', compact( 'orders', 'user' ) );

    }
    //Indexing Cancel Order
    public function cancelOrder()
    {
        $orders = Order::where( 'user_id', Auth::id() )->where( 'status', 'cenceled' )->latest()->get();
        $user   = User::findOrFail( Auth::id() );
        return view( 'user.order.cancel', compact( 'orders', 'user' ) );

    }
    //Onder Information
    public function getOrderInfo( $orderId )
    {
        $order      = Order::with( 'division', 'district', 'state' )->findOrFail( $orderId );
        $orderItems = OrderItem::where( 'order_id', $orderId )->with( 'product' )->get();
        $user       = User::findOrFail( Auth::id() );
        return view( 'user.order.order-info', compact( 'order', 'orderItems', 'user' ) );
    }
    // Order Invoie
    public function invoice( $orderId )
    {
        $order      = Order::with( 'division', 'district', 'state' )->findOrFail( $orderId );
        $orderItems = OrderItem::where( 'order_id', $orderId )->with( 'product' )->get();
        //return view( 'user.order.invoice', compact( 'order', 'orderItems' ) );
        $pdf = PDF::loadView( 'user.order.invoice', compact( 'order', 'orderItems' ) )->setPaper( 'a4' )->setOptions( [
            'tempDir' => public_path(),
            'chroot'  => public_path(),
        ] );
        return $pdf->download( 'invoice.pdf' );
    }
    //Order Send To Admin for return
    public function orderReturn( Request $request, $orderId )
    {

        $orderReturn = Order::findOrFail( $orderId )->update( [
            'return_reason' => $request->return_reason,
            'return_date'   => Carbon::now(),
            'status'        => 'returned',
        ] );
        if ( $orderReturn )
        {
            return redirect()->back()->withSuccess( 'Order Return Request Send To Authority' );
        }
        else
        {
            return redirect()->back()->withInput()->withError( 'Order Return Request Send Fail' );
        }
    }
    //Showing Order Tracking Form
    public function trackingForm()
    {
        return view( 'user.order.track-form' );
    }
    //Order tracking
    public function orderTrack( Request $request )
    {
        $order = Order::with( 'user' )->where( 'invoice_no', $request->invoice_no )->first();
        return view( 'user.order.track', compact( 'order' ) );
    }
}
