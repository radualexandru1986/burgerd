<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    
    protected $table = 'orders';
    protected $fillable = ['customer_id', 'total', 'payment_method', 'comments', 'status_id', 'created_at', 'updated_at'];
    
    //relations
	
	/**
	 * @return BelongsTo
	 */
	public function customer(): BelongsTo
	{
		return $this->belongsTo(Customer::class, 'customer_id');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function items()
	{
		return $this->hasMany(OrderItems::class, 'order_id');
	}
	
	/**
	 * getting the order status
	 *
	 * @return BelongsTo
	 */
	public function status()
	{
		return $this->belongsTo(OrderStatus::class, 'status_id' );
	}
	
	/**
	 * @var string[]
	 */
	protected $casts = [
		'created_at'=> 'datetime'
	];
	
	
	public function finishOrder()
	{
		$this->status_id = OrderStatus::ready();
		$this->save();
	}
}
