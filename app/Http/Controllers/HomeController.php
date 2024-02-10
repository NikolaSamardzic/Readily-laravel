<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class HomeController extends StandardController
{
    public function index()
    {
        return view('pages.home', ['data' => $this->data]);
    }
}
