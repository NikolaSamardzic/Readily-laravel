<?php

namespace App\Http\Controllers;

use App\Models\Order\Order;
use App\Models\User\LoggedUser;
use App\Models\User\User;
use App\Models\Visit\Visit;
//use App\Repositories\UserRepository;
//use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends StandardController
{
//    public function __construct(
//        protected UserRepositoryInterface $repository
//    ){
//        parent::__construct();
//    }

    public function index(){
        //dd($this->repository);
        Visit::logPage('Log in');
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

        LoggedUser::logUser($user['id']);

        if(!$user->unfinishedOrder()){
            Order::createOrderForAUser($user);
        }

        $userCart = $user->unfinishedOrder()->bookOrders;
        $cartData = [];
        foreach ($userCart as $item)
            $cartData[] = ['id'=>$item['id'], 'quantity' => $item['quantity']];

        $preferedCategories = $user->categories;
        $ids = [];
        foreach ($preferedCategories as $category){
            $ids[] = $category['category_id'];
        }

        $cart = cookie('cart', json_encode($cartData), 120,null,null,null,false,true);
        $isLoggedIn = cookie('isLoggedIn', 1, 120,null,null,null,false,true);
        $hasPreferedCategories = cookie('hasPreferedCategories', json_encode($ids), 120,null,null,null,false,true);

        return redirect()->route('home')->cookie($cart)->cookie($isLoggedIn)->cookie($hasPreferedCategories);
    }

    public function logout(Request $request){
        Auth::logout();
        \Illuminate\Support\Facades\Cookie::queue(\Illuminate\Support\Facades\Cookie::forget('isLoggedIn'));
        \Illuminate\Support\Facades\Cookie::queue(\Illuminate\Support\Facades\Cookie::forget('hasPreferedCategories'));
        \Illuminate\Support\Facades\Cookie::queue( \Illuminate\Support\Facades\Cookie::forget('cart'));

        return redirect()->route('home');
    }
}
