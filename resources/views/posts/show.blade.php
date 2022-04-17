@extends('layouts.app')

@section('title') Show Page @endsection

@section('content')
    <div class="container mt-5">
        <div class="card mb-3">
            <div class="card-header">
                Post info
            </div>
            <div class="card-body">
                <h5 class="card-title" style="font-weigt:bold">Title: {{ $post->title }}</h5>
                <p class="card-text" style="font-weigt:bold">Description: {{ $post->description }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Post Creator
            </div>
            <div class="card-body">
                <h5 class="card-title">Name: {{ $post->user->name }}</h5>
                <p class="card-text">Email: {{ $post->user->email }}</p>
                <p class="card-text">Created At:{{ $post->created_at }}</p>

            </div>
        </div>

        <!-- Comments -->
        <div class="card my-4">
            <div class="card-header fw-bold fs-1">
                Comments
            </div>
            <div class="card-body ">
                @if(isset($posts->comments) && count($posts->comments) > 0)
                    @foreach ($posts->comments as $comment)
                        <div class='my-4 border p-4 rounded-lg'>
                            <h2 class='text-lg fw-bold'>{{$comment->user->name}}</h2>
                            <p class='text-lg my-2 fs-2'>{{$comment->body}}</p>
                            <span class='text-sm'>Last Updated At: {{$comment->updated_at->toDayDateTimeString()}}</span>
                            <div class="mt-4  flex">
                                <form class="text-center d-inline" method='POST' action={{route('comments.delete', ['postId' => $post['id'], 'commentId' => $comment->id])}}>
                                    @csrf
                                    @method('DELETE')
                                    <button type="sumbit" class='btn btn-lg btn-primary'>Delete</button>
                                </form>
                                <a class='btn btn-lg btn-success ml-4' href={{route('comments.view', ['postId' => $post['id'], 'commentId' => $comment->id])}}>
                                    Edit
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>

        <div class="d-flex justify-content-center " style="width: 100%">
            <form action="{{route('comments.create',['postId' => $post['id']])}}" method="POST" style="width: 100%">
                <input type="text" name="comment" class="form-control mr-2" placeholder="Add comment" style="margin: 10px 0;">

                @csrf
                <button type="submit" class="btn btn-success">Add Comment</button>
            </form>
        </div>
    </div>
@endsection
