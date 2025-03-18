<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


//TODO: Routen definieren

//login and logout routes
Route::middleware(['web'])->group( function(){
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);
});


Route::middleware(['chef', 'auth:sanctum'])->group( function(){
    Route::ApiResource('users', 'App\Http\Controllers\UserController');
    Route::get('/users/displaydepartmentinfos',[UserController::class, 'displayDepartmentInfos']);
});
