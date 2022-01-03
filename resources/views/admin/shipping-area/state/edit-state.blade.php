@extends('layouts.admin-layout')
@section('title','Edit State | Shipping Area')
@section('shipping-area','active show-sub')
@section('state','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <span class="breadcrumb-item active">State Edit</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Edit State</h6>
                <form action="{{route('shipping.state.update',['id'=>$state->id])}}" class="form-layout" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Select Division: <span class="tx-danger">*</span></label>
                        <select class="form-control select2 select2-show-search" name="division_id" id="division" data-placeholder="Choose one" style="height: 35px; padding:0 10px;">
                            <option label="Choose one" style="height: 25px; padding:0 10px;"></option>
                            @foreach ($divisions as $division)
                                <option value="{{$division->id}}" name="division_id" {{$state->division_id==$division->id ? 'selected': ''}} style="height: 25px; padding:0 10px;">{{$division->name}}</option>
                            @endforeach
                        </select>
                        @error('parent_category')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Select District: <span class="tx-danger">*</span></label>
                        <select class="form-control select2 select2-show-search" name="district_id" id="district" data-placeholder="Choose one">
                            <option value="{{$state->district->id}}" name="division_id">{{$state->district->name}}</option>
                        </select>
                        @error('district_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">State Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{$state->name}}" placeholder="Enter State Name">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Update</button>
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
        @if (session()->has('error'))
            Swal.fire({
                icon:'error',
                text:"{{session('error')}}"
            })
        @endif
    </script>
@endsection