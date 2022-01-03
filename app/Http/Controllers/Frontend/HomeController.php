<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{
    public function home()
    {
        $products = Product::with( ['reviews' => function ( $status )
        {
            $status->approve();
        },
        ] )->active()->latest()->get();

        $slider = Slider::active()->latest()->get();

        $hotDeals = Product::with( ['reviews' => function ( $status )
        {
            $status->approve();
        },
        ] )->active()->where( 'hot_deals', 1 )->get();

        $featureProduct = Product::with( ['reviews' => function ( $status )
        {
            $status->approve();
        },
        ] )->active()->where( 'featured', 1 )->get();

        $specialOffers = Product::with( ['reviews' => function ( $status )
        {
            $status->approve();
        },
        ] )->active()->where( 'special_offer', 1 )->get();

        $specialDeals = Product::with( ['reviews' => function ( $status )
        {
            $status->approve();
        },
        ] )->active()->where( 'special_deals', 1 )->get();

        $brands = Brand::orderBy( 'brand_name_en', 'ASC' )->get();
        return view( 'frontend.home', compact( 'products', 'slider', 'hotDeals', 'featureProduct', 'specialOffers', 'specialDeals', 'brands' ) );
    }
    public function productView( $id )
    {
        $product         = Product::with( 'images', )->findOrFail( $id );
        $productCategory = Category::findOrFail( $product->category_id );
        $productBrand    = Brand::findOrFail( $product->brand_id );
        $colorBn         = $product->product_color_bn;
        $productColorBn  = explode( ',', $colorBn );
        $colorEn         = $product->product_color_en;
        $productColorEn  = explode( ',', $colorEn );
        $sizeBn          = $product->product_size_bn;
        $productSizeBn   = explode( ',', $sizeBn );
        $sizeEn          = $product->product_size_en;
        $productSizeEn   = explode( ',', $sizeEn );
        return response()->json( [
            'product'  => $product,
            'category' => $productCategory,
            'brand'    => $productBrand,
            'colorsBn' => $productColorBn,
            'colorsEn' => $productColorEn,
            'sizesBn'  => $productSizeBn,
            'sizesEn'  => $productSizeEn,
        ] );
    }

}
