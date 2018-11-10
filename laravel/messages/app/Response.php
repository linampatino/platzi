<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Message;

class Response extends Model
{
    //
    protected $guarded = [] ;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function message(){
        return $this->belongsTo(Message::class);
    }
}
