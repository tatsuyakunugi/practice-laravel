<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShopUploadController;
use App\Http\Controllers\LikeController;

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

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/detail/{shop_id}', [ShopController::class, 'detail']);
Route::get('/livewire', [ShopController::class, 'livewire']);
Route::middleware('auth')->group(function () {
    Route::get('/done', [ShopController::class, 'done']);
});

Route::get('/create', [ShopUploadController::class, 'create'])->name('create');
Route::post('/shop_upload', [ShopUploadController::class, 'store'])->name('shop_upload');

Route::get('/menu', [UserController::class, 'menu']);

Route::get('/register', [RegisterController::class, 'getRegister']);
Route::post('/register', [RegisterController::class, 'postRegister']);
Route::get('/auth/thanks', [RegisterController::class, 'thanks']);

Route::get('/login', [LoginController::class, 'getLogin']);
Route::post('/login', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'getLogout']);

Route::middleware('auth')->group(function () {
    Route::post('/like/{shop}', [LikeController::class, 'store'])->name('likes.store');
    Route::delete('/unlike{shop}', [LikeController::class, 'destroy'])->name('likes.destroy');
});