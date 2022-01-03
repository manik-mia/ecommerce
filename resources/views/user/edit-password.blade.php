@extends('layouts.frontend-layout')
@section('title','User Profile')
@section('content')
    <div class="body-content">
        <div class="container user-dashboard">
            <div class="row">
                @include('user.inc.sideNav',['avater'=>$user->image])
                <div class="col-sm-9" style="margin-top: 220px;">
                    <form action="{{route('user.password.store')}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="old-password">Old Password</label>
                            <input type="password" class="form-control" name="old_password" id="old-password" placeholder="Old Password" value="{{old('old_password')}}">
                            @error('old_password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new-password">New Password</label>
                            <input type="password" class="form-control" name="new_password" id="new-password" placeholder="New Password" value="{{old('new_password')}}">
                            @error('new_password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm-password" placeholder="Re-Type Password" value="{{old('confirm_password')}}">
                            @error('confirm_password')
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