@extends('layout.app')
@section('content')

<div class="text-center">
            <a href="/posts/create" class="mt-4 btn btn-success">Create Post</a>
        </div>
        <table class="table mt-4">
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
                <td>{{$post['title']}}</td>
                <td>{{$post['posted_by']}}</td>
                <td>2021-04-15</td>
                <td>
                    <a href="/posts/{{$post['id']}}" class="btn btn-info">View</a>
                    <a href="/posts/{{$post['id']}}/edit" class="btn btn-primary" >Edit</a>
                    <a href="#" class="btn btn-danger" onclick='return confirm("Are you sure you want to delete this post")'>Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>


@endsection