<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    //function to check if the data the user is accessing is their own data
    public function checkDataAccess($user_id){
        return (Auth::id() != $user_id) ? true : false;
    }
}
