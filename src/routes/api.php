<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/todos",[ApiController::class,"getApi"])->name("getApi");


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
