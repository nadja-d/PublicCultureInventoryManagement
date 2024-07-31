<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrder()
    {
        $orders = Order::getAllOrders();
        return view('order', compact('orders'));
    }
    
}
