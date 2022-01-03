<?php

namespace App\Providers;

use App\View\Composers\AvatarComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer( 'user.inc.sideNav', AvatarComposer::class );
        View::composer( 'admin.inc.header', AvatarComposer::class );
    }
}
