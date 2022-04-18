@extends('layouts.app')
@section('content')

    <div class="container">
        <table class="table mt-4 table-style">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Image</th>
                <th scope="col">Created At</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

            @foreach ( $posts as $post)
              <tr>

                <td> {{$post->title}}      </td>
                <td> {{$post->user->name}} </td>
                <td> <img src="{{ asset($post->file) }}"/> </td>
                <td> {{$post->created_at}} </td>
                <td> {{$post->slug}}       </td>
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
        <div class="flex justify-center items-center mt-10">
            {!! $posts->links() !!}
        </div>

    </div>




@endsection
