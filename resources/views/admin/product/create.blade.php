@extends('layouts.admin-layout')
@section('title','Add New Product')
@section('product','active show-sub')
@section('add-new','active')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a>
  <a class="breadcrumb-item" href="{{route('products.all')}}">{{__('All Products')}}</a>
  <span class="breadcrumb-item active">Add New Product</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-10 pd-sm-20">
                <h6 class="card-body-title">All New Product</h6>
                <form action="{{route('product.store')}}" method="POST" class="form-layout" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Select Brand <span class="tx-danger">*</span></label>
                                <select class="form-control select2 select2-show-search" name="brand_id" data-placeholder="Choose one">
                                    <option label="Choose one"></option>
                                    @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}" name="brand" >{{$brand->brand_name_en}}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Select Category <span class="tx-danger">*</span></label>
                                <select class="form-control select2 select2-show-search" name="category_id" data-placeholder="Choose one" id="category">
                                    <option label="Choose one"></option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" name="category" >{{$category->category_name_en}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Select Sub Category <span class="tx-danger">*</span></label>
                                <select class="form-control select2 select2-show-search" name="subcategory_id" data-placeholder="Choose one" id="sub-category">
                                    <option label="Choose one"></option>
                                </select>
                                @error('subcategory_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Select Sub Sub Category <span class="tx-danger">*</span></label>
                                <select class="form-control select2 select2-show-search" name="subsubcategory_id" data-placeholder="Choose one" id="sub-sub-category">
                                    <option label="Choose one"></option>
                                </select>
                                @error('subsubcategory_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name English<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name_en" value="{{old('product_name_en')}}" placeholder="Enter Product Name English">
                                @error('product_name_en')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name Bangla<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name_bn" value="{{old('product_name_bn')}}" placeholder="Enter Product Name English">
                                @error('product_name_bn')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Code<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_code" value="{{old('product_code')}}" placeholder="Enter Product Code">
                                @error('product_code')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Quantity English<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_quantity_en" value="{{old('product_quantity_en')}}" placeholder="Enter Product Quantity English">
                                @error('product_quantity_en')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Quantity Bangla<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_quantity_bn" value="{{old('product_quantity_bn')}}" placeholder="Enter Product Quantity Bangla">
                                @error('product_quantity_bn')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Tags English<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_tags_en" value="{{old('product_tags_en')}}" placeholder="Enter Product Tags English" data-role="tagsinput">
                                @error('product_tags_en')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Tags Bangla<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_tags_bn" value="{{old('product_tags_bn')}}" placeholder="Enter Product Tags Bangla"data-role="tagsinput">
                                @error('product_tags_bn')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color English<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_color_en" value="{{old('product_color_en')}}" placeholder="Enter Product Color English" data-role="tagsinput">
                                @error('product_color_en')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color Bangla<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_color_bn" value="{{old('product_color_bn')}}" placeholder="Enter Product Color Bangla" data-role="tagsinput">
                                @error('product_color_bn')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size English<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_size_en" value="{{old('product_size_en')}}" placeholder="Enter Product Size English" data-role="tagsinput">
                                @error('product_size_en')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size Bangla<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_size_bn" value="{{old('product_size_bn')}}" placeholder="Enter Product Size Bangla" data-role="tagsinput">
                                @error('product_size_bn')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Weight English<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_weight_en" value="{{old('product_weight_en')}}" placeholder="Enter Product Weight English">
                                @error('product_weight_en')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Weight Bangla<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_weight_bn" value="{{old('product_size_bn')}}" placeholder="Product Weight Bangla">
                                @error('product_weight_bn')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Selling Price<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="selling_price" value="{{old('selling_price')}}" placeholder="Enter Product Name Bangla">
                                @error('selling_price')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Discount<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="discount" value="{{old('discount')}}" placeholder="Enter Product Name Bangla">
                                @error('discount')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Thumbnail<span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="product_thumbnail" value="{{old('product_thumbnail')}}" accept="image/*" onchange="loadFile(event)">
                                @error('product_thumbnail')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <img style="width:50%;" id="thumbnail-preview"/>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Prdouct Multiple Image<span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="product_multiple_image[]" value="{{old('product_multiple_image')}}" id="multiple-image" multiple>
                                @error('product_multiple_image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="preview-all" id="preview-all"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="ckbox">
                                    <input type="checkbox" value="1" name="hot_deals">
                                    <span>Hot Deals</span>
                                  </label>
                                @error('hot_deals')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="ckbox">
                                    <input type="checkbox" value="1" name="featured">
                                    <span>Featured</span>
                                  </label>
                                @error('featured')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="ckbox">
                                    <input type="checkbox" value="1" name="special_offer">
                                    <span>Special Offer</span>
                                  </label>
                                @error('special_offer')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="ckbox">
                                    <input type="checkbox" value="1" name="special_deals">
                                    <span>Special Deals</span>
                                  </label>
                                @error('special_deals')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Product Short Description English<span class="tx-danger">*</span></label>
                                <textarea name="short_desc_en" class="text-editor" id="short-description-en">{{old('short_desc_en')}}</textarea>
                                @error('short_desc_en')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Product Short Description Bangla<span class="tx-danger">*</span></label>
                                <textarea name="short_desc_bn" class="text-editor" id="short-description-bn">{{old('short_desc_bn')}}</textarea>
                                @error('short_desc_en')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Product Full Description English<span class="tx-danger">*</span></label>
                                <textarea name="full_desc_en" class="text-editor" id="short-description-en">{{old('full_desc_en')}}</textarea>
                                @error('full_desc_en')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Product Full Description Bangla<span class="tx-danger">*</span></label>
                                <textarea name="full_desc_bn" class="text-editor" id="short-description-en">{{old('full_desc_bn')}}</textarea>
                                @error('full_desc_bn')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-layout-footer col-12">
                            <button class="btn btn-info text-center">Save</button>
                        </div>
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

                var $preview = $('#preview-all').empty();
                if (this.files) $.each(this.files, readAndPreview);
                
                function readAndPreview(i, file) {
                
                    if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
                        return alert(file.name +" is not an image");
                    } // else...
                    
                    var reader = new FileReader();

                    $(reader).on("load", function() {
                        $preview.append($("<img/>", {src:this.result, height:100}));
                    });

                    reader.readAsDataURL(file);
                
                }

            }

            $('#multiple-image').on("change", previewImages);


            //Get Sub Category Using Axios
            $('#category').on('change',function(){
                let categoryId=$(this).val();
                let url="/admin/sub/sub-category/filter/"+categoryId;
                axios.get(url)
                .then(function(response){
                    if (response.status==200) {
                        let datas=response.data;
                        $('#sub-category').empty();
                        $('#sub-sub-category').empty();
                        $.each(datas,function(id,subCategory){
                            $('#sub-category').append(
                                '<option value="'+subCategory.id+'">'+subCategory.subcategory_name_en+'</option>'
                            );
                        })
                    }
                }).catch(function (error) {
                    
                })
            });

            //Get Sub Sub Caegory Using 
            $('#sub-category').on('change',function(){
                let subCategoryId=$(this).val();
                let url="/admin/sub/sub/sub-category/filter/"+subCategoryId;
                axios.get(url)
                .then(function(response){
                    if (response.status==200) {
                        let datas=response.data;
                        $('#sub-sub-category').empty();
                        $.each(datas,function(id,subSubCategory){
                            $('#sub-sub-category').append(
                                '<option value="'+subSubCategory.id+'">'+subSubCategory.subsubcategory_name_en+'</option>'
                            );
                        })
                    }
                }).catch(function (error) {
                    
                })
            });
            $('.text-editor').summernote({
                height: 150
            })
        });
        
        
        @if (session()->has('error'))
            Swal.fire({
                icon:'error',
                text:"{{session('error')}}"
            })
        @endif
    </script>
@endsection