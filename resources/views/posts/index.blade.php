@extends('layouts.app')
@section('content')

    <div class="container">
   x
        <table class="table mt-4 table-style">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ( $posts as $post)
              <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->created_at}}</td>
                <td>
                    <a href="/posts/{{$post['id']}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit',['post'=>$post['id']])}}" class="btn btn-primary" >Edit</a>
                    <form method="post" action="{{route('posts.destroy', ['post' => $post['id']])}}" style="display:inline-block">
                         @csrf
                         @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" href="{{route('posts.destroy', ['post' => $post['id']])}}" class="btn btn-danger">Delete</button>                </td>
                  </form>
              </tr>
              @endforeach
            </tbody>
          </table>
        <div style="text-align: right">
            <a href="{{route('posts.create')}}" class="btn btn-primary">Add post</a>
        </div>

        {{ $posts->links() }}
    </div>




@endsection
