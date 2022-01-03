@extends('layouts.admin-layout')
@section('title','State | Shipping Area')
@section('shipping-area','active show-sub')
@section('state','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <span class="breadcrumb-item active">State</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-8">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">All States</h6>
                <div class="table-wrapper">
                    <table class="table display responsive nowrap" id="brand-table">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Divison Name</th>
                                <th>District Name</th>
                                <th>State Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $start = 0;
                            @endphp
                            @forelse ($states as $state)   
                                <tr>
                                    <td>{{++$start }}</td>
                                    <td>{{$state->division->name}}</td>
                                    <td>{{$state->district->name}}</td>
                                    <td>{{$state->name}}</td>
                                    <td>
                                        <a href="{{route('shipping.state.edit',['id'=>$state->id])}}" class="btn btn-primary" title="Edit Division">Edit</a>
                                        <a href="{{route('shipping.state.delete',['id'=>$state->id])}}" class="btn btn-danger" id="delete" title="Delete Division">Delete</a>
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
                <h6 class="card-body-title">Add New State</h6>
                <form action="{{route('shipping.state.store')}}" class="form-layout" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Select Division: <span class="tx-danger">*</span></label>
                        <select class="form-control select2 select2-show-search" name="division_id" id="division" data-placeholder="Choose one">
                            <option>Choose Division</option>
                            @foreach ($divisions as $division)
                            <option value="{{$division->id}}">{{$division->name}}</option>
                            @endforeach
                        </select>
                        @error('division_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Select District: <span class="tx-danger">*</span></label>
                        <select class="form-control select2 select2-show-search" name="district_id" id="district" data-placeholder="Choose one">
                            
                        </select>
                        @error('district_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">State Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Enter State Name" required>
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
<script src="{{asset('assets/backend/js/axios.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $('#division').on('change',function () {
            let id=$(this).val();
            console.log(id);
            axios.get("{{url('/admin/district/get')}}/"+id)
            .then(function (response) {
                if (response.status===200) {
                    $('#district').empty();
                    let districts=response.data;
                    $.each(districts,function (i,district) {
                        $('#district').append(
                            '<option value="'+district.id+'">'+district.name+'</option>'
                        )
                    })
                }
            }).catch(function (error) {
                
            })
        })
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