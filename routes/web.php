<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Website\HomeController;
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

Route::get('/', [HomeController::class,'index']);
Route::post('/', [HomeController::class,'submit']);
Route::get('/order', [HomeController::class,'order']);
Route::get('/set-language/{locale}', [LanguageController::class,'setLanguage'])->name('set-language');
