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
        if(Session::get('_role') == null)
            Session::set('_role', ($_user->staff ? 'Staff' : 'Patient'));
        //     return $view->redirect('/');
        return $view->with('_user', $_user);
    }

}
