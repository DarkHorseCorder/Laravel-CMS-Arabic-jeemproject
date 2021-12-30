<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(Request $requeset)
    {
        return Comment::all();

        return view('admin.comments.index');
    }
}
