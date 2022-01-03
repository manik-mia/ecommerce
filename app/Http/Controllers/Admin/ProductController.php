<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductMultipleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    //Show Products
    public function index()
    {
        $products = Product::with( 'images' )->latest()->get();
        //dd( $products );
        return view( 'admin.product.index', compact( 'products' ) );
    }
    //Add Product
    public function create()
    {
        $brands     = Brand::orderBy( 'brand_name_en', 'ASC' )->get();
        $categories = Category::orderBy( 'category_name_en', 'ASC' )->get();
        return view( 'admin.product.create', compact( 'brands', 'categories' ) );
    }
    //Store Product
    public function store( Request $request )
    {
        $request->validate( [
            'brand_id'               => 'required | integer',
            'category_id'            => 'required | integer',
            'subcategory_id'         => 'required | integer',
            'subsubcategory_id'      => 'required | integer',
            'product_name_en'        => 'required | string',
            'product_name_bn'        => 'required | string',
            'product_code'           => 'required | string',
            'product_quantity_en'    => 'nullable | string',
            'product_quantity_bn'    => 'nullable | string',
            'product_tags_en'        => 'required | string',
            'product_tags_bn'        => 'required | string',
            'product_color_en'       => 'nullable | string',
            'product_color_bn'       => 'nullable | string',
            'product_size_en'        => 'nullable | string',
            'product_size_bn'        => 'nullable | string',
            'product_weight_en'      => 'nullable | string',
            'product_weight_bn'      => 'nullable | string',
            'selling_price'          => 'required | integer',
            'discount'               => 'nullable | integer',
            'product_thumbnail'      => 'required',
            'product_multiple_image' => 'required',
            'hot_deals'              => 'nullable',
            'featured'               => 'nullable',
            'special_offer'          => 'nullable',
            'special_deals'          => 'nullable',
            'short_desc_en'          => 'required',
            'short_desc_bn'          => 'required',
            'full_desc_en'           => 'required',
            'full_desc_bn'           => 'required',
        ], [
            'brand_id.required'               => 'Please Select A Brand',
            'category_id.required'            => 'Please Select A Category',
            'subcategory_id.required'         => 'Please Select A Sub Category',
            'subsubcategory_id.required'      => 'Please Select A Sub Sub Category',
            'product_name_en.required'        => 'Please Enter Product Name English',
            'product_name_bn.required'        => 'Please Enter Product Name Bangla',
            'product_code.required'           => 'Please Enter Product Code',
            'product_quantity.required'       => 'Please Enter Product Quantity',
            'product_tags_en.required'        => 'Please Enter Product Tags English',
            'product_tags_bn.required'        => 'Please Enter Product Tags Bangla',
            'product_color_en.required'       => 'Please Enter Product Color English',
            'product_color_bn.required'       => 'Please Enter Product Color Bangla',
            'product_size_en.required'        => 'Please Enter Product Size English',
            'product_size_bn.required'        => 'Please Enter Product Size Bangla',
            'selling_price.required'          => 'Please Enter Product Selling Price',
            'product_thumbnail.required'      => 'Please Enter Product Thumbnail',
            'product_multiple_image.required' => 'Please Enter Product Images',
            'short_desc_en.required'          => 'Enter Product Short Description English',
            'short_desc_bn.required'          => 'Enter Product Short Description Bangla',
            'full_desc_en.required'           => 'Enter Product Full Description English',
            'full_desc_bn.required'           => 'Enter Product Full Description Bangla',
        ] );

        try {

            if ( $request->hasFile( 'product_thumbnail' ) )
            {
                $productThumbnail = $request->file( 'product_thumbnail' );
                $thumbnailName    = uniqid() . time() . '.' . $productThumbnail->extension();
                Image::make( $productThumbnail )->resize( 917, 1000 )->save( 'uploads/products/thumbnails/' . $thumbnailName );
                $thumbnailUrl = 'uploads/products/thumbnails/' . $thumbnailName;
            }
            $discountAmmount = ( $request->selling_price * $request->discount ) / 100;
            $discountPrice   = round( $request->selling_price - $discountAmmount );
            $product         = Product::create( [
                'brand_id'            => $request->brand_id,
                'category_id'         => $request->category_id,
                'subcategory_id'      => $request->subcategory_id,
                'subsubcategory_id'   => $request->subsubcategory_id,
                'product_name_en'     => $request->product_name_en,
                'product_name_bn'     => $request->product_name_bn,
                'product_slug_en'     => Str::slug( $request->product_name_en, '-' ),
                'product_slug_bn'     => str_replace( '', '-', $request->product_name_bn ),
                'product_code'        => $request->product_code,
                'product_quantity_en' => $request->product_quantity_en,
                'product_quantity_bn' => $request->product_quantity_bn,
                'product_tags_en'     => $request->product_tags_en,
                'product_tags_bn'     => $request->product_tags_bn,
                'product_color_en'    => $request->product_color_en,
                'product_color_bn'    => $request->product_color_bn,
                'product_size_en'     => $request->product_size_en,
                'product_size_bn'     => $request->product_size_bn,
                'product_weight_en'   => $request->product_weight_en,
                'product_weight_bn'   => $request->product_weight_bn,
                'selling_price'       => $request->selling_price,
                'discount'            => $request->discount,
                'discount_price'      => $discountPrice,
                'product_thumbnail'   => $thumbnailUrl,
                'hot_deals'           => $request->hot_deals,
                'featured'            => $request->featured,
                'special_offer'       => $request->special_offer,
                'special_deals'       => $request->special_deals,
                'short_desc_en'       => $request->short_desc_en,
                'short_desc_bn'       => $request->short_desc_bn,
                'full_desc_en'        => $request->full_desc_en,
                'full_desc_bn'        => $request->full_desc_bn,
            ] );
            if ( $request->hasFile( 'product_multiple_image' ) )
            {
                $productImages = $request->file( 'product_multiple_image' );
                foreach ( $productImages as $productImage )
                {
                    $imageName = uniqid() . time() . '.' . $productImage->extension();
                    Image::make( $productImage )->resize( 917, 1000 )->save( 'uploads/products/multiple-images/' . $imageName );
                    $imageUrl = 'uploads/products/multiple-images/' . $imageName;
                    $product->images()->create( [
                        'product_image_name' => $imageUrl,
                    ] );
                }
            }
            return redirect()->route( 'products.all' )->withSuccess( "{$request->product_name_en} Added Sccessfully" );
        }
        catch ( \Exception$e )
        {
            return redirect()->back()->withInput()->withError( $e->getMessage() );
        }
    }
    public function edit( $productId )
    {
        $product    = Product::findOrFail( $productId );
        $brands     = Brand::orderBy( 'brand_name_en', 'ASC' )->get();
        $categories = Category::orderBy( 'category_name_en', 'ASC' )->get();
        return view( 'admin.product.edit', compact( 'product', 'brands', 'categories' ) );
    }
    public function update( Request $request, $productId )
    {
        $request->validate( [
            'brand_id'            => 'required | integer',
            'category_id'         => 'required | integer',
            'subcategory_id'      => 'required | integer',
            'subsubcategory_id'   => 'required | integer',
            'product_name_en'     => 'required | string',
            'product_name_bn'     => 'required | string',
            'product_code'        => 'required | string',
            'product_quantity_en' => 'nullable | string',
            'product_quantity_bn' => 'nullable | string',
            'product_tags_en'     => 'required | string',
            'product_tags_bn'     => 'required | string',
            'product_color_en'    => 'nullable | string',
            'product_color_bn'    => 'nullable | string',
            'product_size_en'     => 'nullable | string',
            'product_size_bn'     => 'nullable | string',
            'product_weight_en'   => 'nullable | string',
            'product_weight_bn'   => 'nullable | string',
            'selling_price'       => 'required | integer',
            'discount'            => 'nullable | integer',
            'hot_deals'           => 'nullable',
            'featured'            => 'nullable',
            'special_offer'       => 'nullable',
            'special_deals'       => 'nullable',
            'short_desc_en'       => 'required',
            'short_desc_bn'       => 'required',
            'full_desc_en'        => 'required',
            'full_desc_bn'        => 'required',
        ], [
            'brand_id.required'          => 'Please Select A Brand',
            'category_id.required'       => 'Please Select A Category',
            'subcategory_id.required'    => 'Please Select A Sub Category',
            'subsubcategory_id.required' => 'Please Select A Sub Sub Category',
            'product_name_en.required'   => 'Please Enter Product Name English',
            'product_name_bn.required'   => 'Please Enter Product Name Bangla',
            'product_code.required'      => 'Please Enter Product Code',
            'product_quantity.required'  => 'Please Enter Product Quantity',
            'product_tags_en.required'   => 'Please Enter Product Tags English',
            'product_tags_bn.required'   => 'Please Enter Product Tags Bangla',
            'product_color_en.required'  => 'Please Enter Product Color English',
            'product_color_bn.required'  => 'Please Enter Product Color Bangla',
            'product_size_en.required'   => 'Please Enter Product Size English',
            'product_size_bn.required'   => 'Please Enter Product Size Bangla',
            'selling_price.required'     => 'Please Enter Product Selling Price',
            'short_desc_en.required'     => 'Enter Product Short Description English',
            'short_desc_bn.required'     => 'Enter Product Short Description Bangla',
            'full_desc_en.required'      => 'Enter Product Full Description English',
            'full_desc_bn.required'      => 'Enter Product Full Description Bangla',
        ] );
        try {
            $discountAmmount = ( $request->selling_price * $request->discount ) / 100;
            $discountPrice   = round( $request->selling_price - $discountAmmount );
            Product::findOrFail( $productId )->update( [
                'brand_id'            => $request->brand_id,
                'category_id'         => $request->category_id,
                'subcategory_id'      => $request->subcategory_id,
                'subsubcategory_id'   => $request->subsubcategory_id,
                'product_name_en'     => $request->product_name_en,
                'product_name_bn'     => $request->product_name_bn,
                'product_slug_en'     => Str::slug( $request->product_name_en, '-' ),
                'product_slug_bn'     => str_replace( '', '-', $request->product_name_bn ),
                'product_code'        => $request->product_code,
                'product_quantity_en' => $request->product_quantity_en,
                'product_quantity_bn' => $request->product_quantity_bn,
                'product_tags_en'     => $request->product_tags_en,
                'product_tags_bn'     => $request->product_tags_bn,
                'product_color_en'    => $request->product_color_en,
                'product_color_bn'    => $request->product_color_bn,
                'product_size_en'     => $request->product_size_en,
                'product_size_bn'     => $request->product_size_bn,
                'product_weight_en'   => $request->product_weight_en,
                'product_weight_bn'   => $request->product_weight_bn,
                'selling_price'       => $request->selling_price,
                'discount'            => $request->discount,
                'discount_price'      => $discountPrice,
                'hot_deals'           => $request->hot_deals,
                'featured'            => $request->featured,
                'special_offer'       => $request->special_offer,
                'special_deals'       => $request->special_deals,
                'short_desc_en'       => $request->short_desc_en,
                'short_desc_bn'       => $request->short_desc_bn,
                'full_desc_en'        => $request->full_desc_en,
                'full_desc_bn'        => $request->full_desc_bn,
            ] );
            return redirect()->route( 'products.all' )->withSuccess( "{$request->product_name_en} Successfully Updated" );
        }
        catch ( \Exception$e )
        {
            return redirect()->back()->withInput()->withError( $e->getMessage() );
        }
    }
    public function editImage( $productId )
    {
        $product       = Product::findOrFail( $productId );
        $productImages = ProductMultipleImage::where( 'product_id', $productId )->get();
        return view( 'admin.product.edit-image', compact( 'product', 'productImages' ) );
    }
    public function thumbnailUpdate( Request $request, $productId )
    {
        $oldThumbnail = Product::findOrFail( $productId );
        unlink( $oldThumbnail->product_thumbnail );
        if ( $request->hasFile( 'product_thumbnail' ) )
        {
            $productThumbnail = $request->file( 'product_thumbnail' );
            $thumbnailName    = uniqid() . time() . '.' . $productThumbnail->extension();
            Image::make( $productThumbnail )->resize( 917, 1000 )->save( 'uploads/products/thumbnails/' . $thumbnailName );
            $thumbnailUrl = 'uploads/products/thumbnails/' . $thumbnailName;
            Product::findOrFail( $productId )->update( [
                'product_thumbnail' => $thumbnailUrl,
            ] );
            return redirect()->back()->withSuccess( 'Product Thumbnail Successfull Updated' );
        }
        else
        {
            return redirect()->back()->withInput()->withError( 'Product Thumbnail Update Fail' );
        }
    }
    public function deleteProductImage( $productImageId )
    {
        $oldImage = ProductMultipleImage::findOrFail( $productImageId );
        if ( $oldImage )
        {
            unlink( $oldImage->product_image_name );
            ProductMultipleImage::findOrFail( $productImageId )->delete();
            return redirect()->back()->withSuccess( 'Product Image Deleted Successfully' );
        }
        else
        {
            return redirect()->back()->withError( 'Product Image Delete Fail!!' );
        }
    }
    public function addProductImages( Request $request, $productId )
    {
        try {

            $product = Product::findOrFail( $productId );
            if ( $request->hasFile( 'product_multiple_image' ) )
            {
                $productImages = $request->file( 'product_multiple_image' );
                foreach ( $productImages as $productImage )
                {
                    $imageName = uniqid() . time() . '.' . $productImage->extension();
                    Image::make( $productImage )->resize( 917, 1000 )->save( 'uploads/products/multiple-images/' . $imageName );
                    $imageUrl = 'uploads/products/multiple-images/' . $imageName;
                    $product->images()->create( [
                        'product_image_name' => $imageUrl,
                    ] );
                }
            }
            return redirect()->back()->withSuccess( 'Product Images Added Successfully' );

        }
        catch ( \Exception$e )
        {
            return redirect()->back()->withSuccess( $e->getMessage() );
        }
    }
    public function activeProduct( $productId )
    {
        try {
            Product::findOrFail( $productId )->update( [
                'status' => 1,
            ] );

            return redirect()->back()->withSuccess( 'This Product is Active Now' );
        }
        catch ( \Exception$e )
        {
            return redirect()->back()->withError( $e->getMessage() );
        }

    }
    public function inactiveProduct( $productId )
    {
        try {
            Product::findOrFail( $productId )->update( [
                'status' => 0,
            ] );
            return redirect()->back()->withSuccess( 'This Product is Inactive Now' );
        }
        catch ( \Exception$e )
        {
            return redirect()->back()->withError( $e->getMessage() );
        }

    }
    public function delete( $productId )
    {
        $product = Product::findOrFail( $productId );
        unlink( $product->product_thumbnail );
        $product->delete();
        $productImages = ProductMultipleImage::where( 'product_id', $productId )->get();
        foreach ( $productImages as $productImage )
        {
            $image = ProductMultipleImage::findOrFail( $productImage->id );
            unlink( $image->product_image_name );
            $image->delete();
        }
        return redirect()->back()->withSuccess( 'Product Deleted Successfully' );

    }
}
