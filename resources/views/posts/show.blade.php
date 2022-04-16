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
    </div>
@endsection
