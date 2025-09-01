<?php

use App\Http\Controllers\TaskForUserController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/signup', [UserController::class,"create"])->name("user.signupCreate");
Route::post('/signup', [UserController::class,"store"])->name("user.signupStore");
Route::get('/signin',[LoginController::class,"signin"])->name("login");
Route::post('/signin',[LoginController::class,"check"])->name("user.check");
Route::middleware(["auth", "cache.headers:no_store;max_age=0"])->group(function(){
    Route::get('/',[TaskForUserController::class,"index"])->name("user.index");
    Route::get('/add',[TaskForUserController::class,"create"])->name("user.create");
    Route::post('/add',[TaskForUserController::class,"store"])->name("user.store");
    Route::delete('/{id}',[TaskForUserController::class,"destroy"])->name("user.destroy");
    Route::get('/edit/{id}',[TaskForUserController::class,"edit"])->name("user.edit");
    Route::patch('/edit/{id}',[TaskForUserController::class,"update"])->name("user.update");
    Route::get('/signout',[LoginController::class,"signout"])->name("user.signout");
    Route::patch('/complete/{id}',[TaskForUserController::class,"complete"])->name("user.complete");
});

