<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{ //TODO
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }


    /**
     * Store a new User.
     */
    public function store(StoreUserRequest $request)
    {
        /**
         * validate request
         * create user
         * return as UserResource
         */
    }

    /**
     * Update a specific User.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        /**
         * validate request
         * if else logic / maybe external function
         * this logic / function sets the values to their old values if the values in the request are empty
         * update the User
         * return data
         */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        /**
         * check if the chef tries to delete themselves, and if yes return an error
         * continue if no
         * check if the user exists
         * yes: delete user
         * no: return error with "this user doesn't exist
         * (prolly won't be used as the User Model already controls this usually)
         * delete user
         * return confirmation message
         */
    }

    //shows / displays the User and the infos of their department
    public function displayDepartmentInfos(User $user){
        /**
         * SELECT Statement that combines the wanted data
         * return data
         */

    }
}
