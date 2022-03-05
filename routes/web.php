<?php

use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => '/lists'], function () {
        Route::get('/', [TodoListController::class, 'index'])->name('home');
        Route::post('/create', [TodoListController::class, 'store'])->name('todo-list.store');

        Route::group(['prefix' => '/{list}'], function () {
            Route::patch('/update', [TodoListController::class, 'update'])->name('todo-list.update');
            Route::delete('/delete', [TodoListController::class, 'destroy'])->name('todo-list.destroy');
        });
    });
});

Route::permanentRedirect('/', '/lists');
