<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StandardController extends Controller
{
    public array $data;


    public function __construct()
    {

        $this->data['links'] = [
            [
                "href" => "http://127.0.0.1:8000",
                "name" => "Home"
            ],
            [
                "href" => "http://127.0.0.1:8000/shop",
                "name" => "Shop"
            ],
            [
                "href" => "http://127.0.0.1:8000/signup",
                "name" => "Sing Up"
            ],
            [
                "href" => "http://127.0.0.1:8000/login",
                "name" => "Log in"
            ]
        ];

    }


}
