<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AdminOrStaffMiddleware;
use Symfony\Component\Routing\RequestContext;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\StaffMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Routing\RouteGroup;

// Route::get('/', function () {
//     return redirect('/items');
// });

// Route::resource('categories', CategoryController::class);
// Route::resource('items', ItemController::class);
// Route::resource('records', RecordController::class);
// Route::resource('users', UserController::class);

// auth routes, return views
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
});

// Route::middleware([RoleMiddleware::class . ':admin,staff'])->group(function () {}); useless ahh



Route::middleware(['auth', AdminOrStaffMiddleware::class])->group(function () {
    Route::get('/requests', [RequestController::class, 'index'])->name('requests.index');
    Route::put('/requests/accept/{id}', [RequestController::class, 'accept'])->name('requests.accept');
    Route::put('/requests/reject/{id}', [RequestController::class, 'reject'])->name('requests.reject');
    Route::resource('records', RecordController::class);

});


Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('items', ItemController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
});




Route::middleware('guest')->group(function () {});

Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::middleware('auth')->post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login')->middleware('throttle:10,1');
