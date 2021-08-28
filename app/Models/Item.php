<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'photo', 'price', 'rating', 'description', 'recipe', 'class', 'type', 'order'];

	
	public function isBundle()
	{
		return $this->type !== null;
	}
	
	
	/**
	 * @param $value
	 * @return string
	 */
	public function getRecipeAttribute($value)
	{
		if(is_array($value)){
			return implode(", ", json_decode($value));
		}
		return $value;
	}
	
	/**
	 * @param $value
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string
	 */
	public function getPhotoAttribute($value)
	{
		return url('storage/'.$value);
	}
}
