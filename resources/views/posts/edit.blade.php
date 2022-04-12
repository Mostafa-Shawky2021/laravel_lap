@extends('layout.app')
@php
$postData = [];
@endphp
@foreach ($posts as $post )
    @if( $post['id'] == $id )
        @php $postData = $post @endphp
    @endif
@endforeach
@section('content')

@section('content')
      <form method="POST" action="/posts/store">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$postData['title']}}">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Posted by</label>
            <input type="text" name="posted_by" class="form-control" id="exampleFormControlInput1" value="{{$postData['posted_by']}}">
          </div>

          <div class="mb-3">
                <button type="submit" class="btn btn-success">Edit Post</button>
          </div>
        </form>
@endsection