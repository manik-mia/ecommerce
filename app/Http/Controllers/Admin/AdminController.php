<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        return view( 'admin.home' );
    }
    //Show Admin Profile
    public function showProfile()
    {
        $admin = Auth::user();
        return view( 'admin.profile.profile', compact( 'admin' ) );
    }
    //Edit Admin Profile
    public function editProfile()
    {
        $admin = Auth::user();
        return view( 'admin.profile.edit-profile', compact( 'admin' ) );
    }
    //Update Admin Profile
    public function updateProfile( Request $request )
    {
        $request->validate( [
            'name'  => 'required',
            'email' => 'required|email',
            'phone' => 'required| min:10 |max:20',
        ] );
        $update = User::findOrFail( Auth::id() )->update( [
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ] );
        if ( $update )
        {
            return redirect()->route( 'admin.profile' )->withSuccess( 'Profile Updated Successfully' );
        }
        else
        {
            return redirect()->back()->withinput()->withError( 'Profile Updated Successfully' );
        }

    }
    //Edit Admin Avater
    public function editAvater()
    {
        $oldAvater = User::findOrFail( Auth::id() )->image;
        return view( 'admin.profile.edit-avater', compact( 'oldAvater' ) );
    }
    //Update Admin Avater
    public function updateAvater( Request $request )
    {
        $oldAvater = $request->old_avater;
        if ( $oldAvater == 'assets/frontend/media/avater.png' )
        {
            $avater     = $request->file( 'new_avater' );
            $avaterName = hexdec( uniqid() ) . '.' . $avater->getClientOriginalExtension();
            Image::make( $avater )->resize( 300, 300 )->save( 'assets/frontend/media/' . $avaterName );
            $url          = 'assets/frontend/media/' . $avaterName;
            $avaterUpdate = User::findOrFail( Auth::id() )->update( [
                'image' => $url,
            ] );
            if ( $avaterUpdate )
            {
                return redirect()->route( 'admin.profile' )->withSuccess( 'Profile Avater Updated Successfully' );
            }
            else
            {
                return redirect()->back()->withError( 'Profile Avater Update Fail' );
            }
        }
        else
        {
            unlink( $oldAvater );
            $avater     = $request->file( 'new_avater' );
            $avaterName = hexdec( uniqid() ) . '.' . $avater->getClientOriginalExtension();
            Image::make( $avater )->resize( 300, 300 )->save( 'assets/frontend/media/' . $avaterName );
            $url          = 'assets/frontend/media/' . $avaterName;
            $avaterUpdate = User::findOrFail( Auth::id() )->update( [
                'image' => $url,
            ] );
            if ( $avaterUpdate )
            {
                return redirect()->route( 'admin.profile' )->withSuccess( 'Profile Avater Updated Successfully' );
            }
            else
            {
                return redirect()->back()->withError( 'Profile Avater Update Fail' );
            }
        }
    }
    //Edit Admin Password
    public function editPassword()
    {
        return view( 'admin.profile.edit-password' );
    }
    //Update Admin Passwrd
    public function updatePassword( Request $request )
    {
        $userPassword    = Auth::user()->password;
        $oldPassword     = $request->old_password;
        $newPassword     = $request->new_password;
        $confirmPassword = $request->confirm_password;
        $request->validate( [
            'old_password'     => 'required | min:8 ',
            'new_password'     => 'required | min:8 ',
            'confirm_password' => 'required | min:8 ',
        ] );
        if ( Hash::check( $oldPassword, $userPassword ) )
        {
            if ( $newPassword === $confirmPassword )
            {
                User::findOrFail( Auth::id() )->update( [
                    'password' => Hash::make( $newPassword ),
                ] );
                return redirect()->route( 'admin.profile' )->withSuccess( 'Password Updated Successfully' );
            }
            else
            {
                return redirect()->back()->withError( 'New Password And Comfirm Password Does Not Match' );
            }
        }
        else
        {
            return redirect()->back()->withError( 'Old Password Does not Match' );
        }
    }
}
