@extends('layouts.admin-layout')
@section('title','Order Details')
@section('order','active show-sub')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <span class="breadcrumb-item active">Order Details</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <div class="row">
                    <div class="col-md-6">
                        <div class="user-info">
                            <h3 class="bg-primary" style="border-radius: 5px; color:#fff; font-size:20px;font-weight:400;padding:20px;">User Information</h3>
                            <table class="table responsive">
                                <tr>
                                    <td colspan="2"><img style="width: 100%;" src="{{asset($order->user->image)}}"></td>
                                </tr>
                                <tr>
                                    <td>User Name:</td>
                                    <td>{{$order->user->name}}</td>
                                </tr>
                                <tr>
                                    <td>User Email:</td>
                                    <td>{{$order->user->email}}</td>
                                </tr>
                                <tr>
                                    <td>User Phone:</td>
                                    <td>{{$order->user->phone}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="shpping-info">
                            <h3 class="bg-primary" style="color:#fff; font-size:20px;font-weight:400;padding:20px;border-radius: 5px;">Shipping Information</h3> 
                            <table class="table responsive">
                                <tr>
                                    <td>Shipping Name:</td>
                                    <td>{{$order->name}}</td>
                                </tr>
                                <tr>
                                    <td>Shipping Email:</td>
                                    <td>{{$order->email}}</td>
                                </tr>
                                <tr>
                                    <td>Shipping Phone:</td>
                                    <td>{{$order->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Shipping Address:</td>
                                    <td>{{$order->division->name}},{{$order->district->name}},{{$order->state->name}}</td>
                                </tr>
                                <tr>
                                    <td>Post Code:</td>
                                    <td>{{$order->post_code}}</td>
                                </tr>
                                <tr>
                                    <td>Invoice NO:</td>
                                    <td><span class="badge badge-success">{{$order->invoice_no}}</span></td>
                                </tr>
                                <tr>
                                    <td>Order Date:</td>
                                    <td>{{$order->order_date}}</td>
                                </tr>
                                <tr>
                                    <td>Transaction ID</td>
                                    <td>{{$order->transaction_id}}</td>
                                </tr>
                                <tr>
                                    <td>Payment Method</td>
                                    <td>{{$order->payment_method}}</td>
                                </tr>
                                <tr>
                                    <td>Payment Type</td>
                                    <td>{{$order->payment_type}}</td>
                                </tr>
                                <tr>
                                    <td>Amount</td>
                                    <td style="text-transform: uppercase;">{{$order->amount}}({{$order->currency}})</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        @if ($order->status=='confirmed')
                                            <a href="{{route('admin.order.processing',['order_id'=>$order->id])}}" class="btn btn-success btn-block" id="processing">
                                                Processing
                                            </a>
                                        @elseif ($order->status=='processing')
                                            <a href="{{route('admin.order.ship',['order_id'=>$order->id])}}" class="btn btn-success btn-block" id="shipped">
                                                Shipped
                                            </a>
                                        @elseif ($order->status=='shipped')
                                            <a href="{{route('admin.order.pick',['order_id'=>$order->id])}}" class="btn btn-success btn-block" id="picked">
                                                Picked
                                            </a>
                                        @elseif ($order->status=='picked')
                                            <a href="{{route('admin.order.deliever',['order_id'=>$order->id])}}" class="btn btn-success btn-block" id="delivered">
                                                Delievered
                                            </a>
                                        @else
                                            <a href="{{route('admin.order.confirm',['order_id'=>$order->id])}}" class="btn btn-success btn-block" id="confirm">
                                                Confirm
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table responsive">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Product Size</th>
                                    <th>Product Color</th>
                                    <th>Product Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderItems as $orderItem)
                                    <tr>
                                        <td>{{$orderItem->product->product_name_en}}</td>
                                        <td style="width: 200px;">
                                            <img src="{{asset($orderItem->product->product_thumbnail)}}" style="width:100%;">
                                        </td>
                                        <td>
                                            @if ($orderItem->product->product_size_en==null)
                                                ----
                                            @else
                                                {{$orderItem->product->product_size_en}}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($orderItem->product->product_color_en==null)
                                                ----
                                            @else
                                                {{$orderItem->product->product_color_en}}
                                            @endif
                                        </td>
                                        <td>
                                            {{$orderItem->qty}}
                                        </td>
                                        <td>
                                            {{$orderItem->product->selling_price*$orderItem->qty}}
                                        </td>
                                        <td>
                                            {{$orderItem->product->selling_price}}
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
@endsection
@section('scripts')
    <script type="text/javascript">
        
        $('#order-table').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
        });
        //Confirm Order
        $(document).on('click','#confirm',function(e){
            e.preventDefault();
            let link=$(this).attr('href');
            Swal.fire({
                title:"Are your sure want to Confirm This Order!",
                text:'Once Confirmed, you will not be able to recover',
                icon:'warning',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                denyButtonText: `Don't Confirm`,
                }).then((willDelete)=>{
                if (willDelete.isConfirmed) {
                    window.location.href=link;
                }else{
                    Swal.fire('Product is Pending','', 'info')
                }
            })
        });
        //Confirm Processing
        $(document).on('click','#processing',function(e){
            e.preventDefault();
            let link=$(this).attr('href');
            Swal.fire({
                title:"Are your sure This Order is Processing!",
                text:'Once Processing, you will not be able to recover',
                icon:'warning',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Processing',
                denyButtonText: `Don't Processing`,
                }).then((willDelete)=>{
                if (willDelete.isConfirmed) {
                    window.location.href=link;
                }else{
                    Swal.fire('Product is Confirmed','', 'info')
                }
            })
        });
        //Confirm Shipped
        $(document).on('click','#shipped',function(e){
            e.preventDefault();
            let link=$(this).attr('href');
            Swal.fire({
                title:"This order is ready to Shipped!",
                text:'Once Shipped, you will not be able to recover',
                icon:'warning',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Shipped',
                denyButtonText: `Don't Shipped`,
                }).then((willDelete)=>{
                if (willDelete.isConfirmed) {
                    window.location.href=link;
                }else{
                    Swal.fire('Product is Processing','', 'info')
                }
            })
        });
        //Confirm Picked
        $(document).on('click','#picked',function(e){
            e.preventDefault();
            let link=$(this).attr('href');
            Swal.fire({
                title:"This order is ready to Picked!",
                text:'Once Picked, you will not be able to recover',
                icon:'warning',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Picked',
                denyButtonText: `Don't Picked`,
                }).then((willDelete)=>{
                if (willDelete.isConfirmed) {
                    window.location.href=link;
                }else{
                    Swal.fire('Product is Shipped','', 'info')
                }
            })
        });
        //Confirm Delievered
        $(document).on('click','#delievered',function(e){
            e.preventDefault();
            let link=$(this).attr('href');
            Swal.fire({
                title:"This order is ready to Delievered!",
                text:'Once Delievered, you will not be able to recover',
                icon:'warning',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delievered',
                denyButtonText: `Don't Delievered`,
                }).then((willDelete)=>{
                if (willDelete.isConfirmed) {
                    window.location.href=link;
                }else{
                    Swal.fire('Product is Shipped','', 'info')
                }
            })
        });
        @if (session()->has('success'))
            Swal.fire({
                icon:'success',
                text:"{{session('success')}}"
            })
        @endif
        @if (session()->has('error'))
            Swal.fire({
                icon:'error',
                text:"{{session('error')}}"
            })
        @endif
    </script>
@endsection