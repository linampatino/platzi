<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Message;
use App\socialProfile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function messages(){
        return $this->hasMany(Message::class)->orderBy('created_at','desc');
    }

    public function follows(){
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function followers(){
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function isFollowing($user){
        return $this->follows->contains($user);
    }

    public function socialProfile(){
        return $this->hasMany(SocialProfile::class);
    }
}
