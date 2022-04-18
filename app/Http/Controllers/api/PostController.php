<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        // PostResource object  is the layer between eloquent model and json data which we can display custom attribute
        // because data returned from database is fetched as object model so it make dependecies
        // laravel support us with resource to handle this and prevent repeating our code
        return PostResource::collection($posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // We dont't need to create form because it's api
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StorePostRequest $postRequest)
    {
        $post = new Post();
        $post->title       = $request->title;
        $post->description = $request->description;
        $post->user_id     = $request->user_id;
        return $post->save() ? $post : 'problem with save data';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PostResource( Post::find($id) );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // No need to edit form
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,StorePostRequest $postRequest)
    {
        $post = Post::find($id);
        $post->update([
            "title"       => $request->title,
            "description" => $request->description,
            "user_id"     => 5,
        ]);
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        return $post->delete() ? "delete with id {$id}" : "faield deleted";
    }
}
