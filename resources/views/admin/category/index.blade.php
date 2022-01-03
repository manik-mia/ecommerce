@extends('layouts.admin-layout')
@section('title','Categories')
@section('category','active show-sub')
@section('all-category','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <span class="breadcrumb-item active">Category</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-8">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">All Categories</h6>
                <div class="table-wrapper">
                    <table class="table display responsive nowrap" id="brand-table">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Category English</th>
                                <th>Category Bangla</th>
                                <th>Category Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $start = 0;
                            @endphp
                            @forelse ($categories as $category)   
                                <tr>
                                    <td>{{++$start }}</td>
                                    <td>{{$category->category_name_en}}</td>
                                    <td>{{$category->category_name_bn}}</td>
                                    <td><i class="{{$category->category_icon}}"></i></td>
                                    <td>
                                        <a href="{{url('admin/category/edit/'.$category->id)}}" class="btn btn-primary" title="Edit Brand">Edit</a>
                                        <a href="{{url('admin/category/delete/'.$category->id)}}" class="btn btn-danger" id="delete" title="Delete Brand">Delete</a>
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
                <h6 class="card-body-title">Add New Category</h6>
                <form action="{{route('admin.category.store')}}" class="form-layout" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Category Name English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="category_name_en" value="{{old('category_name_en')}}" placeholder="Enter English Category Name" required>
                        @error('category_name_en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Category Name Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="category_name_bn" value="{{old('category_name_bn')}}" placeholder="Enter Bangla Category Name" required>
                        @error('category_name_bn')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Category Icon: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="category_icon" value="{{old('category_icon')}}" placeholder="Enter Category Icon" required>
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
                let link=$(this).attr('href');
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