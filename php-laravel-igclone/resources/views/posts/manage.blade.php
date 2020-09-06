@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has("message"))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session()->get("message")}}</strong>
        </div>
    @endif
    <a id="back-btn" class="btn" href="/profile/{{auth()->user()->id}}"><b>⇐</b></a>
    <div class="row pt-5">
        @if(auth()->user()->posts->count() > 0)
            @foreach(auth()->user()->posts as $post)
                <div class="col-4 pb-4" >
                    <div id="container-pic">
                            <img id="delete-pic" src="/storage/{{ $post->thumbnail }}" alt="insta_post" class="w-100 border-right border-bottom border-left border-top">
                        <a href="/manage/delete/{{$post->id}}">
                            <div id="overlay-pic">
                                <img src="/images/trashbin-icon.png" id="trash-icon">
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            @can('update', auth()->user()->profile)
                <div class="pt-2 align-content-center"></div>
            @endcan
        @endif
    </div>
</div>
@endsection
