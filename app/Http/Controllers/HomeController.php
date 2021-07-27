<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Item $item)
	{
		return view('home', ['items'=>$item->all()]);
	}
}
