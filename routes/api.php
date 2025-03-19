<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DepartmentController;


//TODO: Routen definieren

//login and logout routes
Route::middleware(['web'])->group( function(){
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);
});


Route::middleware(['chef', 'auth:sanctum'])->group( function(){
    //user Routes
    Route::ApiResource('users', 'App\Http\Controllers\UserController');
    Route::get('/users/displaydepartmentinfos|{user}',[DepartmentController::class, 'displayDepartmentInfos']);

    //department Routes
    Route::ApiResource('departments', 'App\Http\Controllers\DepartmentController');
    Route::get('/departments/displayemployees|{department}',[DepartmentController::class, 'displayemployees']);

});
