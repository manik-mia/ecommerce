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
            <form action="{{route('admin.password.update')}}" class="form" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="old-password">Old Password</label>
                    <input type="password" class="form-control" name="old_password" id="old-password" placeholder="Old Password">
                    @error('old_password')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="password" name="new_password" class="form-control" id="new-password" placeholder="New Password">
                    @error('new_password')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm-password" placeholder="Re-Type Password">
                    @error('confirm_password')
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