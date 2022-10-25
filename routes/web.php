<?php

use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/viadao', function () {
    return view('viadao');
});

Route::get('/sim', function () {
    return view('sim');
});

Route::get('/nao', function () {
    return view('nao');
});

Route::get('/videosIndex', [VideosController::class, 'index']);

Route::post('/video/store/', [VideosController::class, 'store'])->name('mamei');

Route::get('/video/upload/', [VideosController::class, 'upload'])->name('mamado');

Route::get('/video/{codigodovideo}', [VideosController::class, 'video'])->name('chupei');



