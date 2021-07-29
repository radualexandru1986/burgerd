<?php
namespace App\Services;


class CodeGenerator
{
	/**
	 * Generates a random string
	 */
	public function generateRandom() :string
	{
		return rand(10000 , 19999);
	}
}
