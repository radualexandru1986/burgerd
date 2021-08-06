<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItems extends Model
{
    use HasFactory;
    
    protected $table = 'order_items';
    protected $fillable = ['order_id', 'item_id', 'drink', 'quantity', 'comments', 'created_at', 'updated_at'];
    
    //relations
	
	/**
	 * @return BelongsTo
	 */
	public function order(): BelongsTo
	{
		return $this->belongsTo(Order::class, 'order_id');
	}
	
	/**
	 * @return BelongsTo
	 */
	public function item(): BelongsTo
	{
		return $this->belongsTo(Item::class, 'item_id');
	}
	
	/**
	 * @return false|BelongsTo
	 */
	public function drink()
	{
		if (!$this->hasDrink()){
			return false;
		}
		
		return Item::find($this->drink)->name;
	}
	
	
	/**
	 * @return mixed
	 */
	protected function hasDrink()
	{
		return $this->drink;
	}
}
