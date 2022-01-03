@extends('layouts.admin-layout')
@section('title','Admin Profile Edit')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Admin</a>
    <a class="breadcrumb-item" href="{{route('admin.profile')}}">Profile</a>
    <span class="breadcrumb-item active">Edit</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <form action="{{route('admin.profile.update')}}" class="form" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="full-name">Full Name</label>
                    <input type="text" class="form-control" name="name" value="{{$admin->name}}" id="full-name" placeholder="Full Name">
                    @error('name')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" value="{{$admin->email}}" class="form-control" id="email" placeholder="Email Address">
                    @error('email')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" value="{{$admin->phone}}" class="form-control" id="phone" placeholder="Phone Number">
                    @error('phone')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        @if (session()->has('error'))
            Swal.fire({
                icon:'error', 
                text:"{{session('error')}}"
            })
        @endif
    </script>
@endsection