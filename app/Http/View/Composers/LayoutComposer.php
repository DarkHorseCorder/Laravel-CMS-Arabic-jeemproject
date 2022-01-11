<?php

namespace App\Http\View\Composers;

use App\Category;
use App\Menu;
use App\Page;
use App\Service;
use App\WebSetting;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LayoutComposer
{
    public function compose(View $view)
    {
        $view->with([
            'locale'        => LaravelLocalization::getCurrentLocale(),
            'categories'    => Category::all(),
            'menus'         => Menu::all(),
            'pages'         => Page::all(),
            'web_setting'   => WebSetting::first()
        ]);
    }
}
