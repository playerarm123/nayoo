<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $input = $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|string'
        ]);
        $remember = $request->has('remember') ? true :false;
        if(Auth::attempt($input,$remember)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('error','email or password is wrong')->withInput($input);
    }
    public function register(Request $request)
    {
        $input = $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|confirmed|min:8'
        ]);
        $input['avatar'] = "assets/img/profile/profile-".rand(1,11).".webp";
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->intended('/');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->intended('login');
    }
}
