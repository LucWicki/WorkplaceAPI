<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MeetingController;




//login and logout routes
Route::middleware(['web'])->group( function(){
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::get('/meetings', [MeetingController::class, 'index']);

Route::middleware(['chef', 'auth:sanctum'])->group( function(){
    //user routes
    Route::ApiResource('users', 'App\Http\Controllers\UserController');
    Route::get('/users/displaydepartmentinfos/{user}',[UserController::class, 'displayDepartmentInfos']);

    //department routes
    Route::ApiResource('departments', 'App\Http\Controllers\DepartmentController');
    Route::get('/departments/displayemployees/{department}',[DepartmentController::class, 'displayEmployees']);
    //meetings routes
    Route::post('/meetings', [MeetingController::class, 'store']);
    Route::put('/meetings/{meeting}', [MeetingController::class, 'update']);
});
