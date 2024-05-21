<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::middleware(['auth'])->group(function() {
    Route::get('/my-profile', [UserController::class, 'viewMyProfile']);

    Route::get('/items', function () {
        $products = DB::table('products')->get();

        return view('items')->with('products', $products);
    });
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function(){
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::get('/orders', function () {
        return view('admin.orders');
    });

    Route::get('/users', [UserController::class, 'getUsers']);

    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);

    Route::get('/settings', function () {
        $settings = DB::table('settings')->get();

        return view('admin.settings', compact('settings'));
    });
});

