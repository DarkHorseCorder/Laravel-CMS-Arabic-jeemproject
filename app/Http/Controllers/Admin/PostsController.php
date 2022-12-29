<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use App\PostTranslationTag;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PostsController extends Controller
{

    public function __construct()
    {
        LaravelLocalization::setLocale('en');
    }

    public function index()
    {
        $published_posts = Post::with('author', 'comments')->where('is_published', 1)->get();
        $unpublished_posts = Post::with('author', 'comments')->where('is_published', 0)->get();
        // die(var_dump($posts[0]));
        // return $posts[0]->comments->count();

        return view('admin.posts.index', compact('published_posts', 'unpublished_posts'));
    }

    public function comments(Post $post)
    {
        $post->load('comments');

        return view('admin.posts.comments', compact('post'));
    }

    public function create()
    {
        $authors = Author::all();

        $tags = Tag::all();

        $categories = Category::all();

        return view('admin.posts.create', compact('authors', 'tags', 'categories'));
    }

    public function store(StorePostRequest $request)
    {

        // return $request->all();
        if($request->input("action")=="saveAsDraft")
        $request->merge(['is_published' => 0]);
        else $request->merge(['is_published' => 1]);
        if ($request->hasfile('image')) {
            $fileName = time().'.'.$request->image->extension();
            $path = $request->image->storeAs('blogs', $fileName, 'public');
            $request->merge(['image_path' => $path]);
        }
        // die(var_dump($request->all()));
        $request->merge(['user_id'=> auth()->user()->id]);

        DB::beginTransaction();

            $post = Post::create( $request->all() );

            $post->categories()->attach($request['categories']);

            $post->tags()->attach($request['tags']);

        DB::commit();

        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        $authors = Author::all();

        $tags = Tag::all();

        $categories = Category::all();

        return view('admin.posts.edit', compact('authors', 'tags', 'categories', 'post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        // return $post;
        if($request->input("action")=="publish")
        $request->merge(['is_published' => 1]);
        if ($request->hasfile('image')) {
            $fileName = time().'.'.$request->image->extension();
            $path = $request->image->storeAs('blogs', $fileName, 'public');
            $request->merge(['image_path' => $path]);
        }

        $request->merge(['user_id'=> auth()->user()->id]);

        DB::beginTransaction();

            $post->update($request->all());
            $post->categories()->sync($request->input('categories', []));
            $post->tags()->sync($request->input('tags', []));

        DB::commit();
        if($request->input("action")=="publish")
        return redirect()->route('admin.posts.index')->withSuccess('published');
        else
        return redirect()->route('admin.posts.index')->withSuccess('updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->withSuccess($post->title . ' Deleted.');
    }

}
