@extends('layouts.admin-layout')
@section('title','Districts | Shipping Area')
@section('shipping-area','active show-sub')
@section('district','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <span class="breadcrumb-item active">District</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-8">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">All Districts</h6>
                <div class="table-wrapper">
                    <table class="table display responsive nowrap" id="brand-table">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Division Name</th>
                                <th>District Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $start = 0;
                            @endphp
                            @forelse ($districts as $district)   
                                <tr>
                                    <td>{{++$start }}</td>
                                    <td>{{$district->division->name}}</td>
                                    <td>{{$district->name}}</td>
                                    <td>
                                        <a href="{{route('shipping.district.edit',['id'=>$district->id])}}" class="btn btn-primary" title="Edit Brand">Edit</a>
                                        <form action="{{route('shipping.district.delete',['id'=>$district->id])}}" method="GET" style="display: inline-block;" id="delete">
                                            @csrf
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr> 
                            @empty
                                <tr>
                                    <td colspan="4">No Data Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Add New District</h6>
                <form action="{{url('admin/district/store')}}" class="form-layout" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Select Division: <span class="tx-danger">*</span></label>
                        <select class="form-control select2 select2-show-search" name="division_id" data-placeholder="Choose one">
                            <option label="Choose one"></option>
                            @foreach ($divisions as $division)
                                <option value="{{$division->id}}" name="division_id" >{{$division->name}}</option>
                            @endforeach
                        </select>
                        @error('division_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">District Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Enter District Name">
                        @error('name')
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