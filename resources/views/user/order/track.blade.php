@extends('layouts.frontend-layout')
@section('title','User Profile')
@section('content')
    <style>
         @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.10rem
        }

        .card-header:first-child {
            border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1)
        }

        .track {
            position: relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 60px;
            margin-top: 50px
        }

        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 25%;
            margin-top: -18px;
            text-align: center;
            position: relative
        }

        .track .step.active:before {
            background: #59b210
        }

        .track .step::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .step.active .icon {
            background: #59b210;
            color: #fff
        }

        /* cancel area start */
        .track .cancel {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 25%;
            margin-top: -18px;
            text-align: center;
            position: relative
        }

        .track .cancel.done:before {
            background: #EA323D;
        }

        .track .cancel::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .cancel.done .icon {
            background:#EA323D;
            color: #fff
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius: 100%;
            background: #ddd;

        }

        .track .cancel.done .text {
            font-weight: 400;
            color: #000
        }
        /* end cancel area  */

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius: 100%;
            background: #ddd;

        }

        .track .step.active .text {
            font-weight: 400;
            color: #000
        }

        .track .text {
            display: block;
            margin-top: 7px
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%
        }

        .itemside .aside {
            position: relative;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }

        .img-sm {
            width: 80px;
            height: 80px;
            padding: 7px
        }

        ul.row,
        ul.row-sm {
            list-style: none;
            padding: 0
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .itemside .title {
            display: block;
            margin-bottom: 5px;
            color: #212529
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        .btn-warning {
            color: #ffffff;
            background-color: #59b210;
            border-color: #59b210;
            border-radius: 1px
        }

        .btn-warning:hover {
            color: #ffffff;
            background-color: #59b210;
            border-color: #59b210;
            border-radius: 1px
        }
        .qty{
            background: #59b210;
        }
        .mt{
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .empty{
            padding: 20px;
        }
        </style>
    <div class="body-content">
        <div class="container user-dashboard">
            <div class="row">
                @include('user.inc.sideNav')
                <div class="col-sm-9" style="margin-top: 100px;">
                    <article class="card">
                        <div class="card-body">
                            <article class="card">
                                <div class="card-body row" style="padding:10px;">
                                    <div class="col-md-2">
                                        <strong>Invoice No:</strong> <br> {{$order->invoice_no}}
                                    </div>
                                    <div class="col-md-2"> <strong>Order Date:</strong> <br>{{$order->order_date}}</div>
                                </div>
                            </article>
                            @if ($order->status!=='canceled')
                                <div class="track">
                                    <div class="step active">
                                        <span class="icon"> <i class="fa fa-spinner"></i> </span>
                                        <span class="text">Order Pending</span>
                                    </div>
                                    <div class="step {{$order->confirm_date ? 'active': ''}}">
                                        <span class="icon "><i class="fa fa-check"></i> </span>
                                        <span class="text">Order confirmed</span>
                                        <small class="text-danger">Date:{{$order->confirm_date ? $order->confirm_date: ''}}</small>
                                    </div>
                                    <div class="step {{$order->processing_date ? 'active': ''}}">
                                        <span class="icon"> <i class="fa fa-shopping-cart"></i> </span>
                                        <span class="text">Order Processing</span>
                                        <small class="text-danger">Date:{{$order->confirm_date ? $order->processing_date: ''}}</small>
                                    </div>
                                    <div class="step {{$order->shipped_date ? 'active': ''}}">
                                        <span class="icon"> <i class="fa fa-truck"></i> </span>
                                        <span class="text">Shipped Order</span>
                                        <small class="text-danger">Date:{{$order->confirm_date ? $order->shipped_date: ''}}</small>
                                    </div>
                                    <div class="step {{$order->picked_date ? 'active': ''}}">
                                        <span class="icon"> <i class="fa fa-user"></i> </span>
                                        <span class="text">Picked Order</span>
                                        <small class="text-danger">Date:{{$order->confirm_date ? $order->picked_date: ''}}</small>
                                    </div>
                                    <div class="step {{$order->delivered_date ? 'active': ''}}">
                                        <span class="icon"> <i class="fa fa-hand-lizard-o"></i> </span>
                                        <span class="text">Delivered</span>
                                        <small class="text-danger">Date:{{$order->confirm_date ? $order->delivered_date: ''}}</small>
                                    </div>
                                </div>
                            @else
                                <div class="track">
                                    <div class="cancel done">
                                        <span class="icon "> <i class="fa fa-close "></i> </span>
                                        <span class="text">Order Pending</span>
                                    </div>
                                    <div class="cancel done">
                                        <span class="icon "><i class="fa fa-close"></i> </span>
                                        <span class="text">Order confirmed</span>
                                    </div>
                                    <div class="cancel done">
                                        <span class="icon"> <i class="fa fa-close"></i> </span>
                                        <span class="text">Order Processing</span>
                
                                    </div>
                                    <div class="cancel done">
                                        <span class="icon"> <i class="fa fa-close"></i> </span>
                                        <span class="text">Picked Order</span>
                
                                    </div>
                
                                    <div class="cancel done">
                                        <span class="icon"><i class="fa fa-close"></i> </span>
                                        <span class="text">Shipped Order</span>
                
                                    </div>
                                    <div class="cancel done">
                                        <span class="icon"> <i class="fa fa-close"></i></span>
                                        <span class="text">Delivered</span>
                
                                    </div>
                                </div>
                            @endif
                            <div class="empty"></div>
                            
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        
    </script>
@endsection