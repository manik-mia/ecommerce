@extends('layouts.frontend-layout')
@section('title','User Profile')
@section('content')
    <div class="body-content">
        <div class="container user-dashboard">
            <div class="row">
                @include('user.inc.sideNav')
                <div class="col-sm-9" style="margin-top: 100px;">
                    <table class="table user-info-table">
                        <tbody>
                            <tr>
                                <td>Name : {{$user->name}}</td>
                            </tr>
                            <tr>
                                <td>Email : {{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>Phone : {{$user->phone}}</td>
                            </tr>
                        </tbody>
                    </table>
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
    </script>
@endsection