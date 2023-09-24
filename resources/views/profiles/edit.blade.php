@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <h1>Edit Profile</h1>                
        </div>
        <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')
            <div class="row mb-3">
                <div class="col-8 offset-2">
                    <label for="title" class="mb-2 text-md-end">Title</label>
                    <div class="">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{  $user->profile->title ?? '' }}" value=""autocomplete="title" autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-8 offset-2">
                    <label for="description" class="mb-2 text-md-end">Description</label>
                    <div class="">
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $user->profile->description ?? ''}}" autocomplete="description" autofocus>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-8 offset-2">
                    <label for="url" class="mb-2 text-md-end">Url</label>
                    <div class="">
                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $user->profile->url ?? ''}}" autocomplete="url" autofocus>

                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-3 offset-2">
                    <input type="submit" value="Save Edit" class="btn btn-primary">
                </div>
            </div>
        </form> 
    </div>
@endsection
