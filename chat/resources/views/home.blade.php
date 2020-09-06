@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12" id="chat-app-body" >
            <div class="card" id="chat-app-body">
                <div id="header" class="card-header">Messages</div>

                <div class="card-body" id="app">
                    <chat-app  :user="{{ auth()->user() }}">

                    </chat-app>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
