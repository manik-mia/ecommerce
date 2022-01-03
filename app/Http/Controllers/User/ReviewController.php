<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with( 'user' )->latest()->get();
        return view( 'admin.review.index', compact( 'reviews' ) );
    }
    public function create( $productId )
    {
        return view( 'user.review.index', compact( 'productId' ) );
    }
    public function store( Request $request )
    {
        $request->validate( [
            'rating'  => 'required',
            'comment' => 'required',
        ] );
        $review = Review::create( [
            'user_id'    => Auth::id(),
            'product_id' => $request->product_id,
            'comment'    => $request->comment,
            'rating'     => $request->rating,
        ] );
        if ( $review )
        {
            return redirect()->back()->withSuccess( 'Your Review Have been submitted.' );
        }
        else
        {
            return redirect()->back()->withError( 'Fail to submit your review.' );
        }
    }
    public function approve( $id )
    {
        $approve = Review::findOrFail( $id )->update( [
            'status' => 'approve',
        ] );
        if ( $approve )
        {
            return redirect()->back()->withSuccess( 'Review is Approved' );
        }
        else
        {
            return redirect()->back()->withError( 'Review is Unapproved' );
        }
    }
    public function unApprove( $id )
    {
        $upApprove = Review::findOrFail( $id )->update( [
            'status' => 'pending',
        ] );
        if ( $upApprove )
        {
            return redirect()->back()->withSuccess( 'Review is Unapproved' );
        }
        else
        {
            return redirect()->back()->withError( 'Review is Approved' );
        }
    }
    public function destroy( $id )
    {
        $delete = Review::findOrFail( $id )->delete();
        if ( $delete )
        {
            return redirect()->back()->withSuccess( 'Review deleted successfully' );
        }
        else
        {
            return redirect()->back()->withError( 'Review delete fail' );
        }
    }
}
