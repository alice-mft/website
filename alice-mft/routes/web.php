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
Route::view("/", "contents/main");
Route::view("/test", "test");

Route::group(["prefix" => "examples"], function () {
    Route::get("/basic", [Controllers\Examples\Basic::class, "__construct"]);
    Route::get("/dashboard", [Controllers\Examples\Dashboard::class, "__construct"]);
    Route::get("/article", [Controllers\Examples\Article::class, "__construct"]);
});

Route::group(["prefix" => "account"], function () {
    Route::get("/login", [Controllers\Contents\Account\Login::class, "__construct"]);
    Route::get("/register", [Controllers\Contents\Account\Register::class, "__construct"]);
});

Route::group(["prefix" => "dashboard"], function () {
    Route::get("/", [Controllers\Contents\Dashboard\Main::class, "__construct"]);
    Route::view("/ladder", "contents/dashboard/components/ladder");
});

Route::group(["prefix" => "error"], function () {
    Route::view("/", "contents/error/error");
});

Route::group(["prefix" => "documentation"], function () {
    Route::get("/{section?}", [Controllers\Contents\Documentation\Main::class, "__construct"]);
});
