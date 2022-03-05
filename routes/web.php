<?php

use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::redirect('/', '/lists');
Route::get('/lists', [TodoListController::class, 'index'])->name('home');
