<?php
	
	use App\Services\PostcodeFilter;
	use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/filter-postcode/{postcode?}', function($postcode, PostcodeFilter $postcodeFilter){
	return json_encode($postcodeFilter->inRange($postcode));
});

Route::get('/contact', function () {
    return view('layouts.contact');
})->name('contact');

Route::post('/orders/create', [\App\Http\Controllers\OrderController::class, 'collectInfo']);
Route::post('/orders/confirm', [\App\Http\Controllers\OrderController::class, 'confirmOrder']);
