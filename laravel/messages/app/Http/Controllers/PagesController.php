<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;

class PagesController extends Controller
{
    //
    public function home(){
        
        $messages = Message::all();
        return view('welcome', ['messages' => $messages]);
        
        /*$links = [
            'https:/laravel.com' => 'Laravel',
            'https:/github.com' => 'GitHub',
        ];
        return view('welcome', [
            'links' => $links,
            'teacher' => 'Lina',
        ]);*/
    }

    public function about(){
        return view('about');
    }
}
