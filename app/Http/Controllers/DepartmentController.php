<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Resources\DepartmentResource;


class DepartmentController extends Controller
{
    //TODO
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return DepartmentResource::collection($departments);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $validated = $request->validated();
        $user = Department::create($validated);
        return new DepartmentResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        /**
         * validate request
         * check if department exists (will most likely be done in the UpdateRequest)
         * this includes: checking the departmentname
         * if else logic / maybe external function
         * this logic / function sets the values to their old values if the values in the request are empty
         * create department
         * return data
         */

         $validated = $request->validated();

        $fields = ['departmentname', 'departmentwebsite', 'weekday_id'];

            foreach($fields as $field){
                if(empty($validated[$field])){
                    $validated[$field] = $department->$field;
                }
            }
            $department->update($validated);
            return $department;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
            $deletable = Department::select('allocations.user_id')
                                ->join('allocations', 'allocations.department_id', '=', 'departments.id')
                                ->where('departments.id', $department->id)
                                ->get();


        if (!$deletable->IsEmpty() ) {
            return response()->json('You can only delete empty departments', 403);
        }

        $department->delete();
        return response()->json('everything worked', 200);

    }

      /**
     * Displays the User aka Employees that are in the selected department
     */
    public function displayEmployees(Department $department)
    {
        /**
         * SELECT Statement that combines the wanted data
         * return data
         */
        //return $department;
         $employees = Department::select('users.username')
         ->join('allocations', 'departments.id', '=', 'allocations.department_id')
         ->join('users', 'allocations.user_id', '=', 'users.id')
         ->where('allocations.department_id', $department->id)
         ->get();

         return $employees;
    }
}
