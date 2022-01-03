@extends('layouts.frontend-layout')
@section('title','Cancel Order')
@section('content')
    <div class="body-content">
        <div class="container user-dashboard">
            <div class="row">
                @include('user.inc.sideNav',['avater'=>$user->image])
                <div class="col-sm-9" style="margin-top: 100px;">
                    <div class="shopping-cart">
                        <div class="shopping-cart-table ">
                            <div class="table-responsive order-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Cancel Date</th>
                                            <th>Payment Method</th>
                                            <th>Amount (TK)</th>
                                            <th>Invoice NO</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order) 
                                            <tr>
                                                <td>{{$order->cancel_date}}</td>
                                                <td>{{$order->payment_method}}</td>
                                                <td>{{$order->amount}}</td>
                                                <td>{{$order->invoice_no}}</td>
                                                <td><span class="badge" style="background: #318bc0;color:#fff;"> {{$order->status}}</span></td>
                                                <td>
                                                    <a href="{{route('user.order.product',['order_id'=>$order->id])}}" class="btn btn-success" style="margin:5px 0;"><i class="fa fa-eye"> View</i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection