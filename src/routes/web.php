<?php

use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [UserController::class,"create"])->name("user.create");
Route::post('/signup', [UserController::class,"store"])->name("user.store");
Route::get('/signin',[LoginController::class,"signin"])->name("user.signin");
Route::post('/signin',[LoginController::class,"check"])->name("user.check");