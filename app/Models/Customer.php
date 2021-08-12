<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    use HasFactory;
    
    protected $table = 'customers';
    protected $fillable = ['phone', 'name'];
    
    //Relations
	
	/**
	 * One customer can only have 1 address
	 * @return HasOne
	 */
	public function address(): HasOne
	{
		return $this->hasOne(Address::class, 'customer_id');
	}
	
	/**
	 * This will return all the verifications that this user had.
	 * @return HasMany
	 */
	public function verification(): HasMany
	{
		return $this->hasMany(Verification::class, 'customer_id');
	}
	
	public function order()
	{
		return $this->hasMany(Order::class, 'customer_id');
	}
}
