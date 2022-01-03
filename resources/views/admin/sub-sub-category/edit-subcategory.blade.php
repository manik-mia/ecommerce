@extends('layouts.admin-layout')
@section('title','Edit Sub Category')
@section('category','active show-sub')
@section('all-subsubcategory','active')
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
                <form action="{{route('admin.subSubCategory.update',['id'=>$subSubCategory->id])}}" class="form-layout" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Sub Sub Category Name English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="subsubcategory_name_en" value="{{$subSubCategory->subsubcategory_name_en}}" placeholder="Enter English Sub Sub Category">
                        @error('subsubcategory_name_en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Sub Sub Category Name Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="subsubcategory_name_bn" value="{{$subSubCategory->subsubcategory_name_bn}}" placeholder="Enter Bangla Sub Sub Category">
                        @error('subsubcategory_name_bn')
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