<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request,$userId)
    {
        // Get data from comment form to insert data into comment table
        // We need to get user id to insert with comment to make the relation
        $user = User::findOrFail($userId);
        $commentData = $request->comment;

        // Check if user send comment
        if (isset( $commentData )){
            Comment::create([
                'body'             => $commentData,
                'commentable_id'   => (int) $userId,
                'commentable_type' => User::class,
            ]);
        }

        //return redirect()->route('posts.show', $postId);
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
