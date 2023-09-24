@extends('layouts.app')

<img  class="w-100">

@section('content')
    {{-- style="width: 500px;" --}}
    <div class="card card_imageAndCaption">
        <div class="row no-gutters">
            <div class="col">
                <img class="card-img" src="/storage/{{ $post->image }}" alt="Suresh Dasari Card">
            </div>
            <div class="col" style="position: relative;">
                <div class="card-body">
                    <h3 class="card-title">{{ $post->user->username}}</h3>
                    {{-- <input type="submit" class="btn btn-primary"> --}}
                    <p class="card-text">{{ $post->caption }}</p>
                    {{-- <a href="#" class="btn btn-primary">View Profile</a> --}}
                    <form action="/p/deletePost" method="post">
                        @csrf;
                        @method("DELETE");
                        <input type="hidden" name="imgId" value="{{ $post->id }}">
                        <input type="hidden" name="imgPath" value="{{ $post->image }}">
                        <input type="submit" value="Delete Post"class="btn btn-danger" id="deletePostBtn">
                    </form>
                </div>
            </div>
        </div>
        {{-- <div class="col-4">
            <h1>{{ $post->user->username}}</h1>
            <h3>{{ $post->caption }}</h3>
        </div> --}}
    </div>
@endsection
