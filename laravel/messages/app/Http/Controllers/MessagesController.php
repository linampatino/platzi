<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function show(Message $message){
        //$message = Message::find($messageId);
        return view('messages.show', ['message' => $message]);
    }
}
