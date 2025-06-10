<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AdminOrStaffMiddleware;
use Symfony\Component\Routing\RequestContext;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\StaffMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Routing\RouteGroup;

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

// Route::resource('categories', CategoryController::class);
// Route::resource('items', ItemController::class);
// Route::resource('records', RecordController::class);
// Route::resource('users', UserController::class);
// Route::middleware([RoleMiddleware::class . ':admin,staff'])->group(function () {}); useless ahh
// Route::middleware('guest')->group(function () {

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::middleware(['auth', AdminOrStaffMiddleware::class])->group(function () {
    Route::put('/requests/accept/{id}', [RequestController::class, 'accept'])->name('requests.accept');
    Route::put('/requests/reject/{id}', [RequestController::class, 'reject'])->name('requests.reject');

    Route::resource('records', RecordController::class)->only([
        'store',
        'update',
        'destroy'
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/requests', [RequestController::class, 'index'])->name('requests.index');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);

    // aidems ruts
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
});

// routes that all authenticated users can use
Route::middleware(['auth'])->group(function () {
    Route::post('/requests', [RequestController::class, 'store'])->name('requests.store');
    Route::get('/records', [RecordController::class, 'index'])->name('records.index');
});


Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register')->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login')->middleware('throttle:10,1');
