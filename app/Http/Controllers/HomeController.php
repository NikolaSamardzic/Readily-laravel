<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends StandardController
{
    public function index()
    {
        return 'hello';
    }
}
