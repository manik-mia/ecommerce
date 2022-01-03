@extends('layouts.admin-layout')
@section('title','Edit Division | Shipping Area')
@section('shipping-area','active show-sub')
@section('division','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <a class="breadcrumb-item" href="{{route('shipping.division')}}">{{__('Division')}}</a>
  <span class="breadcrumb-item active">Edit Division</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Edit Division</h6>
                <form action="{{route('shipping.division.update',['id'=>$division->id])}}" class="form-layout" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Name Division: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{$division->name}}" placeholder="Enter Name Division">
                        @error('name')
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