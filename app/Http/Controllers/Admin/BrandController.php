<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest as Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    //Show Brand
    public function index()
    {
        $brands = Brand::latest()->get();
        return view( 'admin.brand.index', compact( 'brands' ) );
    }

    //Store Brand
    public function store( Request $request )
    {
        if ( $request->hasFile( 'brand_image' ) )
        {
            $brandImage = $request->file( 'brand_image' );
            $imageName  = hexdec( uniqid() ) . '.' . $brandImage->getClientOriginalExtension();
            Image::make( $brandImage )->resize( 166, 110 )->save( 'uploads/brands/' . $imageName );
            $url = 'uploads/brands/' . $imageName;

        }
        $create = Brand::create( [
            'brand_name_en' => $request->brand_name_en,
            'brand_slug_en' => Str::slug( $request->brand_name_en, '-' ),
            'brand_name_bn' => $request->brand_name_bn,
            'brand_slug_bn' => Str::slug( $request->brand_name_bn, '-' ),
            'brand_image'   => $url,
        ] );
        if ( $create )
        {
            return redirect()->back()->withSuccess( 'Brand Added Successfully' );
        }
        else
        {
            return redirect()->back()->withInput()->withError( 'Brand Add Fail' );
        }
    }

    //Edit Brand
    public function editBrand( $brandId )
    {

        $brand = Brand::findOrFail( $brandId );
        return view( 'admin.brand.edit-brand', compact( 'brand' ) );

    }

    //Update Brand
    public function updateBrand( Request $request, $brandId )
    {
        try {
            if ( $request->brand_image != null )
            {
                if ( $request->hasFile( 'brand_image' ) )
                {
                    unlink( $request->old_brand_image );
                    $brandImage = $request->file( 'brand_image' );
                    $imageName  = hexdec( uniqid() ) . '.' . $brandImage->getClientOriginalExtension();
                    Image::make( $brandImage )->resize( 166, 110 )->save( 'uploads/brands' . $imageName );
                    $url = 'uploads/brands' . $imageName;

                }
                Brand::findOrFail( $brandId )->update( [
                    'brand_name_en' => $request->brand_name_en,
                    'brand_slug_en' => Str::slug( $request->brand_name_en, '-' ),
                    'brand_name_bn' => $request->brand_name_bn,
                    'brand_slug_bn' => Str::slug( $request->brand_name_bn, '-' ),
                    'brand_image'   => $url,
                ] );
                return redirect()->route( 'admin.brand' )->withSuccess( 'Brand Updated Successfully' );
            }
            else
            {
                Brand::findOrFail( $brandId )->update( [
                    'brand_name_en' => $request->brand_name_en,
                    'brand_slug_en' => Str::slug( $request->brand_name_en, '-' ),
                    'brand_name_bn' => $request->brand_name_bn,
                    'brand_slug_bn' => Str::slug( $request->brand_name_bn, '-' ),
                ] );
                return redirect()->route( 'admin.brand' )->withSuccess( 'Brand Updated Successfully' );

            }
        }
        catch ( \Exception$e )
        {
            return redirect()->back()->withInput()->withError( $e->getMessage() );
        }
    }

    //Delete Brand
    public function deleteBrand( $brandId )
    {
        try {
            $brandImage = Brand::findOrFail( $brandId )->brand_image;
            unlink( $brandImage );
            Brand::findOrFail( $brandId )->delete();
            return redirect()->back()->withSuccess( 'Brand Deleted Successfully' );
        }
        catch ( \Exception$e )
        {
            return redirect()->back()->withError( $e->getMessage() );
        }
    }
}
