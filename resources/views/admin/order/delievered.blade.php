@extends('layouts.admin-layout')
@section('title','Delievered Orders')
@section('order','active show-sub')
@section('delievered','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <span class="breadcrumb-item active">Delievered Orders</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Delievered Orders</h6>
                <table class="table responsive" id="order-table">
                    <thead>
                        <tr>
                            <th class="wd-20p">Delievery Date</th>
                            <th class="wd-10p">Invoice</th>
                            <th class="wd-15p">Transaction ID</th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-5p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order )
                            
                        <tr>
                            <td class="wd-20p">{{Carbon\Carbon::parse($order->delivered_date)->format('d-M-Y')}}</td>
                            <td class="wd-10p">{{$order->invoice_no}}</td>
                            <td class="wd-15p">{{$order->transaction_id}}</td>
                            <td class="wd-15p">
                                @if ($order->currency==='usd')
                                {{$order->amount*85}}
                                @else
                                {{$order->amount}}
                                @endif
                            </td>
                            <td class="wd-5p"><span class="badge badge-primary">{{$order->status}} </span></td>
                            </td>
                            <td class="wd-20p">
                                <a href="{{route('admin.order.detail',['order_id'=>$order->id])}}" class="btn btn-success" title="View Product"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
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
    </script>
@endsection