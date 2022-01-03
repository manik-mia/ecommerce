@extends('layouts.admin-layout')
@section('title','Coupons')
@section('coupon','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <span class="breadcrumb-item active">Coupon</span>
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
                                <th class="wd-10p">SI</th>
                                <th class="wd-15p">Coupon Code</th>
                                <th class="wd-10p">Discount(%)</th>
                                <th class="wd-15p">Validity</th>
                                <th class="wd-10p">Status</th>
                                <th class="wd-40p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $start = 0;
                            @endphp
                            @forelse ($coupons as $coupon)   
                                <tr>
                                    <td>{{++$start }}</td>
                                    <td>{{$coupon->coupon_code}}</td>
                                    <td>{{$coupon->discount}}%</td>
                                    <td>
                                        {{Carbon\Carbon::parse($coupon->validity)->format('D d-m-Y')}}
                                    </td>
                                    <td>
                                        @if (Carbon\Carbon::parse($coupon->validity)>Carbon\Carbon::now())
                                        <span class="badge badge-primary">Valid</span>
                                        @else
                                        <span class="badge badge-primary">Invalid</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('admin/coupon/edit/'.$coupon->id)}}" class="btn btn-primary" title="Edit Brand">Edit</a>
                                        <a href="{{url('admin/coupon/delete/'.$coupon->id)}}" class="btn btn-danger" id="delete" title="Delete Brand">Delete</a>
                                    </td>
                                </tr> 
                            @empty
                                <tr>
                                    <td colspan="6">No Data Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Add New Coupon</h6>
                <form action="{{route('admin.coupon.store')}}" class="form-layout" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Coupon Code: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="coupon_code" value="{{old('coupon_code')}}" placeholder="Enter Coupon Code" required>
                        @error('coupon_code')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Coupon Discount(%): <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="discount" value="{{old('discount')}}" placeholder="Enter Coupon Discount" required>
                        @error('discount')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Validity: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="date" name="validity" min="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                        @error('validity')
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