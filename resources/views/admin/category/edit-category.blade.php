@extends('layouts.admin-layout')
@section('title','Edit Category')
@section('category','active show-sub')
@section('all-category','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <a class="breadcrumb-item" href="{{route('admin.brand')}}">{{__('Category')}}</a>
  <span class="breadcrumb-item active">Edit Category</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Edit Category</h6>
                <form action="{{url('admin/category/update/'.$category->id)}}" class="form-layout" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Category Name English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="category_name_en" value="{{$category->category_name_en}}" placeholder="Enter English Category Name">
                        @error('category_name_en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Category Name Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="category_name_bn" value="{{$category->category_name_bn}}" placeholder="Enter Bangla Category Name">
                        @error('category_name_bn')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Category Name Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="category_icon" value="{{$category->category_icon}}" placeholder="Enter Category Icon">
                        @error('category_icon')
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