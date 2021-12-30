<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MainPage;
use App\PageSection;
use App\Post;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        $main_page_sections = MainPage::all();

        return view('admin.main-page.index', compact('main_page_sections'));
    }

    public function create()
    {
        $page_sections = PageSection::all();

        // return Post::all();

        $posts = Post::select(['id','title'])->get();

        return view('admin.main-page.create', compact('page_sections','posts'));
    }

    public function store(Request $request)
    {
        // return $request->all();

        $main_page = MainPage::create($request->all());

        return redirect()->route('admin.main-page.index');
    }

    public function edit(MainPage $main_page)
    {
        $page_sections = PageSection::all();

        $posts = Post::select(['id','title'])->get();

        return view('admin.main-page.edit', compact('page_sections','posts', 'main_page'));
    }

    public function update(Request $request, MainPage $main_page)
    {
        $main_page->update();

        return redirect()->route('admin.main-page.index')->withSuccess('Updated');
    }

    public function destroy(MainPage $main_page)
    {
        $main_page->delete();

        return redirect()->route('admin.main-page.index')->withSuccess('Deleted.');
    }

}
