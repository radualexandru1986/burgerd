<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Verification extends Model
{
    use HasFactory;
    
    protected $table='verifications';
    protected $fillable = ['customer_id', 'verification_code', 'verified', 'order_id'];
    
    //Relations
	
	/**
	 * @return BelongsTo
	 */
	public function order(): BelongsTo
	{
		return $this->belongsTo(Order::class, 'order_id');
	}
	
	/**
	 * @var mixed
	 */
	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
	
	//Casts
	protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime'
	];
	
}
