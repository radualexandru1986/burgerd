<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Verification;
use App\Services\CodeGenerator;
use App\Services\PostcodeFilter;
use App\Services\SendSMS;
use Illuminate\Http\Request;

class OrderController extends Controller
{
	
	
	/**
	 * Collects the data from the form
	 * @param Request $request
	 * @param PostcodeFilter $postcodeFilter
	 * @param Customer $customer
	 * @param SendSMS $sms
	 * @param Verification $verification
	 * @return string
	 * @throws \Twilio\Exceptions\TwilioException
	 */
    public function collectInfo(
    	Request $request,
		PostcodeFilter $postcodeFilter,
		Customer $customer,
		SendSMS $sms
	)
	{
		// if the postcode is out of range return a null value for now
		if(! $postcodeFilter->inRange($request->get('postcode')) ){
			return 'The postcode is not in range'; //debugging purposes
		}
		//validate the data
		$request->validate([
			'street'=>'required|min:3',
			'number'=>'required',
			'postcode'=>'required',
			'phone'=>'required|min:10|max:11',
		]);
		
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
		$sms->sendConfirmationCode($request->get('phone'), $code);
		Verification::create([
			'customer_id'=> $newCustomer->id,
			'verification_code' => $code
		]);
		
		return 'OK';
	}
	
	
	
}
