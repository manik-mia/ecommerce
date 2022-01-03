@extends('layouts.admin-layout')
@section('title','Edit Sub Category')
@section('category','active show-sub')
@section('all-subcategory','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <a class="breadcrumb-item" href="{{route('admin.brand')}}">{{__('Sub Category')}}</a>
  <span class="breadcrumb-item active">Sub Category Edit</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Edit Sub Category</h6>
                <form action="{{route('admin.subCategory.update',['id'=>$subCategory->id])}}" class="form-layout" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Parent Category: <span class="tx-danger">*</span></label>
                        <select class="form-control" name="category_id" data-placeholder="Choose one" style="height: 35px;">
                            <option label="Choose one"></option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" name="category_id" {{$subCategory->category_id==$category->id ? 'selected': ''}} >{{$category->category_name_en}}</option>
                            @endforeach
                        </select>
                        @error('parent_category')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Sub Category Name English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="subcategory_name_en" value="{{$subCategory->subcategory_name_en}}" placeholder="Enter English Sub Category">
                        @error('subcategory_name_en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Sub Category Name Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="subcategory_name_bn" value="{{$subCategory->subcategory_name_bn}}" placeholder="Enter Bangla Sub Category">
                        @error('subcategory_name_bn')
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