<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LanguageController extends Controller
{
    public function switchLang(Request $request, $locale)
    {

        // $category = Category::where(['slug->'.session('lang_code') => $slug])->first();

        if (in_array($locale, config('translatable.locales'))) {

            app()->setLocale($locale);

            // dd();
            // session()->put("lang_code", $locale);
            // session()->put("locale",    $locale);

            LaravelLocalization::setLocale($locale);

        //    dd( LaravelLocalization::getCurrentLocale($locale));


            // dd(session('locale'));
            // return redirect()->to( session('url.'.$locale) );

            return redirect()->route('home');

        }

        abort(400);


        // Store the URL on which the user was
        $previous_url = url()->previous();

        // Transform it into a correct request instance
        $previous_request = app('request')->create($previous_url);

        // Get Query Parameters if applicable
        $query = $previous_request->query();

        // In case the route name was translated
        $route_name = app('router')->getRoutes()->match($previous_request)->getName();

        // Store the segments of the last request as an array
        $segments = $previous_request->segments();

        // Check if the first segment matches a language code
        if (array_key_exists($lang, config('translatable.locales'))) {

            // If it was indeed a translated route name
            if ($route_name && Lang::has('routes.'.$route_name, $lang)) {

                // if (in_array($lang, config('translatable.locales'))) {

                    // App::setLocale($lang);

                    // session()->put("lang_code", $lang);

                // Translate the route name to get the correct URI in the required language, and redirect to that URL.
                if (count($query)) {
                    return redirect()->to($lang . '/' .  trans('routes.' . $route_name, [], $lang) . '?' . http_build_query($query));
                }

                return redirect()->to($lang . '/' .  trans('routes.' . $route_name, [], $lang));
            }

            // Replace the first segment by the new language code
            $segments[0] = $lang;

            // Redirect to the required URL
            if (count($query)) {
                return redirect()->to(implode('/', $segments).'?'.http_build_query($query));
            }

            return redirect()->to(implode('/', $segments));
        }

        return redirect()->back();
    }
}
