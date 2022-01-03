@extends('layouts.admin-layout')
@section('title','Brands')
@section('brand','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <span class="breadcrumb-item active">Brand</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-8">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">All Brands</h6>
                <div class="table-wrapper">
                    <table class="table display responsive nowrap" id="brand-table">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Brand Name English</th>
                                <th>Brand Name Bangle</th>
                                <th>Brand Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $start = 0;
                            @endphp
                            @forelse ($brands as $brand)   
                                <tr>
                                    <td>{{++$start }}</td>
                                    <td>{{$brand->brand_name_en}}</td>
                                    <td>{{$brand->brand_name_bn}}</td>
                                    <td>
                                        <div class="brand-image" style="width: 80px;">
                                            <img src="{{asset($brand->brand_image)}}" style="width: 100%;" alt="{{$brand->brand_name_en}}">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/brand/edit/'.$brand->id)}}" class="btn btn-primary" title="Edit Brand">Edit</a>
                                        <a href="{{url('admin/brand/delete/'.$brand->id)}}" class="btn btn-danger" id="delete" title="Delete Brand">Delete</a>
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
                <h6 class="card-body-title">Add New Brand</h6>
                <form action="{{route('brand.add')}}" class="form-layout" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Brand Name English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="brand_name_en" value="{{old('brand_name_en')}}" placeholder="Enter English Brand Name" required>
                        @error('brand_name_en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Brand Name Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="brand_name_bn" value="{{old('brand_name_bn')}}" placeholder="Enter Bangla Brand Name" required>
                        @error('brand_name_bn')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Brand Image: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="file" name="brand_image" required>
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
                    title:"Are your sure want to Delete !",
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
                        Swal.fire('Your Brand is safe','', 'info')
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