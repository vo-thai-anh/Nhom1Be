<?php
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;
Route::get('/',[UserController::class,'demo']);
Route::post('/users',[UserController::class,'store']);
Route::delete('/users/{id}',[UserController::class,'destroy']);
