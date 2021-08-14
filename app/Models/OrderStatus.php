<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    protected $table = 'order_statuses';
    
    public function isReady()
	{
		return $this->name ==='ready';
	}
	
	public function isProcessing()
	{
		return $this->id === 2;
	}
	
	/**
	 * @return int
	 */
	public static function ready()
	{
		return 3;
	}
	
	
	public static function verified()
	{
		return 6;
	}
	
	public static function processing()
	{
		return 2;
	}
}
