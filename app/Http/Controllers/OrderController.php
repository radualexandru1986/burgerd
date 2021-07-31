<?php

namespace App\Http\Controllers;

use App\Exceptions\PostCodeException;
use App\Models\Address;
use App\Models\Customer;
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
		$postcodeFilter->inRange($request->get('postcode'));
		
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
		//generate a new random number
		$code = (new CodeGenerator())->generateRandom();
		//send sms
		//$sms->sendConfirmationCode($request->get('phone'), $code);
		
		//Todo Is very important to create a repository and add database transactions with a try catch block
		Verification::create([
			'customer_id'=> $newCustomer->id,
			'verification_code' => $code
		]);
		
		return 'OK';
	}
	
	/**
	 *
	 * @param Request $request
	 * @param Verification $verification
	 * @return string
	 */
	public function confirmOrder(Request $request, Verification $verification): string
	{
		$request->validate([
			'verification' => 'required|min:5|:max:5'
		]);
		
		$code = $verification->where( 'verification_code', $request->get('verification') )
							 ->whereDate( 'created_at',  Carbon::today() )
			                 ->first();
		if($code){
			$code->verified = true;
			$code->save();
		}
		
		return json_encode(['message'=>'The order is on its way!']);
	}
	
	
	
}
