<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/contact', function () {
    return view('layouts.contact');
})->name('contact');
