@extends('layouts.app')

@section('content')
<div class="container">

    @if($posts->count() > 0)
        <div class="justify-content-center offset-5" id="create-button-post" data-tilt data-tilt-reverse="true" data-tilt-axis="x" data-tilt-scale="1.2" data-tilt-max="15" data-tilt-glare data-tilt-max-glare="0.9"  data-tilt-easing="cubic-bezier(.03,.98,.52,.99)" data-tilt-reverse="true">
            <post-create-button></post-create-button>
        </div>

       @foreach($posts as $post)

            <div class="row">
                <div class="col-6 offset-3 pt-5">
                    <div class="">
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
                <div class=" col-6 offset-3 py-3">
                    <a href="/p/{{ $post->id }}"><img id="post-pic" src="/storage/{{$post->thumbnail}}" alt="full-insta-pic" class="w-100 h100 img-fluid"></a>
                </div>
            </div>
           <div class="row">
               <div class="d-flex " style="margin-left: 305px">
                   <img style="outline: none; height: 55px; width: 53px" src="/images/like.png" alt="like-pic">
                   <p id="likesNumber"  class="justify-content-center  pr-2" style="font-size: 30px; margin-bottom: 5px">{{$post->likers->count()}}</p>
                   <img style="outline: none; height: 55px; width: 53px" src="/images/Comment-icon.png" alt="comment-pic">
                   <p style="font-size: 30px; margin-bottom: 5px">{{$post->comments()->count()}}</p>
               </div>
           </div>
        @endforeach
    @else
        <div>
            <p style="text-align: center; font-size: xx-large; font-family: 'Segoe Script'">
                <b>Hey, thanks for dropping by, your followed friend's posts will show up here!</b>
            </p>
            <cctv-button data-tilt data-tilt-glare data-tilt-max-glare="0.56" data-tilt-max="10" id="cctv-btn"> </cctv-button>
        </div>
    @endif

    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-5">
            {{$posts->links()}}
        </div>
    </div>

</div>
@endsection
