@extends('layouts.admin-layout')
@section('title','Add New Brand')
@section('brand','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <a class="breadcrumb-item" href="{{route('admin.brand')}}">{{__('Brand')}}</a>
  <span class="breadcrumb-item active">Edit Brand</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Edit Brand</h6>
                <form action="{{url('admin/brand/update/'.$brand->id)}}" class="form-layout" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Brand Name English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="brand_name_en" value="{{$brand->brand_name_en}}" placeholder="Enter English Brand Name">
                        @error('brand_name_en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Brand Name Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="brand_name_bn" value="{{$brand->brand_name_bn}}" placeholder="Enter Bangla Brand Name">
                        @error('brand_name_bn')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Brand Image: <span class="tx-danger">*</span></label>
                        <input type="hidden" name="old_brand_image" value="{{$brand->brand_image}}">
                        <input class="form-control" type="file" name="brand_image">
                        @error('brand_image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Save</button>
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