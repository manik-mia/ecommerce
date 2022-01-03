<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Review;

class SiteController extends Controller
{
    public function productDetail( $id )
    {
        $singleProduct  = Product::active()->with( 'images' )->findOrFail( $id );
        $hotDeals       = Product::active()->where( 'hot_deals', 1 )->get();
        $brands         = Brand::orderBy( 'brand_name_en', 'ASC' )->get();
        $colorBn        = $singleProduct->product_color_bn;
        $productColorBn = explode( ',', $colorBn );
        $colorEn        = $singleProduct->product_color_en;
        $productColorEn = explode( ',', $colorEn );
        $sizeBn         = $singleProduct->product_size_bn;
        $productSizeBn  = explode( ',', $sizeBn );
        $sizeEn         = $singleProduct->product_size_en;
        $productSizeEn  = explode( ',', $sizeEn );
        $reviews        = Review::with( 'user' )->approve()->get();
        $ratings        = Review::where( 'product_id', $id )->approve()->avg( 'rating' );
        $rating         = number_format( $ratings, 1 );
        return view( 'frontend.product-detail', compact( 'singleProduct', 'hotDeals', 'brands', 'productColorBn', 'productColorEn', 'productSizeBn', 'productSizeEn', 'reviews', 'rating' ) );
    }
    public function subCategoryProduct( $id )
    {
        $products = Product::with( ['reviews' => function ( $status )
        {
            $status->approve();
        },
        ] )->active()->where( 'subcategory_id', $id )->latest()->get();

        return view( 'frontend.product-subcategory', compact( 'products' ) );
    }
    public function subSubCategoryProduct( $id )
    {
        $products = Product::with( ['reviews' => function ( $status )
        {
            $status->approve();
        },
        ] )->active()->where( 'subsubcategory_id', $id )->latest()->get();

        return view( 'frontend.product-subsubcategory', compact( 'products' ) );
    }

}
