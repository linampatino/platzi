<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

use App\User;
use App\SocialProfile;

class SocialAuthController extends Controller
{
    public function facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(){
        $user = Socialite::driver('facebook')->user();

        $existing = User::whereHas('socialProfile', function($query) use($user){
            $query->where('social_id', $user->id);
        })->first();

        if(!is_null($existing)){
            auth()->login($existing);
            return redirect('/');
        }else{
            session()->flash('facebookUser', $user);
            return view('users.facebook', [
                'user' => $user,
            ]);
        }
    }

    public function register(Request $request){
        $data = session('facebookUser');
        $username = $request->input('username');

        $user = User::create([
            'name' => $data->name,
            'username' => $username,
            'email' => $data->email,
            'password' => str_random(16),
            'avatar' => $data->avatar,
        ]);

        $profile = SocialProfile::create([
            'social_id' => $data->id,
            'user_id' => $user->id,
        ]);

        auth()->login($user);
        return redirect('/');
    }
 
}
