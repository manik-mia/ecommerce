@extends('layouts.admin-layout')
@section('title','Reviews')
@section('review','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <span class="breadcrumb-item active">Reviews</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Reviews</h6>
                <div class="table-wrapper">
                    <table class="table display responsive nowrap" id="brand-table">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>User Name</th>
                                <th>Comment</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $start=0;
                            @endphp
                            @forelse ($reviews as $review)
                                <tr>
                                    <td>{{++$start}}</td>
                                    <td>{{$review->user->name}}</td>
                                    <td>{{$review->comment}}</td>
                                    <td>{{$review->rating}}</td>
                                    <td>
                                        @if ($review->status==='pending')
                                            <span class="badge badge-danger">
                                                Pending
                                            </span>
                                        @else
                                            <span class="badge badge-success">
                                                Approve
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($review->status==='approve')
                                            <a href="{{route('admin.review.unapprove',['id'=>$review->id])}}" class="btn btn-danger" id="unapprove" title="Unapprove"><i class="fa fa-arrow-down"></i></a>
                                        @else
                                            <a href="{{route('admin.review.approve',['id'=>$review->id])}}" class="btn btn-success" id="approve" title="Approve"><i class="fa fa-arrow-up"></i></a>
                                            <a href="{{route('admin.review.delete',['id'=>$review->id])}}"  title="Delete" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
                title:"Do you want Delete this review!!",
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
                    Swal.fire('This Review is safe','', 'info')
                }
            })    
        });
        $(document).on('click','#approve',function(e){
            e.preventDefault();
            let link=$(this).attr('href');
            Swal.fire({
                title:"Do you want Approve this Review!!",
                text:'Once suspend, you will be able to recover',
                icon:'warning',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Approve',
                denyButtonText: `Don't Approve`,
            }).then((willDelete)=>{
                if (willDelete.isConfirmed) {
                    window.location.href=link;
                }else{
                    Swal.fire('This User is Unapprove','', 'info')
                }
            })    
        });
        $(document).on('click','#unapprove',function(e){
            e.preventDefault();
            let link=$(this).attr('href');
            Swal.fire({
                title:"Do you want Unapprove this Review!!",
                text:'This User is suspended',
                icon:'warning',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Unapprove',
                denyButtonText: `Don't Unapprove`,
            }).then((willDelete)=>{
                if (willDelete.isConfirmed) {
                    window.location.href=link;
                }else{
                    Swal.fire('This Review is Approve','', 'info')
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