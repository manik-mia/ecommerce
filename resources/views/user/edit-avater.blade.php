@extends('layouts.frontend-layout')
@section('title','User Profile Edit')
@section('content')
    <div class="body-content">
        <div class="container user-profile-edit user-dashboard">
            <div class="row">
                @include('user.inc.sideNav',['avater'=>$user->image])
                <div class="col-sm-9">
                    <form action="{{route('user.image.update')}}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="avater">Profile Image</label>
                            <input type="hidden" name="old_avater" value="{{$user->image}}">
                            <input type="file" class="form-control" name="new_avater" id="avater">
                            @error('image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
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
        @if (session()->has('error'))
            Swal.fire({
                icon:'error', 
                text:"{{session('error')}}"
            })
        @endif
    </script>
@endsection