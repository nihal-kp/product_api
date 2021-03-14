<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function () {
    Route::get('/',[AuthController::class, 'loginView'])->name('login');
    Route::post('/login',[AuthController::class, 'login']);
    Route::get('/signup', function () {  return view('auth.signup');   });
    Route::post('/signup',[AuthController::class, 'signup']);
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});