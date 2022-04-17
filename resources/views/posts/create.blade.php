@extends('layouts.app')

@section('title') Create @endsection

@section('content')

    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach



      <form method="POST" action="{{ route('posts.store') }}" style="width:500px; margin:auto; border:1px solid #ccc; padding:1rem; margin-top:20px;"  enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
              <textarea type="text" name="description" class="form-control" id="exampleFormControlInput1"></textarea>
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
              <input type="file" name="fileupload"/>
          </div>
          <div class="mb-3">
                <button type="submit" class="btn btn-success">Create Post</button>
          </div>
        </form>
@endsection
