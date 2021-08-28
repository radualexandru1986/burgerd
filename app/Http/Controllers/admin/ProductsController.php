<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$items = Item::orderBy('order', 'asc')->get();
		return view('auth.products',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Item::create($this->clean($request));
        return redirect()->to(route('admin.products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	Item::findOrFail($id)->update($this->clean($request));
        return redirect()->back()->with('success', 'Your Item was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::find($id)->delete();
        
        return redirect()->back();
    }
	
	/**
	 * The fist line will transform the data to an array
	 * This will return only the  keys that have a value and they are not method or token
	 *
	 * @param Request $request
	 */
    protected function clean(Request $request)
	{
		if($request->hasFile('image')){
			$request->image->storeAs('public', $request->image->getClientOriginalName());
			$photo = $request->image->getClientOriginalName();
			$request->merge(['photo'=>$photo]);
		}
		if($request->bundle=='yes'){
			$request->merge(['type'=>'bundle']);
		}
		return collect($request->all())->filter(function ($el, $key){
			return $el !== null && $key!='_token' && $key != '_method';
		})->all();
	}
}
