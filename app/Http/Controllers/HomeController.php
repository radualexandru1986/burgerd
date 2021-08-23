<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Item $item)
	{
		return view('home', ['items'=>$item->all(), 'settings'=>Settings::first()]);
	}
}
