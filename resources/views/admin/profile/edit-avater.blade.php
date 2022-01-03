@extends('layouts.admin-layout')
@section('title','Admin Profile Edit')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Admin</a>
    <a class="breadcrumb-item" href="{{route('admin.profile')}}">Profile</a>
    <span class="breadcrumb-item active">Edit Avater</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <form action="{{route('admin.avater.update')}}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="full-name">Avater</label>
                    <input type="hidden" name="old_avater" value="{{$oldAvater}}">
                    <input type="file" class="form-control" name="new_avater">
                    @error('new_avater')
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