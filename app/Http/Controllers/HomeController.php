<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Item $item)
	{
		$items = $item->orderBy('order', 'asc')->get();
		return view('home', ['items'=>$items, 'settings'=>Settings::first()]);
	}
}
