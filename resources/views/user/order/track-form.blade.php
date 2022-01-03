@extends('layouts.frontend-layout')
@section('title','User Profile')
@section('content')
    <div class="body-content">
        <div class="container user-dashboard">
            <div class="row">
                @include('user.inc.sideNav')
                <div class="col-sm-9" style="margin-top: 100px;">
                    <div class="tracking-from" style="background: #fff;padding:30px;">
                        <form action="{{route('user.order.track')}}" method="POST" class="form">
                            @csrf
                            <div class="form-group">
                                <label for="">Order Invoice NO</label>
                                <input type="text" id="invocie-no" name="invoice_no" placeholder="Enter Order Invoice NO" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Track</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        
    </script>
@endsection