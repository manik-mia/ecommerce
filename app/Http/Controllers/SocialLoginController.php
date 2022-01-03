<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function google()
    {
        return Socialite::driver( 'google' )->redirect();
    }
    public function loginGoogle()
    {
        $gmailUser = Socialite::driver( 'google' )->user();

        $user = User::where( 'email', '=', $gmailUser->email )->first();

        if ( $user )
        {

            Auth::login( $user );
        }
        else
        {
            $newUser = User::create( [
                'provider_id'       => $gmailUser->id,
                'name'              => $gmailUser->name,
                'email'             => $gmailUser->email,
                'image'             => $gmailUser->avatar,
                'email_verified_at' => Carbon::now(),
                'remember_token'    => null,
            ] );
            Auth::login( $newUser );
        }

        return redirect()->route( 'user.dashboard' );

    }
    public function facebook()
    {
        return Socialite::driver( 'facebook' )->redirect();
    }
    public function loginFacebook()
    {
        $facebookUser = Socialite::driver( 'facebook' )->user();

        $user = User::where( 'email', '=', $facebookUser->email )->first();

        if ( $user )
        {

            Auth::login( $user );
        }
        else
        {
            $newUser = User::create( [
                'provider_id'       => $facebookUser->id,
                'name'              => $facebookUser->name,
                'email'             => $facebookUser->email,
                'image'             => $facebookUser->avatar,
                'email_verified_at' => Carbon::now(),
                'remember_token'    => null,
            ] );
            Auth::login( $newUser );
        }

        return redirect()->route( 'user.dashboard' );

    }
}
