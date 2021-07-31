<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;
    
    protected $table='verifications';
    protected $fillable = ['customer_id', 'verification_code', 'verified'];
    
    //Relations
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
