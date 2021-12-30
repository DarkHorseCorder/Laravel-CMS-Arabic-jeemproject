<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorRequest;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AuthorsController extends Controller
{


    public function __construct()
    {
        LaravelLocalization::setLocale('en');
    }

    public function index()
    {
        $authors = Author::all();

        $locale = LaravelLocalization::setLocale('en');

        return view('admin.authors.index', compact('authors', 'locale'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function show(Author $author)
    {
        // return $author;
    }

    public function store(Request $request)
    {
        // return $request->all();

        Author::create($request->all());

        return redirect()->route('admin.authors.index')->withSuccess('Created');
    }

    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        // return $post;
        $author->update($request->all());

        return redirect()->route('admin.authors.index')->withSuccess('Updated');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('admin.authors.index')->with('success', 'Author with its posts has been deleted.');
    }


}
