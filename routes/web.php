<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CategoryController;
use Symfony\Component\Routing\RequestContext;

Route::get('/', function () {
    return redirect('/items');
});

Route::resource('categories', CategoryController::class);
Route::resource('items', ItemController::class);
Route::resource('records', RecordController::class);
Route::resource('users', UserController::class);

// auth routes, return views
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/requests', [RequestController::class, 'index'])->name('requests.index');
Route::put('/requests/accept/{id}', [RequestController::class, 'accept'])->name('requests.accept');
Route::put('/requests/reject/{id}', [RequestController::class, 'reject'])->name('requests.reject');
