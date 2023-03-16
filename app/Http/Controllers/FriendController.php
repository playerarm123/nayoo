<?php

namespace App\Http\Controllers;

use App\Models\UserFriend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index()
    {
        $friends = auth()->user()->friends;
        return view('friend',compact('friends'));
    }
    public function addFriend(Request $request)
    {
        $input = $this->validate($request,[
            'friend_id'=>'required|exists:users,id'
        ]);
        UserFriend::create([
            'user_id' => auth()->user()->id,
            'friend_id'=> $input['friend_id'],
            'status' => 'approve',
            'be_friend_when'=> date('Y-m-d H:i:s'),
        ]);
        UserFriend::create([
            'user_id' => $input['friend_id'],
            'friend_id'=> auth()->user()->id,
            'status' => 'approve',
            'be_friend_when'=> date('Y-m-d H:i:s'),
        ]);
        return response()->json(['message'=>'success']);
    }
    public function removeFriend($id)
    {
        UserFriend::where('user_id',auth()->user()->id)->where('friend_id',$id)->delete();
        UserFriend::where('user_id',$id)->where('friend_id',auth()->user()->id)->delete();
        return response()->json(['message'=>'success']);
    }
}
