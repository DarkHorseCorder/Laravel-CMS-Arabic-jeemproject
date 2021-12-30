<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){

        $blogs = Blog::orderBy('title', 'ASC')->get();
        return view('pages.blogs.index',compact('blogs'));
        
    }
}
