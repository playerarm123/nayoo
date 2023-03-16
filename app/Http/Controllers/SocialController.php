<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {
        try {
    
            $user = Socialite::driver('facebook')->fields([
                'first_name','last_name','email','gender','birthday','name','accounts'
            ])->scopes([
                'pages_show_list','pages_read_user_content','pages_manage_engagement','user_gender','user_birthday'
            ])->user();
            $isUser = User::where('facebook_id', $user->id)->first();
     
            if($isUser){
                Auth::login($isUser);
                return redirect('/');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'password' => encrypt(Str::random(8)),
                    'fb_access_token'=> $user->token,
                ]);
    
                Auth::login($createUser);
                return redirect('/');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
