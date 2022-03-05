<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/lists', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
