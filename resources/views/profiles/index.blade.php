@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 d-flex justify-content-center">
                {{-- width: fit-content;  --}}
                <div style="position: relative;">
                    <img src="/storage/{{ $user->profile->image ?? 'profilePictures/noImgFound.jpg'}}" style="width: 180px; height: 180px;"class="rounded-circle d-block mx-auto">
                    @if(Auth()->id() == $user->id)
                        @if($user->profile->image != '')
                            <i class="fa-solid fa-trash-can" id="iconDeleteImage"></i>
                            <form action="/p/deleteProfileImg" id="deleteImgForm" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                {{-- {{$user->profile->image}} --}}
                                <input type="text" name="imagefldName" value="{{$user->profile->image ?? ''}}" style="display: none;">
                            </form>
                        @endif
                        <i class="fa-solid fa-camera" id="iconChangeImage"></i>
                        <form action="/p/updateProfileImg" id="updateImgForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image" id="profileimageFld" style="display: none;">
                            <input type="hidden" name="imageOldPath" value="{{$user->profile->image ?? ''}}" id="profileimageFld" style="display: none;">
                        </form>
                    @endif
                </div>
            </div>

            <div class="col-8">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex-own">
                        <h3 class='pt-2'>{{ $user -> username }}</h3>
                        @if(Auth()->id() == $user->id)
                            <a href="/profile/{{$user->id}}/edit"class='btn btn-secondary anchor-own'>Edit Profile</a> 
                        @endif
                        @if(Auth()->id() != $user->id && Auth::check())
                            <span class="text-primary" onclick="followingFunc({{$user->id}}, {{Auth()->id() ?? "NULL"}}, '{{csrf_token()}}')" id="followBtn" style="text-decoration: none; margin-left: 10px; cursor: pointer;">
                                Follow
                            </span>
                        @endif
                        {{-- @if($user->following == NULL) --}}
                            {{
                                dd($user->following('items'));
                            }}
                        {{-- @endif --}}
                    </div>
                    @if(Auth()->id() == $user->id)
                        <a href="/p/create"class='btn btn-primary' style="line-height: 18px; margin-left: 15px;">Add New Post</a>
                    @endif
                </div>
                <div class="postsCountDiv mt-1">
                    <span><strong>{{ $user->posts->count()}}</strong>&nbsp;posts</span>
                    <span><strong>12k</strong>&nbsp;followers</span>
                    <span><strong>83</strong>&nbsp;following</span>
                </div>
                <div class="pt-2" style="line-height: 20px;">
                    <span><strong>{{ $user->profile->title ?? "N/A"}}<br>{{ $user->profile->description  ?? "N/A"}}<br><a href="#">{{ $user->profile->url ?? "N/A"}}</a></strong></span>
                </div>
            </div>
        </div>
        <div class='row pt-4'>
            @foreach($user->posts AS $post)
                <a href="/p/{{ $post->id }}" class="col-4" class="whClass">
                    <div class='mb-4'>
                        <img src="/storage/{{ $post->image }}" style="height: 416px;" class='w-100'>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
