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
<div  style="margin-top:30px;text-align:center;margin-left:auto;margin-right:auto" class="col-7">
<div class="card" style="margin-top:30px">
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title"><span style="font-weight:bold"></h5>
    <p class="card-text"><span style="font-weight:bold">Title: {{$postData['title']}} </p>
    <p class="card-text"><span style="font-weight:bold">Description: Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, error. </p>

  </div>
</div>

<div class="card mt-4">
  <div class="card-header">
    User Info
  </div>
  <div class="card-body">
    <h5 class="card-title"><span style="font-weight:bold">Name: {{$postData['posted_by']}} </span></h5>
    <p class="card-text"><span style="font-weight:bold">Created At :2021-15-20 </span></p>
   
  </div>
  
</div>
<a href="/posts" class="btn" style="margin: 30px;background-color:#8D8DAA; border-color:#8D8DAA;color: white;">Back</a>
</div>
@endsection