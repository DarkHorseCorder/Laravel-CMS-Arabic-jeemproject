<?php

namespace App\Http\Controllers\Web;

use App\Author;
use App\Category;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Page;
use App\Post;
use App\Tag;
use App\WebSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PostsController extends Controller
{
    public $locale;
    public $page = [];

    public function __construct()
    {
        $this->locale = LaravelLocalization::getCurrentLocale();
    }

    public function index(Request $request, $slug)
    {
        $pagination = 4;

        $category = Category::where(['slug->'.$this->locale => $slug])->first();

        if( $category ){

            $posts = Post::whereHas('categories', function ($q) use($category) {
                $q->whereIn('id', [$category->id]);
            })
            ->paginate($pagination);

            if ($request->ajax()) {
                return $this->getPosts($posts);
            }

            $page = [
                "title" => $category->getTranslations('title'),
                "slug"  => $category->getTranslations('slug'),
                "info"  => null
            ];

            $segments = [
                $category->getTranslations('slug'),
            ];

            $pageURLs = $this->generateTranslatedURLs($segments);

            return view('pages.posts.index', compact('page', 'pageURLs'));
        }

        $tag = Tag::where(['slug->'.$this->locale => $slug])->first();

        if($tag){

            $posts = Post::whereHas('tags', function ($q) use($tag) {
                $q->whereIn('id', [$tag->id]);
            })
            ->paginate($pagination);

            if ($request->ajax()) {
                return $this->getPosts($posts);
            }

            $page = [
                "title" => $tag->getTranslations('title'),
                "slug"  => $tag->getTranslations('slug'),
                "info"  => null
            ];

            $segments = [
                $tag->getTranslations('slug'),
            ];

            $pageURLs = $this->generateTranslatedURLs($segments);

            return view('pages.posts.index', compact('page', 'pageURLs'));
        }

        $author = Author::where(['slug->'.$this->locale => $slug])->first();

        if($author){
            $posts = Post::whereHas('author', function ($q) use($author) {
                $q->whereIn('id', [$author->id]);
            })
            ->paginate($pagination);

            if ($request->ajax()) {
                return $this->getPosts($posts);
            }

            $page = [
                "title" => $author->getTranslations('title'),
                "slug"  => $author->getTranslations('slug'),
                "info"  => $author->getTranslations('info')
            ];

            $segments = [
                $author->getTranslations('slug'),
            ];

            $pageURLs = $this->generateTranslatedURLs($segments);

            return view('pages.posts.index', compact('page', 'pageURLs'));
        }

        $page = Page::where(['slug->'.$this->locale => $slug])->firstOrFail();

        if($page){

            $segments = [
                $page->getTranslations('slug'),
            ];

            $meta = [
                "title" => $page->getTranslations('title'),
                "slug"  => $page->getTranslations('slug'),
            ];

            $pageURLs = $this->generateTranslatedURLs($segments);

            return view('pages.index', compact('page', 'meta', 'pageURLs'));
        }

        return abort(404);
    }

    public function getPosts($posts)
    {
        $postHtml = '';

        foreach ($posts as $post) {

            $postCategories = '';

            foreach ($post->categories as $category ) {
                $postCategories .= '<a href="'.$category->getTranslation('slug', $this->locale) .'" style="background-color:'. $category->getTranslation('color_code', $this->locale) .'" class="  text-white p-1">'.$category->getTranslation('title', $this->locale).'</a>';
            }

            $postURL = route('post.show', ['category'  => $post->categories[0]->getTranslation('slug', $this->locale), 'author' => $post->author->getTranslation('slug', $this->locale), 'title' => $post->getTranslation('slug', $this->locale)]) ;

            $postHtml .= '<div class="col-span-2 md:col-span-1 relative">';
            $postHtml .= '    <a href="'.$postURL.'"  class=" pattern-1">';
            $postHtml .= '        <picture>';
            $postHtml .= '            <img class="w-full h-[17rem] sm:h-[15rem] lg:h-[19rem] object-cover" src="'. url(config('app.file_base_url') . $post->image_path) .'" alt="'. $post->title .'">';
            $postHtml .= '        </picture>';
            $postHtml .= '    </a>';
            $postHtml .= '    <div class="absolute top-[2rem] left-0 z -10">';
            $postHtml .= '        <div class="block title text-white  px-1">';
            $postHtml .= '            <h3>';
            $postHtml .= '                <a href="'.$postURL.'" class="tags-primary bg-black font-sans ">'.$post->getTranslation('title', $this->locale).'</a>';
            $postHtml .= '            </h3>';
            $postHtml .= '        </div>';
            $postHtml .= '        <div class="space-x-1">';
            $postHtml .=                $postCategories;
            $postHtml .= '        </div>';
            $postHtml .= '        <div class="">';
            $postHtml .= '            <a href="'.route('post.index',$post->author->getTranslation('slug', $this->locale)).'" class="font-sans tags-sec bg-primary-four text-white p-1">';
            $postHtml .= '            '.$post->author->getTranslation('title', $this->locale).'';
            $postHtml .= '            </a>';
            $postHtml .= '        </div>';
            $postHtml .= '    </div>';
            $postHtml .= '</div>';
        }

        echo $postHtml;
    }

    public function show(Request $request, $category, $author , $title)
    {
       $post = Post::with(['author', 'categories', 'tags'])->where(['slug->'. $this->locale => $title])->firstOrFail();

        $related = Post::whereHas('categories', function ($q) use ($post) {
           $q->whereIn('id', $post->categories->pluck('id'));
        })
        ->where('id', '!=', $post->id) // So you won't fetch same post
        ->limit(2)
        ->get(['title', 'slug', 'image_path']);


        $segments = [
            $post->categories->first()->getTranslations('slug'),
            $post->author->getTranslations('slug'),
            $post->getTranslations('slug'),
        ];
        // die(var_dump($post));

        $page = null;

        $pageURLs = $this->generateTranslatedURLs($segments);

        
        return view('pages.posts.show',compact('post', 'related', 'page', 'pageURLs'));
    }

    function generateTranslatedURLs($segmentsArray){

        $translatedUrl = [];

        foreach(LaravelLocalization::getSupportedLocales() as $locale => $p){
            $url = "";
            foreach($segmentsArray as $key => $segment){
                $url .= $segment[$locale].'/';
            }
            $translatedUrl[$locale] = $url;
        }

        return $translatedUrl;
    }
}
