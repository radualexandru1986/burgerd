<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'photo', 'price', 'rating', 'description', 'recipe', 'class', 'type'];
	
	protected $casts = [
		'recipe' => 'array',
	];
	
	public function isBundle()
	{
		return $this->type !== null;
	}
}
