<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Events\NewMessage;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{
    public function get(){
        $contacts = [];
        $profiles = auth()->user()->following;
        foreach ($profiles as $profile){
            $contact = $profile->user;
            $contact->profile_image = 'http://via.placeholder.com/150x150';
            array_push($contacts, $contact);
        }
        $users = auth()->user()->profile->followers;
        foreach ($users as $user){
            $user->profile_image = 'http://via.placeholder.com/150x150';
            array_push($contacts, $user);
        }

        return response()->json($contacts);
    }

    public function getMessagesFor($id){

        $messages = Message::where(function ($q) use($id){
            $q->where('from', auth()->user()->id);
            $q->where('to', $id);
                })->orWhere(function ($q) use($id) {
                    $q->where('from', $id);
                    $q->where('to', auth()->user()->id);
                        })->get(); //3:30 https://www.youtube.com/watch?v=dQWqqzXbFkQ

        return response()->json($messages);
    }

    public function send(Request $request)
    {
        $message = Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);

        broadcast(new NewMessage($message));

        return response()->json($message);
    }
}
