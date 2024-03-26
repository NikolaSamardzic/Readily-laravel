<?php

namespace App\Http\Controllers;

use App\Models\Order\Order;

class OrderController extends StandardController
{

    public function index()
    {

        $orders = Order::allFinishedOrders();



        return view('pages.admin.order.index',['orders'=>$orders]);
    }

}
