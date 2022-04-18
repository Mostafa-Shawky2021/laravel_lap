<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post ;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request,$postId)
    {
        // Get data from comment form to insert data into comment table
        // We need to get post id to insert with comment to make the relation
        $commentData = $request->comment;
        // Check if user send comment
        if (isset( $commentData )){
            Comment::create([
                'body'             => $commentData,
                'commentable_id'   => (int) $postId,
                'commentable_type' => Post::class,
            ]);
        }

        return redirect()->route('posts.show', $postId);
    }
    public function delete($postId, $commentId)
    {
        // $post = Post::findOrFail($postId);
        Comment::where('id', $commentId)->delete();
        return redirect('posts/' . $postId);
    }
//    public function view($postId, $commentId)
//    {
//        $post = Post::findOrFail($postId);
//        $comment = Comment::where('id', $commentId)->first();
//        return view('comments.edit.blade.php', ['post' => $post, 'comment' => $comment]);
//    }
//    public function edit($postId, $commentId, Request $req)
//    {
//        $post = Post::find((int) $postId);
//        Comment::where('id', $commentId)->first()->update([
//            'body' => $req->comment
//        ]);
//        return redirect('posts/' . $postId);
//    }
}
