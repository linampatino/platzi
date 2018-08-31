<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conversation;

class ConversationsController extends Controller
{
    public function showConversation(Conversation $conversation){
        $conversation->load('users', 'privateMessages');
        return view('users.conversation', [
            'conversation' => $conversation, 
            'user' => auth()->user(),
            ]);
    }
}
