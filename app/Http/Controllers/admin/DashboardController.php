<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Order $order)
	{
		$orders = $order->all();
		
		$forToday = $orders->filter(function($value){
			return  $value->created_at->format('y/m/d') == today()->format('y/m/d');
		});
		return view('auth.dashboard', ['orders' => $orders, 'todayOrders'=>$forToday]);
	}
}
