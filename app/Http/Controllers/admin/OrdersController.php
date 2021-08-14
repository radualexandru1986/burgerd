<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
	
	/**
	 * Gets all the orders for today
	 *
	 * @param Order $order
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function index(Order $order)
	{
		$todayOrders = $order->whereDate('created_at', Carbon::today())->get();
		$finishedOrders =$todayOrders->filter(function($order){
			return $order->status->name == 'ready';
		});;
		$pendingOrders = $todayOrders->filter(function($order){
			return $order->status->name == 'processing';
		});
		return view('auth.orders', ['orders'=>$todayOrders,'finishedOrders'=>$finishedOrders, 'pendingOrders'=>$pendingOrders]);
	}
	
	
	/**
	 * @param Order $order
	 */
	public function finishOrder($orderid , Order $order)
	{
		$order->findOrFail($orderid)->finishOrder();
		return redirect()->back();
	}
	
	/**
	 * Creates a new order in the DB
	 */
	public function createOrder()
	{
	
	}
}
