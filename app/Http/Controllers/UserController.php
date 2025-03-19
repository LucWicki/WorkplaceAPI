<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Allocation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

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

        $validated = $request->validated();
        $userTable = [
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'is_chef' => $validated['is_chef']
        ];


        $user = User::create($userTable);
        $user->departments()->attach($validated['department_id']);
        return $user;
        return new UserResource($user);
    }

    /**
     * Update a specific User.
     */
    public function update(UpdateUserRequest $request, User $user)
    {


            $validated = $request->validated();
            $userTable = [
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => $validated['password'],
                'is_chef' => $validated['is_chef']
            ];

            $fields = ['username', 'email', 'password', 'is_chef'];

            foreach($fields as $field){
                if(empty($userTable[$field])){
                    $userTable[$field] = $user->$field;
                }
            }

            if(empty($validated['department_id'])){
                $department = User::select('allocations.department_id')
                                    ->join('allocations', 'allocations.user_id', '=', 'users.id')
                                    ->where('users.id', Auth::id())
                                    ->first();
                $validated['department_id'] = $department;
            }
            $user->update($userTable);
            return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //ensures that admin won't delete themselves
        if (!Controller::checkDataAccess($user->id)) {
            return response()->json(['message'=>'You can not delete yourself'], 403);
        }

        $user->delete();
        return response()->json('everything worked', 200);
    }

    //shows / displays the User and the infos of their department
    public function displayDepartmentInfos(User $user){
        /**
         * SELECT Statement that combines the wanted data
         * return data
         */

    }
}
