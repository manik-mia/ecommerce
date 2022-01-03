@extends('layouts.admin-layout')
@section('title','Sub Categories')
@section('category','active show-sub')
@section('all-subcategory','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <span class="breadcrumb-item active">Sub Category</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-8">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">All Sub Categories</h6>
                <div class="table-wrapper">
                    <table class="table display responsive nowrap" id="brand-table">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Parent Category</th>
                                <th>Sub Category EN</th>
                                <th>Sub Category BN</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $start = 0;
                            @endphp
                            @forelse ($subCategories as $subCategory)   
                                <tr>
                                    <td>{{++$start }}</td>
                                    <td>{{$subCategory->category->category_name_en}}</td>
                                    <td>{{$subCategory->subcategory_name_en}}</td>
                                    <td>{{$subCategory->subcategory_name_bn}}</td>
                                    <td>
                                        <a href="{{route('admin.subCategory.edit',['id'=>$subCategory->id])}}" class="btn btn-primary" title="Edit Brand">Edit</a>
                                        <form action="{{route('admin.subCategory.delete',['id'=>$subCategory->id])}}" method="GET" style="display: inline-block;" id="delete">
                                            @csrf
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr> 
                            @empty
                                <tr>
                                    <td colspan="5">No Data Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Add New Sub Category</h6>
                <form action="{{route('admin.subCategory.store')}}" class="form-layout" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Parent Category: <span class="tx-danger">*</span></label>
                        <select class="form-control" name="category_id" data-placeholder="Choose one">
                            <option label="Choose one"></option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" name="category_id" >{{$category->category_name_en}}</option>
                            @endforeach
                        </select>
                        @error('parent_category')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Sub Category English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="subcategory_name_en" value="{{old('subcategory_name_en')}}" placeholder="Enter English Sub Category" required>
                        @error('subcategory_name_en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Sub Category Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="subcategory_name_bn" value="{{old('subcategory_name_bn')}}" placeholder="Enter Bangla Sub Category" required>
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
        $('#brand-table').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
        });
        $(document).on('click','#delete',function(e){
                e.preventDefault();
                let link=$(this).attr('action');
                Swal.fire({
                    title:"Are your sure want to Delete This!",
                    text:'Once deleted, you will not be able to recover',
                    icon:'warning',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    denyButtonText: `Don't Delete`,
                }).then((willDelete)=>{
                    if (willDelete.isConfirmed) {
                        window.location.href=link;
                    }else{
                        Swal.fire('Your Category is safe','', 'info')
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