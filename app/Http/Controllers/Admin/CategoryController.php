<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest as Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //Showing Category
    public function index()
    {
        $categories = Category::latest()->get();
        return view( 'admin.category.index', compact( 'categories' ) );
    }
    //Store Category
    public function store( Request $request )
    {

        $create = Category::create( [
            'category_name_en' => $request->category_name_en,
            'category_slug_en' => Str::slug( $request->category_name_en, '-' ),
            'category_name_bn' => $request->category_name_bn,
            'category_slug_bn' => Str::slug( $request->category_name_bn, '-' ),
            'category_icon'    => $request->category_icon,
        ] );
        if ( $create )
        {
            return redirect()->back()->withSuccess( "{$request->category_name_en} Created Successfully" );
        }
        else
        {
            return redirect()->back()->withInput()->withError( "{$request->category_name_en} Create Fail" );
        }
    }
    //Category Edit
    //Category Update
    public function edit( $categoryId )
    {
        $category = Category::findOrFail( $categoryId );
        return view( 'admin.category.edit-category', compact( 'category' ) );
    }
    public function update( Request $request, $categoryId )
    {
        $update = Category::findOrFail( $categoryId )->update( [
            'category_name_en' => $request->category_name_en,
            'category_slug_en' => Str::slug( $request->category_name_en, '-' ),
            'category_name_bn' => $request->category_name_bn,
            'category_slug_bn' => Str::slug( $request->category_name_bn, '-' ),
            'category_icon'    => $request->category_icon,
        ] );
        if ( $update )
        {
            return redirect()->route( 'admin.category' )->withSuccess( "{$request->category_name_en} Updated Successfully" );
        }
        else
        {
            return redirect()->back()->withInput()->withError( "{$request->category_name_en} Update Fail" );
        }
    }
    //Category Delete
    public function delete( $categoryId )
    {
        $category = Category::findOrFail( $categoryId );
        $delete   = Category::findOrFail( $categoryId )->delete();
        if ( $delete )
        {
            return redirect()->back()->withSuccess( "{$category->category_name_en} Deleted Successfully" );
        }
        else
        {
            return redirect()->back()->withInput()->withError( "{$category->category_name_en} Delete Fail" );
        }
    }
}
