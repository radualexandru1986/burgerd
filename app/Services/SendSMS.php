<?php
namespace App\Services;

use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client as TwilioClient;

class SendSMS
{
	protected $twilio;
	protected $accountId;
	protected $authToken;
	
	public function __construct()
	{
		$this->authToken = env('TWILIO_AUTH_TOKEN');
		$this->accountId = env('TWILIO_ACCOUNT_ID');
		$this->twilio = new TwilioClient($this->accountId, $this->authToken);
	}
	
	public function sendMassSms($receivers=[], $message)
	{
		if(!empty($receivers)){
			foreach ($receivers as $receiver){
				$this->twilio->messages->create(
					'+44'.$receiver,
					[
						'from' => 'Emys-Burger',
						'body' => $message
					]
				);
			}
		}
		
		
	}
	
	/**
	 * @param $receiver
	 * @param $message
	 * @throws \Twilio\Exceptions\TwilioException
	 */
	public function custom($receiver, $message)
	{
		$message = str_replace( ["\r\n", "\n", "\r"], '',$message,);
		$receiver = $this->phoneValidator($receiver);
			$this->twilio->messages->create(
				$receiver,
				[
					'from' => 'Emys-Burger',
					'body' => $message
				]
			);
	}
	
	/**
	 * This will send a verification code via SMS and the user will have to insert the code back.
	 * @param $receiver
	 * @param $code
	 * @throws \Twilio\Exceptions\TwilioException
	 */
	public function sendConfirmationCode($receiver, $code)
	{
		$receiver = $this->phoneValidator($receiver);
		$this->twilio->messages->create(
			$receiver, ['from' => 'Emys-Verify', 'body' => 'Hi there, Your code is : ' . $code]
		);
	}
	
	
	/**
	 * This will try and clean the phone number and return a proper format that works for twilio
	 *
	 * @param $phone
	 * @return string
	 */
	protected function phoneValidator($phone): string
	{
		if(strlen($phone)==11){
			$phone = ltrim($phone, 0);
		}
		return '+44'.$phone;
	}
	
}
