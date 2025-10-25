<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', PostController::class);
Route::view('/contact', 'contact.contact-form');
Route::post('/contact', ContactFormController::class);
