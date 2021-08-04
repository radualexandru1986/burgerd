<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    
    protected $table = 'orders';
    protected $fillable = ['customer_id', 'total', 'payment_method', 'comments', 'status', 'created_at', 'updated_at'];
    
    //relations
	
	/**
	 * @return BelongsTo
	 */
	public function customer(): BelongsTo
	{
		return $this->belongsTo(Customer::class, 'customer_id');
	}
	
	
}
