<?php

use App\Models\product;
use App\Models\category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
    return view('index',[
        'categories' => category::all(),
        'products' => product::all()
    ]);
});
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/product/{product:slug}', [ProductController::class, 'show']);
Route::get('/category/{category:slug}', [CategoryController::class, 'show']);
