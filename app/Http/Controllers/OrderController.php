<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = \App\Models\Order::with(['user', 'items.product'])
            ->orderBy('created_at', 'desc')
            ->paginate(3); 
    
        return view('orders.index', compact('orders'));
    }

    
}
