<?php

namespace App\View\Composers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AvatarComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose( View $view )
    {
        $view->with( 'userAvater', User::findOrFail( Auth::id() ) );
    }
}