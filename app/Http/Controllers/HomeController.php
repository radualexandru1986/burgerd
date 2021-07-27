<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($search=null, Item $item)
	{
		if(!$search){
			$items = $item->all();
		}else{
			$items = $item->where('class', $search)->get();
		}
		
		return view('home', ['items'=>$items]);
	}
}
