<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PrintController extends Controller
{
	/**
	 * Prepares the data for printing
	 *
	 * @param $orderId
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function printForKitchen($orderId)
	{
		$order = Order::findOrFail($orderId);
		return view('auth.components.kitchenReceipt', ['order'=>$order]);
	}
	
	/**
	 * Print the receipt for customers
	 *
	 * @param $orderId
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
	public function printForCustomer($orderId)
	{
		$order = Order::findOrFail($orderId);
		return view('auth.components.customerReceipt', ['order'=>$order]);
	}
}
