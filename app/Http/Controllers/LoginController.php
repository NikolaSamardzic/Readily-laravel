<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Cookie;
use function Symfony\Component\String\b;

class LoginController extends StandardController
{

    public function index(){
        return view('pages.login');
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


        if(!$user->unfinishedOrder()){
            Order::createOrderForAUser($user);
        }

        $userCart = $user->unfinishedOrder()->bookOrders;
        $cartData = [];
        foreach ($userCart as $item)
            $cartData[] = ['id'=>$item['id'], 'quantity' => $item['quantity']];

        $cookie = cookie('cart', json_encode($cartData), 120,null,null,null,false,);

        return redirect()->route('home')->cookie($cookie);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('home');
    }
}
