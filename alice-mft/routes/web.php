<?php

use App\Http\Controllers;
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
Route::view("/", "welcome");
Route::group(["prefix" => "examples"], function () {
    Route::get("/basic", [Controllers\Examples\Basic::class, "__construct"]);
    Route::get("/dashboard", [Controllers\Examples\Dashboard::class, "__construct"]);
    Route::get("/article", [Controllers\Examples\Article::class, "__construct"]);
});
