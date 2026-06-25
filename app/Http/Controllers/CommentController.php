<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
public function store(Request $request)
    {
        $request->validate([
            'author_name' => 'required',
            'content' => 'required'
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'author_name' => $request->author_name,
            'content' => $request->content
        ]);

        return back();
    }
}
