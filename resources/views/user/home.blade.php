@extends('layouts.frontend-layout')
@section('title','User Dashboard')
@section('content')
    <div class="body-content user-dashboard">
        <div class="container">
            <div class="row">
                @include('user.inc.sideNav')
                <div class="col-sm-9">
                    <div class="row">
                        
                    </div>
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
