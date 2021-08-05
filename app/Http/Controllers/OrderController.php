<?php

namespace App\Http\Controllers;

use App\Events\OrderValidated;
use App\Exceptions\PostCodeException;
use App\Models\Address;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Verification;
use App\Services\CodeGenerator;
use App\Services\PostcodeFilter;
use App\Services\SendSMS;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Twilio\Exceptions\TwilioException;

class OrderController extends Controller
{
	
	/**
	 * Collects the data from the form
	 * @param Request $request
	 * @param PostcodeFilter $postcodeFilter
	 * @param Customer $customer
	 * @param SendSMS $sms
	 * @return array|false|string
	 * @throws TwilioException
	 * @throws \Exception
	 */
    public function collectInfo(
    	Request $request,
		PostcodeFilter $postcodeFilter,
		Customer $customer,
		SendSMS $sms
	)
	{
		$orderRequest = $request->get('order');
		//validate the data
		$requestData = $request->all();
		$request->merge(['postcode' => str_replace(' ', '', $request->get('postcode'))]);
		$request->merge( ['phone' => str_replace(' ', '', $request->get('phone'))]);
		$request->validate([
			'street'=>'required|min:3',
			'number'=>'required|min:1|max:5',
			'postcode'=>'required|min:6|max:6',
			'phone'=>'required|min:11|max:11',
		]);
		
		//validate the postcode
		try {
			$postcodeFilter->inRange($request->get('postcode'));
		}catch(PostCodeException $e){
			return response()->json(['message'=>$e->getMessage()], 413);
		}
		
		
		//Todo Is very important to create a repository and add database transactions with a try catch block
		//create a new customer with the phone number
		$newCustomer = Customer::updateOrCreate([
			'phone'=>$request->get('phone')
		]);
		
		//add data to address table
		//Todo Is very important to create a repository and add database transactions with a try catch block
		Address::create([
			'customer_id' => $newCustomer->id,
			'postcode' => $request->get('postcode'),
			'street' => $request->get('street'),
			'number' =>$request->get('number')
		]);
		
		//Create a new order
		$order = Order::create([
			'customer_id' => $newCustomer->id,
			'total' => $this->calculateTotal($orderRequest),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);
		//generate a new random number
		$code = (new CodeGenerator())->generateRandom();
		
		//send sms
		//$sms->sendConfirmationCode($request->get('phone'), $code);
		
		//Todo Is very important to create a repository and add database transactions with a try catch block
		Verification::create([
			'customer_id'=> $newCustomer->id,
			'order_id' => $order->id,
			'verification_code' => $code
		]);
		
		
		
		//Add items to orderItems
		foreach ($orderRequest as $item) {
			OrderItems::create([
				'order_id' => $order->id,
				'item_id' => $item['id'],
				'drink' => $item['drink'] ?: null,
				'quantity'=>$item['quantity'],
				'comments' =>  null,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			]);
		}
		return 'OK';
	}
	
	/**
	 *
	 * @param Request $request
	 * @param Verification $verification
	 * @param Order $order
	 * @return string
	 * @throws \Exception
	 */
	public function confirmOrder(Request $request, Verification $verification): string
	{
		//make sure the code passes validation
		$request->validate([
			'verification' => 'required|min:5|:max:5'
		]);
		
		// check with the databse and see if the code exists
		$code = $verification->where( 'verification_code', $request->get('verification') )
							 ->whereDate( 'created_at',  Carbon::today() )
			                 ->first();
		if(empty($code)){
			throw new \Exception('Please insert the correct code.', 501);
		}
		
		if($code->verified){
			throw new \Exception('This order is already verified.',502);
		}
		
		$code->verified = true;
		$code->save();
		//validate order
		$this->validateOrder($code);
		
		return json_encode(['message'=>'The order is on its way!']);
	}
	
	
	/**
	 * @param array $order
	 * @return string
	 */
	protected function calculateTotal(Array $order=[]) :string
	{
		$total = 0;
		foreach ($order as $item) {
			$total = $total + ($item['quantity'] * $item['perItem']);
		}
		
		return $total;
	}
	
	/**
	 * Validates the order
	 * @param Verification $code
	 */
	protected function validateOrder(Verification $code): void
	{
		$order = $code->order;
		$order->status = 'verified';
		$order->save();
		
		OrderValidated::dispatch($order);
	}
	
}
