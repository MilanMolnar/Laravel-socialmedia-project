@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @can('update', $user->profile)
                <div class="col-3 p-5">
                    <a href="/profile/{{$user->id}}/edit">
                    <img src="{{$user->profile->profileImage()}}" alt="insta-profile-pic" class="rounded-circle w-100">
                    </a>
                </div>
        @else
            <div class="col-3 p-5">
                <img src="{{$user->profile->profileImage()}}" alt="insta-profile-pic" class="rounded-circle w-100">
            </div>
        @endcan

        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex ">
                    <h1>{{$user->username}}</h1>
                    @cannot('update', $user->profile)
                        <follow-button  user-id="{{ $user->id }}" follows="{{$follows}}"></follow-button>
                    @endcan
                </div>
                @can('update', $user->profile)
                    @if($user->posts->count()>0)
                    <div class="justify-content-center" id="create-button-post" data-tilt data-tilt-reverse="true" data-tilt-axis="x" data-tilt-scale="1.2" data-tilt-max="15" data-tilt-glare data-tilt-max-glare="0.9"  data-tilt-easing="cubic-bezier(.03,.98,.52,.99)" data-tilt-reverse="true">
                        <post-create-button></post-create-button>
                    </div>
                    @endif
                @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-5">{{$user->posts->count()}} posts</div>
                <div id="followNumber" class="pr-5">{{$user->profile->followers->count()}} followers</div>
                <div class="pr-5">{{$user->following->count()}} following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}}</div>
            <div><a href="{{$user->profile->url}}">{{$user->profile->url}}</a></div>
        </div>
    </div>
    <hr>
    @can('update',$user->profile)
        @if($user->posts->count() > 0)
            <a style="font-size: larger; margin-left: 5px" href="/manage">Manage posts</a>
        @endif
    @endcan
    @if($user->posts->count() == 0)
        <div class="justify-content-center offset-5" id="create-button-post" data-tilt data-tilt-reverse="true" data-tilt-axis="x" data-tilt-scale="1.2" data-tilt-max="15" data-tilt-glare data-tilt-max-glare="0.9"  data-tilt-easing="cubic-bezier(.03,.98,.52,.99)" data-tilt-reverse="true">
            <post-create-button></post-create-button>
        </div>
    @endif
    <div class="row pt-5">
        @if($user->posts->count() > 0)
        @foreach($user->posts as $post)
            <div class="col-4 pb-4" >
                <a href="/p/{{$post->id}}">
                    <img id="post-pic" src="/storage/{{ $post->thumbnail }}" alt="insta_post" class="w-100 border-right border-bottom border-left border-top">
                </a>
            </div>
        @endforeach
        @else
            @can('update', $user->profile)
                <div class="pt-2 align-content-center"></div>
            @endcan
        @endif

    </div>

</div>
@endsection
