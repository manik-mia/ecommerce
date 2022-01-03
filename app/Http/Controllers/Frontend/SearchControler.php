<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchControler extends Controller
{
    public function search( Request $request )
    {
        $request->validate( [
            'search' => 'required | min:2',
        ] );
        $products = Product::where( 'product_name_en', 'LIKE', '%' . $request->search . '%' )
            ->orWhere( 'product_name_bn', 'LIKE', '%' . $request->search . '%' )
            ->orWhere( 'product_tags_en', 'LIKE', '%' . $request->search . '%' )
            ->orWhere( 'product_tags_bn', 'LIKE', '%' . $request->search . '%' )
            ->orWhere( 'short_desc_en', 'LIKE', '%' . $request->search . '%' )
            ->orWhere( 'short_desc_bn', 'LIKE', '%' . $request->search . '%' )
            ->orWhere( 'full_desc_en', 'LIKE', '%' . $request->search . '%' )
            ->orWhere( 'full_desc_bn', 'LIKE', '%' . $request->search . '%' )->get();
        return view( 'frontend.search', compact( 'products' ) );
    }
}
