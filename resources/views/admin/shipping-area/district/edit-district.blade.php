@extends('layouts.admin-layout')
@section('title','Edit District | Shipping Area')
@section('shipping-area','active show-sub')
@section('district','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <a class="breadcrumb-item" href="{{route('admin.brand')}}">{{__('District')}}</a>
  <span class="breadcrumb-item active">District Edit</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Edit District</h6>
                <form action="{{route('shipping.district.update',['id'=>$district->id])}}" class="form-layout" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Select Division: <span class="tx-danger">*</span></label>
                        <select class="form-control select2 select2-show-search" name="division_id" data-placeholder="Choose one" style="height: 35px; padding:0 10px;">
                            <option label="Choose one" style="height: 25px; padding:0 10px;"></option>
                            @foreach ($divisions as $division)
                                <option value="{{$division->id}}" name="division_id" {{$district->division_id==$division->id ? 'selected': ''}} style="height: 25px; padding:0 10px;">{{$division->name}}</option>
                            @endforeach
                        </select>
                        @error('parent_category')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">District Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{$district->name}}" placeholder="Enter District Name">
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