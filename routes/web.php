<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ComicController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PostController;


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

Route::get('/', [PageController::class, 'index'])->name('home');
//Route::get('/comic', [ComicController::class, 'index'])->name('comic.index');
Route::resource('comic', ComicController::class);





Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post', [PostController::class, 'store']);