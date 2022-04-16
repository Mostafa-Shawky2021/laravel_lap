<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
class PostController extends Controller
{


    public function index(){

        $posts = Post::latest()->paginate(5);
        return view ('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create(){
        $user = User::all();

        return view('posts.create', [
            'users' => $user,
        ]);
    }
    public function store( StorePostRequest $postRequest  ){

        //get me the request data
        $data = request()->all();

        // $title = request()->title;
        //store the request data in the db
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post-creator'],
        ]);

        //redirect to /posts
        return redirect(route('posts.index')   );

    }

    public function show( $id ) {

        $post = Post::where('id',$id)->first();

        return view('posts.show',[
            'post' => $post,

        ]);
    }

    public function edit($id) {
        // fetch post data
         $post = Post::find($id);
         $users = User::all();
        return view('posts.edit',[
            'id'    => $id,
            'post'  => $post,
            'users' => $users,
        ]);
    }

    public function update($id) {
        $data = request()->all();

        Post::whereId($id)->update([
            'title'       => $data['title'],
            'description' => $data['description'],
            'user_id'     => $data['post-creator'],
        ]);
        return redirect()->route('posts.index')  ;

    }

    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }


}
