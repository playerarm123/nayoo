<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Facebook;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $friendsYouMayKnow = $this->friendsYouMayKnow();
        return view('index',compact('friendsYouMayKnow'));
    }
    public function friendsYouMayKnow()
    {
        $friends = auth()->user()->userFriends->where('status','approve')->map(function($item){
            return $item->friend_id;
        })->toArray();
        $results = User::where('id','!=',auth()->user()->id)->whereNotIn('id',$friends)->get();
        return $results;
    }
}
