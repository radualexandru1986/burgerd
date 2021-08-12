<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Order $order)
	{
		$orders = $order->all();
		
		return view('auth.dashboard', ['orders' => $orders]);
	}
}
