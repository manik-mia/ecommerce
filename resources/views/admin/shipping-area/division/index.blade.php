@extends('layouts.admin-layout')
@section('title','Division | Shipping Area')
@section('shipping-area','active show-sub')
@section('division','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <span class="breadcrumb-item active">Division</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-8">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">All Divisions</h6>
                <div class="table-wrapper">
                    <table class="table display responsive nowrap" id="brand-table">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Divison Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $start = 0;
                            @endphp
                            @forelse ($divisions as $division)   
                                <tr>
                                    <td>{{++$start }}</td>
                                    <td>{{$division->name}}</td>
                                    <td>
                                        <a href="{{route('shipping.division.edit',['id'=>$division->id])}}" class="btn btn-primary" title="Edit Division">Edit</a>
                                        <a href="{{route('shipping.division.delete',['id'=>$division->id])}}" class="btn btn-danger" id="delete" title="Delete Division">Delete</a>
                                    </td>
                                </tr> 
                            @empty
                                <tr>
                                    <td colspan="3">No Data Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Add New Division</h6>
                <form action="{{route('shipping.division.store')}}" class="form-layout" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Division Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Enter Division Name" required>
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