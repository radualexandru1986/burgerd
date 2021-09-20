<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\SendSMS;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Twilio\Exceptions\TwilioException;
use Illuminate\Support\Facades\DB;

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
		})->sortby([['updated_at', 'desc']]);

		$pendingOrders = $todayOrders->filter(function($order){
			return $order->status->name == 'processing';
		});
		
		
		return view('auth.orders', ['orders'=>$todayOrders,'finishedOrders'=>$finishedOrders, 'pendingOrders'=>$pendingOrders]);
	}
	
	
	/**
	 * @param Order $order
	 */
	public function finishOrder($orderId , Order $order)
	{
		$order->findOrFail($orderId)->finishOrder();
		return redirect()->back();
	}
	
	/**
	 * @param $orderId
	 * @param Order $order
	 */
	public function cancelOrder($orderId, Order $order)
	{
		$order->findOrFail($orderId)->cancelOrder();
		return redirect()->back();
	}
	
	/**
	 * @param $orderId
	 * @param Order $order
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function deleteOrder($orderId, Order $order)
	{
		$order->findOrFail($orderId)->delete();
		return redirect()->back();
	}
	
	
	public function sendNotification($orderId , Request $request, SendSMS $sms, Order $order)
	{
		try {
			$sms->custom($request->get('telephone'), $request->get('message'));
			$order->find($orderId)->notifyCustomer();
			return redirect()->back()->with(['success'=>'The customer has been notified !']);
		}catch (TwilioException $e) {
			return redirect()->back()->withErrors(['sms'=>'The phone number does not have the right format'.$request->get('telephone').$e->getMessage()]);
		}
		
	}
	
	/**
	 * @param $orderId
	 * @param Request $request
	 * @param SendSMS $sms
	 * @param Order $order
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function ordersHistory(Request $request)
	{
		$orders = Order::all()->groupBy(function ($order){
			return Carbon::parse($order->created_at)->monthName;
		})->sort();
		
		return view('auth.orders-history', compact('orders'));
	}
	
	/**
	 * Creates a new order in the DB
	 */
	public function createOrder()
	{
	
	}
}
