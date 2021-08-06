<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;
    
    protected $table = 'addresses';
    
    protected $fillable = ['customer_id', 'postcode', 'street', 'number'];
    
    //Relations
	
	/**
	 * One address can only have 1 customer at the time;
	 * @return BelongsTo
	 */
	public function customer(): BelongsTo
	{
		return $this->belongsTo(Customer::class);
	}
	
	public function fullAddress()
	{
		return "{$this->number} - {$this->street},  {$this->postcode} ";
	}
	
	
	public function getPostcodeAttribute($postcode)
	{
		return strtoupper($postcode);
	}
	
}
