<?php

namespace App\Http\Controllers;

use App\Models\User\LoggedUser;

class LoggedInUsers extends StandardController
{
    public function index()
    {
        $logs = LoggedUser::all();

        return view('pages.admin.logged.users',['logs'=>$logs]);
    }
}
