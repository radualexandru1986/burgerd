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
