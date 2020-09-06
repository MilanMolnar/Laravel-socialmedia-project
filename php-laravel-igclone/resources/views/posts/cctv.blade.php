@extends('layouts.app')

@section('content')
<div class="container">
    @if($posts->count() > 0)
        <div style="display: flex; justify-content: center; align-items: center; user-select: none;">
        <main>
            <input type="text" class="search" />
            <div class="line-1"></div>
            <div class="line-2"></div>
        </main>
        </div>
        @foreach($posts as $post)
            <div class="row">
                <div class="col-6 offset-3 pt-5">
                    <div>
                        <div class="d-flex align-items-center">
                            <div class="pr-3">
                                <img src="{{$post->user->profile->profileImage()}}" alt="profile-pic" class="w-100 rounded-circle" style="max-width: 50px">
                            </div>
                            <div>
                                <h5 class="font-weight-bold">
                                    <a style="color: #1b4b72" href="/profile/{{ $post->user->id }}">{{$post->user->username}}</a>
                                </h5>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <h5>
                        @if(strlen($post->caption)  > 60)
                            {{ substr($post->caption, 0, 60) }}...
                        @else
                            {{$post->caption}}
                        @endif
                    </h5>
                </div>
            </div>
            <div class="row">
                <div  class="col-6 offset-3 py-3">
                    <a href="/p/{{ $post->id }}">
                        <img id="post-pic" src="/storage/{{$post->thumbnail}}" alt="full-insta-pic" class="w-100 h-100">
                    </a>

                </div>
            </div>
            <div class="row">
            <div class="d-flex " style="margin-left: 305px">
                <img style="outline: none; height: 55px; width: 53px" src="/images/like.png" alt="like-pic">
                <p id="likesNumber"  class="justify-content-center  pr-2" style="font-size: 30px; margin-bottom: 5px; padding-left: 5px"> {{$post->likers->count()}}</p>
                <img style="outline: none; height: 55px; width: 53px" src="/images/Comment-icon.png" alt="comment-pic">
                <p style="font-size: 30px; margin-bottom: 5px;padding-left: 5px">{{$post->comments()->count()}}</p>
            </div>
</div>
        @endforeach
    @else
        There are no posts, *cricket noises*
    @endif

    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-5">
            {{$posts->links()}}
        </div>
    </div>

</div>
@endsection
