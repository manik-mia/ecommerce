@extends('layouts.admin-layout')
@section('title','Edit Product Images')
@section('product','active show-sub')
@section('add-new','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <a class="breadcrumb-item" href="{{route('products.all')}}">{{__('Products')}}</a>
  <span class="breadcrumb-item active">Edit Image</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">Edit Product Images</h6>
                <form action="{{route('product.thumbnail.update',['id'=>$product->id])}}" method="POST" class="form-layout" enctype="multipart/form-data">
                    <div class="row">
                        @method('PATCH')
                        @csrf
                        <div class="col-md-4 thumbnail mt-2">
                            <h6>Old Product Thumbnail</h6>
                            <div>
                                <img style="width: 100%;" src="{{asset($product->product_thumbnail)}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Thumbnail<span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="product_thumbnail" accept="image/*" onchange="loadFile(event)">
                                @error('product_thumbnail')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <img style="width:80%;" id="thumbnail-preview"/>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="form-layout-footer col-12">
                            <button class="btn btn-info text-center">Update Thumbnail</button>
                        </div>
                    </div>
                </form>
                <form action="{{route('product.store')}}" method="POST" class="form-layout" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    
                    <h6 class="mt-5">Old Product Images</h6>
                    <div class="row">
                        
                        @foreach ($productImages as $productImage)
                            
                        <div class="col-md-4">
                            <img style="width:80%;" class="d-block" src="{{asset($productImage->product_image_name)}}">
                            
                            <a href="{{route('product.image.delete',['id'=>$productImage->id])}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                            <div class="form-group">
                                <label class="form-control-label mt-3">Prdouct Multiple Image<span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="product_multiple_image[{{$productImage->id}}]" id="multiple-image" multiple>
                                @error('product_multiple_image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        @endforeach
                        <div class="form-layout-footer col-12">
                            <button class="btn btn-info text-center">Update Images</button>
                        </div>
                    </div>
                </form>
                <form action="{{route('product.images.store',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data" class="mt-5">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Add Prdouct Images <span class="tx-danger">*</span></label>
                            {{-- <input type="hidden" name="images_id" value="{{}}"> --}}
                            <input class="form-control multiple-image" type="file" name="product_multiple_image[]" value="{{old('product_multiple_image')}}" id="multiple-image" multiple>
                            @error('product_multiple_image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="preview-all" id="preview-all"></div>
                    </div>
                    
                    <div class="form-layout-footer col-12">
                        <button class="btn btn-info text-center">Upload Images</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">

    //Product Thumbnail Preview
    var loadFile = function(event) {
    var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('thumbnail-preview');
            output.src = reader.result;
            };
        reader.readAsDataURL(event.target.files[0]);
    };
    $(document).ready(function(){

        
        // Multile Image preview
        function previewImages() {

            var $preview = $('.preview-all').empty();
            if (this.files) $.each(this.files, readAndPreview);

            function readAndPreview(i, file) {

                if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
                    return alert(file.name +" is not an image");
                } // else...
                
                var reader = new FileReader();

                $(reader).on("load", function() {
                    $preview.append($("<img/>", {src:this.result, width:200}));
                });

                reader.readAsDataURL(file);

            }

        }

        $('.multiple-image').on("change", previewImages);


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
                    Swal.fire('Your Product Image is safe','', 'info')
                }
            })
        });
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