@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div  id="pic" class="col-8">
            <post-image   id="post-full" post="{{$post->image}}"> </post-image>
        </div>

        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{$post->user->profile->profileImage()}}" alt="profile-pic" class="w-100 rounded-circle" style="max-width: 50px">
                    </div>

                    <div>
                        <h5 style="font-size: medium" class="font-weight-bold">
                            <a style="color: #1b4b72; " href="/profile/{{ $post->user->id }}">{{$post->user->username}}</a>
                             •
                            @if($post->user->id != auth()->user()->id)
                                <a href="/profile/{{ $post->user->id }}" style="font-size: smaller">View Profile</a>
                            @else
                                <a href="/p/show/{{ $post->id }}" style="font-size: smaller">Edit Post</a>
                            @endif
                        </h5>
                    </div>

                </div>
                <hr style="background-color: lightblue; opacity: 50%">
            </div>
            <strong>{{$post->caption}}</strong>
            <hr style="background-color: lightblue;opacity: 50%">
            <div class="pb-1">
                {{$post->desc}}
            </div>
            <div style="min-height: 400px; border-radius: 6px; border: solid lightblue 2px; max-height: 400px; overflow:auto" class="p-2 pt-3">
                @foreach($post->comments as $comment)
                    @if($comment != $post->comments[$post->comments->count() - 1])
                        <div class="d-flex pl-1 pt-1 pb-0">
                            <img src="{{$comment->user->profile->profileImage()}}" alt="profile-pic" class=" w-25 rounded-circle" style="max-width: 30px; max-height: 30px">
                            @if($comment->user_id != auth()->user()->id)
                                <a  class="pl-2 pt-1" style="color: #1b4b72" href="/profile/{{ $comment->user->id }}">{{$comment->user->username}}</a>
                            @else
                                <a class="pl-2 pt-1" style="color: #1b4b72" href="/c/delete/{{ $comment->id }}" style="font-size: smaller">Delete</a>
                            @endif
                            <p class="pl-2 pt-1"> •</p>
                            <p class="pl-2 pt-1"> {{$comment->content}}</p>
                        </div>
                        <hr style="padding: 0px;opacity: 30%; margin: 5px; background-color: lightblue" >
                    @else
                        <div class="d-flex pl-1">
                            <img src="{{$comment->user->profile->profileImage()}}" alt="profile-pic" class=" w-25 rounded-circle" style="max-width: 30px; max-height: 30px">
                            @if($comment->user_id != auth()->user()->id)
                                <a class="pl-2 pt-1" style="color: #1b4b72" href="/profile/{{ $comment->user->id }}">{{$comment->user->username}}</a>
                            @else
                                <a class="pl-2 pt-1" style="color: #1b4b72" href="/c/delete/{{ $comment->id }}" style="font-size: smaller">Delete</a>
                            @endif
                            <p class="pl-2 pt-1"> •</p>
                            <p class="pl-2 pt-1"> {{$comment->content}}</p>
                        </div>
                    @endif
                @endforeach
            </div>
            <form action="/p/{{$post->id}}" style="margin-top: 20px" enctype="multipart/form-data" method="post" class="d-flex">
                @csrf
                <div class="row">
                    <div class="col-8" style="padding-left: 30px">
                        <div class="form-group row p-0">
                            <textarea placeholder="Comment here..." style=" border-radius: 6px; min-height: 35px; max-height: 80px; width: 450px; border: solid lightblue 2px" id="content" type="text" maxlength="100"
                                   class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}"  autocomplete="content" autofocus></textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div style="margin-left: -110px; margin-top: 15px">
                        <button id="comment-btn" type="submit"> ►</button>
                    </div>

                </div>

            </form>

            <div class="d-flex " >
                <like-button style="outline: none" post-id="{{$post->id}}" likers="{{$likers}}"> </like-button>
                <p id="likesNumber"  class="justify-content-center  pr-2" style="font-size: 30px; margin-bottom: 5px">{{$post->likers->count()}}</p>
                <img style="outline: none; height: 55px; width: 53px" src="/images/Comment-icon.png" alt="comment-pic">
                <p style="font-size: 30px; margin-bottom: 5px">{{$post->comments()->count()}}</p>
            </div>
        </div>
    </div>
</div>
@endsection


