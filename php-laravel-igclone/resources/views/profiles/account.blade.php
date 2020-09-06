@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/account/edit" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row pb-4"><h1>Account settings</h1></div>

                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label ">Username</label>


                    <input id="username" type="text"
                           class="form-control @error('username') is-invalid @enderror" name="username" value="" placeholder="{{auth()->user()->username}}"  autocomplete="username" autofocus>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror

                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label ">E-mail</label>


                    <input id="email" type="text"
                           class="form-control @error('email') is-invalid @enderror" name="email" value="" placeholder="{{auth()->user()->email}}" autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror

                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label ">Password</label>


                    <input id="password" type="text"
                           class="form-control @error('password') is-invalid @enderror" name="password" value=""  autocomplete="password" autofocus>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror

                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Save Changes</button>
                    <a href="/profile/{{auth()->user()->id}}" class="btn btn-outline-danger ml-2"> cancel</a>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection
