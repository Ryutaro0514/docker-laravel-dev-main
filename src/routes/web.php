<?php

use App\Http\Controllers\TaskForUserController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/signup', [UserController::class,"create"])->name("user.signupCreate");
Route::post('/signup', [UserController::class,"store"])->name("user.signupStore");
Route::get('/signin',[LoginController::class,"signin"])->name("user.signin");
Route::post('/signin',[LoginController::class,"check"])->name("user.check");
// Route::prefix("")->middleware(["auth", "cache.headers:no_store;max_age=0"])->group(function{
    Route::get('/',[TaskForUserController::class,"index"])->name("user.index");
    Route::get('/add',[TaskForUserController::class,"create"])->name("user.create");
    Route::post('/add',[TaskForUserController::class,"store"])->name("user.store");
    Route::delete('/{id}',[TaskForUserController::class,"destroy"])->name("user.destroy");
// });
