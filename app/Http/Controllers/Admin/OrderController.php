<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;

class OrderController extends Controller
{
    //Pending Order
    public function index()
    {
        $orders = Order::where( 'status', 'pending' )->latest()->get();
        return view( 'admin.order.index', compact( 'orders' ) );
    }
    //Confirmed Order
    public function confirmedOrder()
    {
        $orders = Order::where( 'status', 'confirmed' )->latest()->get();
        return view( 'admin.order.confirm', compact( 'orders' ) );
    }
    //Processing Order
    public function processingOrder()
    {
        $orders = Order::where( 'status', 'processing' )->latest()->get();
        return view( 'admin.order.processed', compact( 'orders' ) );
    }
    //Processing Order
    public function shippedOrder()
    {
        $orders = Order::where( 'status', 'shipped' )->latest()->get();
        return view( 'admin.order.shipped', compact( 'orders' ) );
    }
    //Picked Order
    public function pickedOrder()
    {
        $orders = Order::where( 'status', 'picked' )->latest()->get();
        return view( 'admin.order.picked', compact( 'orders' ) );
    }
    //Delievered Order
    public function delieveredOrder()
    {
        $orders = Order::where( 'status', 'delievered' )->latest()->get();
        return view( 'admin.order.delievered', compact( 'orders' ) );
    }
    //Canceled Order
    public function canceledOrder()
    {
        $orders = Order::where( 'status', 'canceled' )->latest()->get();
        return view( 'admin.order.canceled', compact( 'orders' ) );
    }
    //Returned Order
    public function returedOrder()
    {
        $orders = Order::where( 'status', 'returned' )->latest()->get();
        return view( 'admin.order.returned', compact( 'orders' ) );
    }

    //Order Confirm
    public function toConfirm( $orderId )
    {
        $order = Order::findOrFail( $orderId )->update( [
            'status'       => 'confirmed',
            'confirm_date' => Carbon::now(),
        ] );
        return redirect()->route( 'admin.order.confirmed' )->withSuccess( 'This Order Successfully Confirmed' );
    }
    //Order Processing
    public function toProcessing( $orderId )
    {
        $order = Order::findOrFail( $orderId )->update( [
            'status'          => 'processing',
            'processing_date' => Carbon::now(),
        ] );
        return redirect()->route( 'admin.order.processed' )->withSuccess( 'This Order is Now Processed' );
    }
    //Order Shipped
    public function toShipped( $orderId )
    {
        $order = Order::findOrFail( $orderId )->update( [
            'status'       => 'shipped',
            'shipped_date' => Carbon::now(),
        ] );
        return redirect()->route( 'admin.order.shipped' )->withSuccess( 'This Order is Now Shipped' );
    }
    //Order Picked
    public function toPicked( $orderId )
    {
        $order = Order::findOrFail( $orderId )->update( [
            'status'      => 'picked',
            'picked_date' => Carbon::now(),
        ] );
        return redirect()->route( 'admin.order.picked' )->withSuccess( 'This Order is Picked' );
    }
    //Order Delieverd
    public function toDelieverd( $orderId )
    {
        $order = Order::findOrFail( $orderId )->update( [
            'status'         => 'delievered',
            'delivered_date' => Carbon::now(),
        ] );
        return redirect()->route( 'admin.order.delievered' )->withSuccess( 'Order Successfully Delieverd' );
    }

    //Order Details
    public function orderDetail( $orderId )
    {
        $order      = Order::with( 'division', 'district', 'state', 'user' )->findOrFail( $orderId );
        $orderItems = OrderItem::where( 'order_id', $orderId )->with( 'product' )->get();
        return view( 'admin.order.order-detail', compact( 'order', 'orderItems' ) );
    }
}
