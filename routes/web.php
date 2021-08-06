<?php
	
	use App\Services\PostcodeFilter;
	use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/faq', function(){
	return view('layouts.faq');
})->name('faq');


Route::get('/filter-postcode/{postcode?}', function($postcode, PostcodeFilter $postcodeFilter){
	return json_encode($postcodeFilter->inRange($postcode));
});

Route::get('/contact', [\App\Http\Controllers\FeedbackController::class, 'index'])->name('contact');
Route::post('/contact/store', [\App\Http\Controllers\FeedbackController::class, 'store'])->name('contact.store');

Route::post('/orders/create', [\App\Http\Controllers\OrderController::class, 'collectInfo']);
Route::post('/orders/confirm', [\App\Http\Controllers\OrderController::class, 'confirmOrder']);
Route::get('/t', function(){
	throw new \App\Exceptions\PostCodeException(response()->json(['shit'=>'done', 'status'=>422]), 422);
});
//Preview email
Route::get('/ordermail', function(){
	$order = \App\Models\Order::find(2);
	
	return new \App\Mail\NewOrder($order);
});
