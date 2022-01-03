@extends('layouts.admin-layout')
@section('title','Add New Brand')
@section('brand','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <a class="breadcrumb-item" href="{{route('admin.coupon')}}">{{__('Coupon')}}</a>
  <span class="breadcrumb-item active">Edit Coupon</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Edit Coupon</h6>
                <form action="{{url('admin/coupon/update/'.$coupon->id)}}" class="form-layout" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Coupon Code: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="coupon_code" value="{{$coupon->coupon_code}}" placeholder="Enter Coupon Code">
                        @error('coupon_code')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Coupon Discount(%): <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="discount" value="{{$coupon->discount}}" placeholder="Enter Coupon Discount" required>
                        @error('discount')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Validity: <span class="tx-danger">*</span></label>
                        <input class="form-control" value="{{$coupon->validity}}" type="date" name="validity" min="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                        @error('validity')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        @if (session()->has('error'))
            Swal.fire({
                icon:'error',
                text:"{{session('error')}}"
            })
        @endif
    </script>
@endsection