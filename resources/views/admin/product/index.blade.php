@extends('layouts.admin-layout')
@section('title','All Products')
@section('product','active show-sub')
@section('all','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <span class="breadcrumb-item active">All Products</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">All Products</h6>
                <table class="table responsive" id="product-table">
                    <thead>
                        <tr>
                            <th class="wd-5p">SI</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-5p">Price</th>
                            <th class="wd-5p">Discount</th>
                            <th class="wd-15p">Discount Price</th>
                            <th class="wd-15p">Thumbnail</th>
                            <th class="wd-5p">Status</th>
                            <th class="wd-25p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $start=0;
                        @endphp
                        @forelse ($products as $product )
                            
                        <tr>
                            <td class="wd-5p">{{++$start}}</td>
                            <td class="wd-15p">{{$product->product_name_en}}</td>
                            <td class="wd-5p">{{$product->selling_price}}</td>
                            <td class="wd-5p">
                                @if ($product->discount!=null)
                                    <span class="badge badge-primary">{{$product->discount}} %</span>
                                @else
                                <span class="badge badge-warning">No discount</span>
                                @endif
                            </td>
                            <td class="wd-10p">
                                @if ($product->discount_price!=null)
                                    <span class="badge badge-primary">{{$product->discount_price}} </span>
                                @else
                                <span class="badge badge-warning">No discount</span>
                                @endif
                            </td>
                            <td class="wd-15p">
                                <div style="width: 100px;">
                                    <img src="{{asset($product->product_thumbnail)}}"  style="width: 100%;" alt="{{$product->product_name_en}}">
                                </div>
                            </td>
                            <td class="wd-5p">
                                @if ($product->status===1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="wd-30p">
                                <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-success" title="Edit Product"><i class="fa fa-edit"></i></a>
                                <a href="{{route('prouct.edit.image',['id'=>$product->id])}}" class="btn btn-pink" title="Edit Product Imges"><i class="fa fa-image"></i></a>
                                <a href="" class="btn btn-primary" title="View Product"><i class="fa fa-eye"></i></a>
                                <a href="{{route('product.delete',['id'=>$product->id])}}" class="btn btn-danger" id="delete" title="Delete Product"><i class="fa fa-trash"></i></a>
                                @if ($product->status==1)
                                    <a href="{{route('product.inactive',['id'=>$product->id])}}" class="btn btn-danger" title="Inactive Product"><i class="fa fa-arrow-down"></i></a>
                                @else
                                    <a href="{{route('product.active',['id'=>$product->id])}}" class="btn btn-success"title="Active Product"><i class="fa fa-arrow-up"></i></a>
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
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            
            $('select[name="category_id"]').on('change',function(){
                let categoryId=$(this).val();
                if (categoryId) {
                    $.ajax({
                        url:"/admin/sub/sub-category/filter/"+categoryId,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            console.log(data)
                            let d=$('select[name="subcategory_id"]').empty();
                            $.each(data,function(key,value){
                                $('select[name="subcategory_id"]').append(
                                    '<option value="'+value.id+'">'+value.subcategory_name_en+'</option>'
                                );
                            })
                        },
                        error:function(){
                            console.log('No Data Found')
                        }
                    });
                }
            });
        });
        $('#product-table').DataTable({
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
                    title:"Are your sure want to Delete This!",
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
                        Swal.fire('Product is safe','', 'info')
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