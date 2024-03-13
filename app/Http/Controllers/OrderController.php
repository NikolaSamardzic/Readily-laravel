<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends StandardController
{

    public function index()
    {

        $orders = Order::allFinishedOrders();



        return view('pages.admin.order.index',['orders'=>$orders]);
    }

}
