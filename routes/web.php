<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);


Route::get('/contact', function () {
    return view('layouts.contact');
})->name('contact');
