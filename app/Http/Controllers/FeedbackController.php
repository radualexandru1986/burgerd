<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
	
	/**
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function index()
	{
		return view('layouts.contact');
	}
	
	/**
	 * @param Request $request
	 */
	public function store(Feedback $feedback , Request $request)
	{
		$request->validate([
			'name'=>'required|min:3',
			'email' => 'required',
			'message' => 'required|min:4'
		]);
		$feedback->name = $request->get('name');
		$feedback->email = $request->get('email');
		$feedback->message = $request->get('message');
		$feedback->save();
		
		return redirect()->back()->with('success', 'Thank you for your message.');
	}
	
	
}
