@extends('layouts.admin-layout')
@section('title','Admin Profile')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Admin</a>
    <span class="breadcrumb-item active">Profle</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <table class="table p-5">
                <tr>
                    <td>Name:</td>
                    <td>{{$admin->name}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{$admin->email}}</td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td>{{$admin->phone}}</td>
                </tr>
                <tr>
                    <td>Avater:</td>
                    <td>
                        <div class="avater" style="width: 150px;">
                            <img src="{{asset($admin->image)}}" style="width:100%" alt="{{$admin->name}}">
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        @if (session()->has('success'))
            Swal.fire({
                icon:'success',
                text:"{{session('success')}}"
            })
        @endif
    </script>
@endsection