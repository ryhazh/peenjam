<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return redirect('/items');
});

Route::resource('categories', CategoryController::class);
Route::resource('items', ItemController::class);
Route::resource('records', RecordController::class);
Route::resource('users', UserController::class);