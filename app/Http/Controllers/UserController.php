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
     * Display all users aka employees
     */
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }


    /**
     * Store a newly created User.
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
        return new UserResource($user);
    }

    /**
     * Update a specific User.
     */
    public function update(UpdateUserRequest $request, User $user)
    {


            $validated = $request->validated();
            //because department_id is not in the users table
            // ??null to prevent undefined array key error
            //TODO: what does ?? null really mean
            $userTable = [
                'username' => $validated['username']?? null,
                'email' => $validated['email']?? null,
                'password' => $validated['password']?? null,
                'is_chef' => $validated['is_chef']?? null
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
            $user->departments()->sync($validated['department_id']);
            $user->update($userTable);
            return new UserResource($user);
    }

    /**
     * Remove a specific user
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

    // displays the User and the infos of their department
    public function displayDepartmentInfos(User $user){

        //selects the user and the department and the departmentInfos = columns
         $data = User::select('users.username', 'departments.departmentname', 'departments.departmentwebsite', 'weekdays.dayname as MeetingDay')
         ->join('allocations', 'users.id', '=', 'allocations.user_id')
         ->join('departments', 'allocations.department_id', '=', 'departments.id')
         ->join('weekdays', 'departments.weekday_id', '=', 'weekdays.id')
         ->where('users.id', $user->id)
         ->get();

         return $data;

    }
}
