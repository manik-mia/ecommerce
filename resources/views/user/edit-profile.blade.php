@extends('layouts.frontend-layout')
@section('title','User Profile Edit')
@section('content')
    <div class="body-content">
        <div class="container user-profile-edit user-dashboard">
            <div class="row">
                @include('user.inc.sideNav',['avater'=>$user->image])
                <div class="col-sm-9">
                    <form action="{{route('user.profile.store')}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" value="{{$user->name}}">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="{{$user->email}}">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" value="{{$user->phone}}">
                            @error('phone')
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