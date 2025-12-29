@extends("layouts.app")
@section("title") post @endsection
@section("content")
    <div class="card">
        <div class="card-header">
            Post info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post->title}}</h5>
            <p class="card-text">Description: {{$post->description}}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Post Creater info
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{$post->user? $post->user->name : "user not found"}}</h5>
            <p class="card-text">E-mail: {{$post->user? $post->user->email : "user not found"}}</p>
            <p class="card-text">Created at: Thursday 25th of December 2000 02-16-16 PM</p>
        </div>
    </div>
@endsection
