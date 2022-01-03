<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    //Show User Dashboard
    public function index()
    {
        return view( 'user.home' );
    }
    //Show User Profile
    public function showProfile()
    {
        $user = User::find( Auth::id() );
        return view( 'user.profile', compact( 'user' ) );
    }
    //Edit User Profile
    public function editProfile()
    {
        $user = User::find( Auth::id() );
        return view( 'user.edit-profile', compact( 'user' ) );
    }
    //Update User Profile
    public function updateProfile( Request $request )
    {
        $request->validate( [
            'name'  => ['required', 'min:10'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'min:10', 'max:20'],
        ] );
        $userUpdate = User::find( Auth::id() )->update( [
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ] );
        if ( $userUpdate )
        {
            return redirect()->route( 'user.profile' )->withSuccess( 'Profile Updated Successfully' );
        }
        else
        {
            return redirect()->back()->withInput()->withErrors( 'Profile Update Fail' );
        }

    }
    //Edit User Profile Image
    public function editProfileImage()
    {
        $user = Auth::user();
        return view( 'user.edit-avater', compact( 'user' ) );
    }

    //Update User Profile
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
                return redirect()->back()->withSuccess( 'Profile Avater Updated Successfully' );
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
                return redirect()->back()->withSuccess( 'Profile Avater Updated Successfully' );
            }
            else
            {
                return redirect()->back()->withError( 'Profile Avater Update Fail' );
            }
        }
    }

    //Edit User Profile
    public function editPassword()
    {
        $user = Auth::user();
        return view( 'user.edit-password', compact( 'user' ) );
    }
    //Update User Profile
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
                return redirect()->back()->withSuccess( 'Password Updated Successfully' );
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
