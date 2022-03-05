<?php

use App\Http\Controllers\TodoItemController;
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

        Route::group(['prefix' => '/items'], function () {
            Route::post('/{list}/create', [TodoItemController::class, 'store'])->name('todo-item.store');

            Route::group(['prefix' => '/{item}'], function () {
                Route::patch('/update', [TodoItemController::class, 'update'])->name('todo-item.update');
                Route::delete('/delete', [TodoItemController::class, 'destroy'])->name('todo-item.destroy');
            });
        });
    });
});

Route::permanentRedirect('/', '/lists');
