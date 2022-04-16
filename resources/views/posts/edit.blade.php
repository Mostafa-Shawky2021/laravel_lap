@extends('layout.app')


@section('content')
      <form method="POST" action="{{ route('posts.update',['post'=>$post['id']]) }}">
          @method('PATCH')
          @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$post['title']}}">
          </div>
          <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Description</label>
              <textarea type="text" name="description" class="form-control" id="exampleFormControlInput1">{{$post['description']}}</textarea>
          </div>
          <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Posted by</label>
              <select name="post-creator" class="form-control">
                  @foreach ( $users as $user )
                      <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="mb-3">
                <button type="submit" class="btn btn-success">Edit Post</button>
          </div>
        </form>
@endsection
