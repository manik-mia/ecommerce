<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubSubCategoryController extends Controller
{
    public function index()
    {
        $categories       = Category::orderBy( 'category_name_en', 'ASC' )->get();
        $subSubCategories = SubSubCategory::latest()->get();
        return view( 'admin.sub-sub-category.index', compact( 'categories', 'subSubCategories' ) );
    }

    public function store( Request $request )
    {
        $request->validate( [
            'category_id'            => 'required',
            'subcategory_id'         => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_bn' => 'required',
        ], [
            'category_id.required'    => 'Please Select A Category',
            'subcategory_id.required' => 'Please Select A Sub Category',
        ] );
        $insert = SubSubCategory::create( [
            'category_id'            => $request->category_id,
            'subcategory_id'         => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_slug_en' => Str::slug( $request->subsubcategory_name_en, '-' ),
            'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
            'subsubcategory_slug_bn' => Str::slug( $request->subsubcategory_name_bn, '-' ),
        ] );
        if ( $insert )
        {
            return redirect()->back()->withSuccess( "{$request->subsubcategory_name_en} Successfully Added" );
        }
        else
        {
            return redirect()->back()->withInput()->withError( "{$request->subsubcategory_name_en} Add Fail" );
        }
    }
    // Edit Sub Category
    public function edit( $subSubCategoryId )
    {
        $subSubCategory = SubSubCategory::findOrFail( $subSubCategoryId );
        return view( 'admin.sub-sub-category.edit-subcategory', compact( 'subSubCategory' ) );
    }
    public function update( Request $request, $subSubCategoryId )
    {
        $request->validate( [
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_bn' => 'required',
        ] );
        $update = SubSubCategory::findOrFail( $subSubCategoryId )->update( [
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_slug_en' => Str::slug( $request->subsubcategory_name_en, '-' ),
            'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
            'subsubcategory_slug_bn' => Str::slug( $request->subsubcategory_name_bn, '-' ),
        ] );
        if ( $update )
        {
            return redirect()->route( 'admin.subSubCategory' )->withSuccess( "{$request->subsubcategory_name_en} Successfuly Updated" );
        }
        else
        {
            return redirect()->back()->withInput()->withError( "{$request->subsubcategory_name_en} Update Fail!!" );
        }
    }
    //Delete Sub Sub Category
    public function delete( $subSubCategoryId )
    {
        $delete = SubSubCategory::findOrFail( $subSubCategoryId )->delete();
        if ( $delete )
        {
            return redirect()->back()->withSuccess( 'Sub Sub Category SuccessFully Deleted!' );
        }
        else
        {
            return redirect()->back()->withError( 'Sub Sub Category Delete Fail!!' );
        }
    }

    //Filtet Sub Category With Ajax
    public function filterSubCategory( $categoryId )
    {
        $subCategories = SubCategory::where( 'category_id', $categoryId )->orderBy( 'subcategory_name_en', 'ASC' )->get();
        return json_encode( $subCategories );
    }
    //Filtet Sub Category With Ajax
    public function filterSubSubCategory( $subCategoryId )
    {
        $subSubCategories = SubSubCategory::where( 'subcategory_id', $subCategoryId )->orderBy( 'subsubcategory_name_en', 'ASC' )->get();
        return json_encode( $subSubCategories );
    }
}
