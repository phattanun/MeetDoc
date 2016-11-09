<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GlobalComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $_user = Auth::user();
        if(is_null($_user))
            return $view;
        $_user->role = Session::get('_role');
        return $view->with('_user', $_user);
    }

}
