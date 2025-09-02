<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/todos", [ApiController::class, "getApi"])->name("getApi");
Route::post("/todos",[ApiController::class,"postApi"])->name("postApi");
Route::put("/todos/{id}",[ApiController::class,"putApi"])->name("putApi");