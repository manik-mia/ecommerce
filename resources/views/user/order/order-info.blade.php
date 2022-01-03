@extends('layouts.frontend-layout')
@section('title','User Profile')
@section('content')
    <div class="body-content">
        <div class="container user-dashboard">
            <div class="row">
                @include('user.inc.sideNav',['avater'=>$user->image])
                <div class="col-sm-9" style="margin-top: 100px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="shopping-cart">
                                <div class="shopping-cart-table ">
                                    <div class="shipping-info">
                                        <h3>Shipping Information</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td>Shipping Name:</td>
                                                    <td>{{$order->name}}</td>
                                                    <td>Shipping Email:</td>
                                                    <td>{{$order->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Shipping Phone:</td>
                                                    <td>{{$order->phone}}</td>
                                                    <td>Address:</td>
                                                    <td>{{$order->division->name}},{{$order->district->name}},{{$order->state->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Order Date:</td>
                                                    <td>{{$order->order_date}}</td>
                                                    <td>Invoice No:</td>
                                                    <td>{{$order->invoice_no}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 15px;">
                            <div class="shopping-cart">
                                <div class="shopping-cart-table ">
                                    <div class="table-responsive order-table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th>Product Code</th>
                                                    <th>Color</th>
                                                    <th>Size</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orderItems as $orderItem) 
                                                    <tr>
                                                        <td style="width: 200px;">
                                                            <img style="width: 100%;" src="{{asset($orderItem->product->product_thumbnail)}}" alt="{{$orderItem->product->product_name_en}}">
                                                        </td>
                                                        <td>{{$orderItem->product->product_name_en}}</td>
                                                        <td>{{$orderItem->product->selling_price}} (TK)</td>
                                                        <td>{{$orderItem->product->product_code}}</td>
                                                        <td>{{$orderItem->product->product_size_en}}</td>
                                                        <td>{{$orderItem->product->product_color_en}}</td>
                                                        <td>
                                                            @if ($order->status==='delievered')
                                                                <a href="{{route('user.review.create',['id'=>$orderItem->product->id])}}" class="btn btn-success">Write A Review</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($order->status==='delievered')
                            <div class="col-md-12" style="margin:15px 0;">
                                <div class="shopping-cart">
                                    <div class="shopping-cart-table ">
                                        <form action="{{route('user.order.return',['order_id'=>$order->id])}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="return-reason" style="font-size:18px;">Return Reason</label>
                                                <textarea name="reaturn_reason" id="return-reason" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Retrun Order</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection