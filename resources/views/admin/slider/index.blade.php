@extends('layouts.admin-layout')
@section('title','Slider')
@section('slider','active show-sub')
@section('all-slides','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <span class="breadcrumb-item active">Slider</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">All Slides</h6>
                <div class="table-wrapper">
                    <table class="table display responsive" id="brand-table">
                        <thead>
                            <tr>
                                <th class="wd-5p">SI</th>
                                <th class="wd-15p">Title</th>
                                <th class="wd-15p">Sub Title</th>
                                <th class="wd-20p">Image</th>
                                <th class="wd-20p">Description</th>
                                <th class="wd-5p">Status</th>
                                <th class="wd-15p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $start = 0;
                            @endphp
                            @forelse ($slides as $slide)   
                                <tr>
                                    <td class="wd-5p">{{++$start }}</td>
                                    <td class="wd-15p">{{$slide->title_en}}</td>
                                    <td class="wd-15p">{{$slide->sub_title_en}}</td>
                                    <td class="wd-15p">
                                        <div class="brand-image">
                                            <img src="{{asset($slide->image)}}" style="width: 100%;" alt="{{$slide->title_en}}">
                                        </div>
                                    </td>
                                    <td class="wd-20p">{{$slide->description_en}}</td>
                                    <td class="wd-5p">
                                        @if ($slide->status==1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="wd-20p">
                                        <a href="{{route('slider.edit',[$slide->id])}}" class="btn btn-success" title="Slider Edit"><i class="fa fa-edit"></i></a>
                                        <form action="{{route('slider.destroy',[$slide->id])}}" method="POST" id="delete-form">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" title="Slider Delete"><i class="fa fa-trash"></i></button>
                                        </form>
                                        @if ($slide->status==1)
                                            <a href="{{route('slider.inactive',['id'=>$slide->id])}}" class="btn btn-danger" title="Slider Inactive"><i class="fa fa-arrow-down"></i></a>
                                        @else
                                        <a href="{{route('slider.active',['id'=>$slide->id])}}" class="btn btn-success" title="Slider Active"><i class="fa fa-arrow-up"></i></a>
                                        @endif
                                    </td>
                                </tr> 
                            @empty
                                <tr>
                                    <td colspan="6">No Data Found</td>
                                </tr>
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
    <script type="text/javascript">
        $('#brand-table').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
        });
        $(document).on('click','#delete-form',function(e){
            e.preventDefault();
            let link=$(this).attr('action');
            Swal.fire({
                title:"Are your sure want to Delete !",
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
                    Swal.fire('This Slide is safe','', 'info')
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