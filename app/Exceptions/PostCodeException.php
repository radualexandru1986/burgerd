<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class PostCodeException extends Exception
{
	public $status = 422;
	
	
	public function __construct($message = "Postcode out of range", $code = 417, Throwable $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
}
