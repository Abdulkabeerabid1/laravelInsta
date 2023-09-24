@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <h1>Add Post</h1>                
        </div>
        <form action="/p" enctype="multipart/form-data" method="post">
            {{-- Caption --}}
            @csrf
            <div class="row mb-3">
                <div class="col-8 offset-2">
                    <label for="caption" class="mb-2 text-md-end">Caption</label>
                    <div class="">
                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Image --}}
            <div class="row mb-5">
                <div class="col-8 offset-2">
                    <label for="image" class="mb-2 text-md-end">Image</label>
                    <div class="">
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-3 offset-2">
                    <input type="submit" value="Add New Post" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection
