<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function store($post, Request $request){
        $data = request()->validate([
            'content' => 'required'
        ]);

        $comment = new Comment;
        $comment->content = $data['content'];
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post;
        $comment->save();

        return redirect('/p/' . $post);
    }
    function delete($comment){
        $actualComment = Comment::find($comment);
        $actualComment->delete();
        return redirect('/p/' . $actualComment->post_id);
    }
}

