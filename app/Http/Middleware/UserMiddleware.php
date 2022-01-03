<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( Request $request, Closure $next )
    {
        //user Active Detection
        if (Auth::check()) {
            $expireTime=Carbon::now()->addSeconds(60);
            Cache::put('online-user' . Auth::user()->id,true,$expireTime);
            User::where('id',Auth::user()->id)->update([
                'last_seen'=>Carbon::now(),
            ]);
        }

        if ( Auth::check() && Auth::user()->is_suspend == 1 )
        {

            Auth::logout();
            return redirect()->route( 'login' )->withError('Your Account has been suspended.Please contact with Administration.' );

        }
        else
        {
            
            if ( Auth::check() && Auth::user()->role_id == 2 )
            {
                return $next( $request );
            }
            else
            {
                return redirect()->route( 'login' );
            }
        }
        //user Active Detection
        if (Auth::check()) {
            $expireTime=Carbon::now()->addSeconds(30);
            Cache::put('online-user' . Auth::user()->id,true,$expireTime);
            User::where('id',Auth::user()->id)->update([
                'last_seen'=>Carbon::now(),
            ]);
        }
        

    }
}
