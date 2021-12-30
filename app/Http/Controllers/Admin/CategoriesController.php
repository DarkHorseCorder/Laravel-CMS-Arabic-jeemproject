<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $colors = Color::all();

        return view('admin.categories.create', compact('colors'));
    }

    public function store(StoreCategoryRequest $request)
    {
        return $request->all();

        return Category::create($request->all());

        // Category::create($request->all());

        return redirect()->route('admin.categories.index');
    }
}
