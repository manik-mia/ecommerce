<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserManageController extends Controller
{
    public function index()
    {
        $users = User::where( 'role_id', '!=', 1 )->orderBy( 'name', 'ASC' )->get();
        return view( 'admin.user.index', compact( 'users' ) );
    }
    public function destroy( $userId )
    {
        $user = User::findOrFail( $userId )->delete();
        if ( $user )
        {
            return redirect()->back()->withSuccess( 'User Deleted Sucessfully' );
        }
        else
        {
            return redirect()->back()->withError( 'User Delete Fail' );
        }
    }
    public function suspend( $userId )
    {
        $user = User::findOrFail( $userId )->update( [
            'is_suspend' => true,
        ] );

        if ( $user )
        {
            return redirect()->back()->withSuccess( 'This user Suspended Sucessfully' );
        }
        else
        {
            return redirect()->back()->withError( 'User Suspend Fail' );
        }
    }
    public function continue ( $userId )
    {
        $user = User::findOrFail( $userId )->update( [
            'is_suspend' => false,
        ] );

        if ( $user )
        {
            return redirect()->back()->withSuccess( 'This user is Unsuspend' );
        }
        else
        {
            return redirect()->back()->withError( 'User Unsuspend Fail' );
        }
    }
}
