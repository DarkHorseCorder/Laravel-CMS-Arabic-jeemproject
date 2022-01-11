<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LocalizationComposer {

    public function compose(View $view)
    {
        dd('ss');
        
        $view->with('currentLocale',    LaravelLocalization::getCurrentLocale());
        $view->with('altLocale',        config('app.fallback_locale'));
    }

}
