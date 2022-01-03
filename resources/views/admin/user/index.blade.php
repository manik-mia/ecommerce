@extends('layouts.admin-layout')
@section('title','All User')
@section('user','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <span class="breadcrumb-item active">All User</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">All User</h6>
                <div class="table-wrapper">
                    <table class="table display responsive nowrap" id="brand-table">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Phone</th>
                                <th>Online</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $start=0;
                            @endphp
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{++$start}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        @if ($user->userOnline())
                                            <span class="badge badge-success">
                                                Active
                                            </span>
                                        @else
                                            <span class="badge badge-danger">
                                                {{Carbon\Carbon::parse($user->last_seen)->diffForHumans()}}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->is_suspend===0)
                                            <span class="badge badge-success">
                                                Unsuspend
                                            </span>
                                        @else
                                            <span class="badge badge-danger">
                                                Suspend
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->is_suspend===0)
                                            <a href="{{route('admin.user.suspend',['id'=>$user->id])}}" class="btn btn-danger" id="suspend" title="Suspend User"><i class="fa fa-arrow-down"></i></a>
                                        @else
                                            <a href="{{route('admin.user.continue',['id'=>$user->id])}}" class="btn btn-success" id="unsuspend" title="Unsuspend User"><i class="fa fa-arrow-up"></i></a>
                                            <a href="{{route('admin.user.destroy',['id'=>$user->id])}}"  title="Delete User" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('assets/backend/js/axios.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        
        $('#brand-table').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
        });
        $(document).on('click','#delete',function(e){
            e.preventDefault();
            let link=$(this).attr('href');
            Swal.fire({
                title:"Do you want Delete this user!!",
                text:'Once deleted, you will not be able to recover',
                icon:'warning',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                denyButtonText: `Don't Delete`,
            }).then((willDelete)=>{
                if (willDelete.isConfirmed) {
                    window.location.href=link;
                }else{
                    Swal.fire('This User is safe','', 'info')
                }
            })    
        });
        $(document).on('click','#suspend',function(e){
            e.preventDefault();
            let link=$(this).attr('href');
            Swal.fire({
                title:"Do you want Suspend this user!!",
                text:'Once suspend, you will be able to recover',
                icon:'warning',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Suspend',
                denyButtonText: `Don't Suspend`,
            }).then((willDelete)=>{
                if (willDelete.isConfirmed) {
                    window.location.href=link;
                }else{
                    Swal.fire('This User is Unsuspend','', 'info')
                }
            })    
        });
        $(document).on('click','#unsuspend',function(e){
            e.preventDefault();
            let link=$(this).attr('href');
            Swal.fire({
                title:"Do you want Continue this user!!",
                text:'This User is suspended',
                icon:'warning',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Continue',
                denyButtonText: `Don't Continue`,
            }).then((willDelete)=>{
                if (willDelete.isConfirmed) {
                    window.location.href=link;
                }else{
                    Swal.fire('This User is Suspend','', 'info')
                }
            })    
        });
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