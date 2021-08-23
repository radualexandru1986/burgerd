<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
	/**
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
	 */
    public function index()
	{
		$settings = Settings::all();
		return view('auth.settings', compact('settings'));
	}
	
	/**
	 * @param Settings $settings
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function closeStore(Settings $settings)
	{
		$state = $settings->find(1);
		$state->open = false;
		$state->save();
		return redirect()->back()->with('success', 'The shop is CLOSED');
	}
	
	/**
	 * @param Settings $settings
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function openStore(Settings $settings)
	{
		$state = $settings->find(1);
		$state->open = true;
		$state->save();
		return redirect()->back()->with('success', 'The shop is now OPEN');
	}
}
