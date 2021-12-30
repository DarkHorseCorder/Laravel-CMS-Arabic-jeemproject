<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Http\Controllers\Controller;
use App\MainPage;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PagesController extends Controller
{

    public function cache()
    {
        // Artisan::call('migrate:fresh --seed');
        // dd('migrate:fresh --seed run!');

        // Artisan::call('optimize');
        // Artisan::call('route:clear');
        // Artisan::call('view:clear');
        // Artisan::call('config:clear');
        // Artisan::call('route:cache');
        // Artisan::call('view:cache');
        // Artisan::call('config:cache');
        // Artisan::call('cache:clear');

        dd('route, view, config and optimize cache clean!');
    }

    public function index()
    {
        $section_a = MainPage::where([
            'locale'    => LaravelLocalization::getCurrentLocale(),
            'sections'  => 'sec_a'
        ])
        ->with(['post' => function ($query) {
            $query->select('id', 'title', 'slug', 'image_path', 'author_id');
        }])
        ->first();

        $sections_b = MainPage::where([
            'locale'    => LaravelLocalization::getCurrentLocale(),
            'sections'  => 'sec_b'
        ])
        ->with(['post' => function ($query) {
            $query->select('id', 'title', 'slug', 'image_path', 'author_id');
        }])
        ->take(2)
        ->get();

        $section_c = MainPage::where([
            'locale'    => LaravelLocalization::getCurrentLocale(),
            'sections'  => 'sec_c'
        ])
        ->with(['post' => function ($query) {
            $query->select('id', 'title', 'slug', 'image_path', 'author_id');
        }])
        ->first();

        $sections_d = MainPage::where([
            'locale'    => LaravelLocalization::getCurrentLocale(),
            'sections'  => 'sec_d'
        ])
        ->with(['post' => function ($query) {
            $query->select('id', 'title', 'slug', 'image_path', 'author_id', 'body');
        }])
        ->take(2)
        ->get();

        $topCategories = Category::take(3)->get();
        $topPosts = Post::all();


        $page = null;

        $pageURLs = [
            "en" => url('/en'),
            "ar" => url('/ar'),
            "de" => url('/de'),
        ];
        
        return view('pages.home', compact('section_a', 'sections_b','section_c','sections_d', 'page', 'pageURLs', 'topCategories', 'topPosts'));
    }

    public function search(Request $request)
    {

        $search = $request->input('k');

        $pageURLs = [
            'en' => 'search',
            'ar' => 'search',
            'de' => 'search'
        ];

        $locale = LaravelLocalization::getCurrentLocale();

        $posts = Post::query()
                    ->with(['categories', 'author'])
                    // ->withCount(['categories', 'author'])
                    ->where('title->' . $locale , 'LIKE', "%{$search}%")
                    ->orWhere('body->' . $locale , 'LIKE', "%{$search}%")
                    ->orWhereHas('categories', function ($query) use ($search, $locale){
                        $query->where('title->'. $locale, 'like', '%'.$search.'%');
                    })
                    ->orWhereHas('author', function ($query) use ($search, $locale ){
                        $query->where('title->'. $locale, 'like', '%'.$search.'%');
                    })
                    ->take(10)
                    ->get();


        return view('pages.search', compact('posts', 'search', 'pageURLs'));
    }

}
