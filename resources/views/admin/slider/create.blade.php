@extends('layouts.admin-layout')
@section('title','Add New Slide')
@section('slider','active show-sub')
@section('add-slide','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <a class="breadcrumb-item" href="{{route('slider.index')}}">{{__('Slide')}}</a>
  <span class="breadcrumb-item active">Add Slide</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Add Slide</h6>
                <form action="{{route('slider.store')}}" class="form-layout" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Slide Image: <span class="tx-danger">*</span></label>
                        <input class="form-control mb-2" type="file" name="image" accept="image/*" onchange="loadFile(event)">
                        @error('image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="col-md-6">
                            <img style="width:100%;" id="preview"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Slide Title English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="title_en" value="{{old('title_en')}}" placeholder="Enter Slide Title">
                        @error('title_en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Slide Title Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="title_bn" value="{{old('title_bn')}}" placeholder="Enter Slide Title">
                        @error('title_bn')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Slide Sub Title English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="sub_title_en" value="{{old('sub_title_en')}}" placeholder="Enter Slide Sub Title">
                        @error('sub_title_en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Slide Sub Title Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="sub_title_bn" value="{{old('sub_title_bn')}}" placeholder="Enter Slide Sub Title">
                        @error('sub_title_bn')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Slide Description English: <span class="tx-danger">*</span></label>
                        <textarea name="description_en" class="form-control" id="description" placeholder="Enter Slide Description">{{old('description_en')}}</textarea>
                        @error('description_en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Slide Description Bangla: <span class="tx-danger">*</span></label>
                        <textarea name="description_bn" class="form-control" id="description" placeholder="Enter Slide Description">{{old('description_bn')}}</textarea>
                        @error('description_bn')
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
        //Product Thumbnail Preview
        var loadFile = function(event) {
        var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('preview');
                output.src = reader.result;
                };
            reader.readAsDataURL(event.target.files[0]);
        };
        @if (session()->has('error'))
            Swal.fire({
                icon:'error',
                text:"{{session('error')}}"
            })
        @endif
    </script>
@endsection