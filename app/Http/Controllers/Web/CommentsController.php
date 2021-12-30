<?php

namespace App\Http\Controllers\Web;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(StoreCommentRequest $request)
    {        
        // return $request->all();
        
        Comment::create($request->all());
        
        return redirect()->back()->withSuccess('IT WORKS!');
    }
}
