<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories    = Category::orderBY( 'category_name_en', 'ASC' )->get();
        $subCategories = SubCategory::with( 'category' )->latest()->get();
        return view( 'admin.sub-category.index', compact( 'categories', 'subCategories' ) );
    }
    public function store( Request $request )
    {
        $request->validate( [
            'category_id'         => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
        ], [
            'category_id.required' => 'Please Select Parent Category',
        ] );
        $subcategory = SubCategory::create( [
            'category_id'         => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_slug_en' => Str::slug( $request->subcategory_name_en, '-' ),
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_bn' => Str::slug( $request->subcategory_name_bn, '-' ),
        ] );
        if ( $subcategory )
        {
            return redirect()->back()->withSuccess( "{$request->subcategory_name_en} Added Successfully" );
        }
        else
        {
            return redirect()->back()->withInput()->withError( "{$request->subcategory_name_en} Add Fail" );
        }
    }
    public function editSubCategory( $subCategoryId )
    {
        $subCategory = SubCategory::findOrFail( $subCategoryId );
        $categories  = Category::latest()->get();
        return view( 'admin.sub-category.edit-subcategory', compact( 'subCategory', 'categories' ) );
    }
    //Sub Category Delete
    public function update( Request $request, $subCategoryId )
    {
        $request->validate( [
            'category_id'         => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
        ], [
            'category_id.required' => 'Please Select Parent Category',
        ] );
        $updated = SubCategory::findOrFail( $subCategoryId )->update( [
            'category_id'         => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_slug_en' => Str::slug( $request->subcategory_name_en, '-' ),
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_bn' => Str::slug( $request->subcategory_name_bn, '-' ),
        ] );
        if ( $updated )
        {
            return redirect()->route( 'admin.subCategory' )->withSuccess( "{$request->subcategory_name_en} Updated Successfully" );
        }
        else
        {
            return redirect()->back()->withInput()->withError( "{$request->subcategory_name_en}Update Fail" );
        }
    }
    public function delete( $subCategoryId )
    {
        $delete = SubCategory::findOrFail( $subCategoryId )->delete();
        if ( $delete )
        {
            return redirect()->back()->withInput()->withSuccess( "Sub Category Deleted Successfully" );
        }
        else
        {
            return redirect()->back()->withInput()->withError( "Sub Category Delete Fail" );
        }
    }
}
