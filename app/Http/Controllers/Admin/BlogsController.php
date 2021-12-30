<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Resources\BlogsResource;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blogs.index');
    }

    public function getBlogs()
    {
        return BlogsResource::collection( Blog::all() )->response();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags =Tag::all();

        return view('admin.blogs.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        if ($request->hasfile('image')) {
            $fileName = time().'.'.$request->image->extension();
            $path = $request->image->storeAs('blogs', $fileName, 'public');
            $request->merge(['image_path' => $path]);
        }

        $request->is_published == "on" ? $request->merge(['is_published' => true]) : $request->merge(['is_published' => false]);
        $request->merge(['user_id' => Auth::user()->id]);

        DB::beginTransaction();
            $blog = Blog::create($request->all());
            $blog->tags()->sync( $request->tags, []);
        DB::commit();

        return redirect()->route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return redirect()->route('services.show', $blog->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        $tags =Tag::all();
        $blog->load('tags');

        return view('admin.blogs.edit', compact('blog', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        // return $request->all();

        if ($request->hasfile('image')) {
            $fileName = time().'.'.$request->image->extension();
            $path = $request->image->storeAs('blogs', $fileName, 'public');
            $request->merge(['image_path' => $path]);
        }

        $request->is_published == "on" ? $request->merge(['is_published' => true]) : $request->merge(['is_published' => false]);

        DB::beginTransaction();
            $blog->update($request->all());
            $blog->tags()->sync($request->input('tags', []));
        DB::commit();

        return redirect()->route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index')->withSuccess($blog->title . ' Deleted.');
    }

}
