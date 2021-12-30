<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageRequest;
use App\Page;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PagesController extends Controller
{
    public function __construct()
    {
        LaravelLocalization::setLocale('en');
    }

    public function index()
    {
        $pages = Page::all();

        // return $pages[0]->getTranslation('title', 'ar'); 

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(StorePageRequest $request)
    {
        Page::create($request->all());

        return redirect()->route('admin.pages.index');
    }
}
