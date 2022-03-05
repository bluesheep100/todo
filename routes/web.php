<?php

use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/lists', [TodoListController::class, 'index'])->name('home');
});

Route::permanentRedirect('/', '/lists');
