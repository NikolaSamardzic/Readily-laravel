<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends StandardController
{
    public function index()
    {
        return view('pages.admin.index');
    }
}
