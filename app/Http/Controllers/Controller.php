<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    public function checkDataAccess($user_id){
        return (Auth::id() != $user_id) ? true : false;
    }
}
