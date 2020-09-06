@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row pb-4"><h1>Add new Post</h1></div>

                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label ">Post Caption</label>


                    <input id="caption" type="text" maxlength="100"
                           class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}"  autocomplete="caption" autofocus>
                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror

                </div>

                <div class="form-group row">
                    <label for="desc" class="col-md-4 col-form-label ">Post Description</label>


                    <textarea id="desc" type="text" style="max-height: 220px; min-height: 70px" maxlength="150"
                           class="form-control @error('desc') is-invalid @enderror" name="desc"  autocomplete="desc" autofocus>
                    </textarea>
                    @error('desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror

                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label ">Post Image</label>
                    @error('image')
                    <strong>{{ $message }}</strong>
                    @enderror

                    <input type="file" class="form-control-file" id="image" name="image">
                </div>


                <div class="row pt-4">
                    <button class="btn btn-primary " style="width: 100px;">Post it</button>
                    <a href="/profile/{{auth()->user()->id}}" class="btn btn-outline-danger ml-2"> cancel</a>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection
