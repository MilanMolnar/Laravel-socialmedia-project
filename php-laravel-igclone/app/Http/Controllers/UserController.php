<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        return view('profiles.account');
    }

    public function edit(){

        $data = request()->validate([
            'username'=> ['max:20','min:3','nullable', 'unique:users'],
            'password' => ['max:30','min:3','nullable'],
            'email' => ['email','nullable', 'unique:users'],
        ]);
        if ($data['username'] == null){
            $data['username'] = auth()->user()->username;
        }
        if ($data['password'] == null){
            $data['password'] = auth()->user()->password;
        }
        if ($data['email'] == null){
            $data['email'] = auth()->user()->email;
        }
        auth()->user()->update($data);
        return redirect("/profile/" . auth()->user()->id);


    }
}
