<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends StandardController
{
    public function index(){
        return view('pages.login', ['data' => $this->data]);
    }


    public function login(Request $request){
        $username = $request['username-input'];
        $password = $request['password-input'];

        $user = User::getUserByUsername($username);

        if(!$user){
            return redirect()->back()->with('error-msg', 'Wrong credentials!');
        }
        if(!Hash::check($password, $user->password)){
            return redirect()->back()->with('error-msg', 'Wrong credentials!');
        }
        Auth::login($user);

        return redirect()->route('home');
    }
}
