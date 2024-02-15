<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends StandardController
{
    public function index(){
        return view('pages.login', ['data' => $this->data]);
    }


    public function login(){
        return view('pages.login', ['data' => $this->data]);
    }
}
