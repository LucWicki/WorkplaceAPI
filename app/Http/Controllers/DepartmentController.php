<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Resources\DepartmentResource;


class DepartmentController extends Controller
{

    /**
     * Display all departments
     */
    public function index()
    {
        $departments = Department::all();
        return DepartmentResource::collection($departments);
    }


    /**
     * Store a newly created department
     */
    public function store(StoreDepartmentRequest $request)
    {
        $validated = $request->validated();
        $user = Department::create($validated);
        return new DepartmentResource($user);
    }

    /**
     * Update a specific department
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $validated = $request->validated();
        //array fields contains the names of the columns
        $fields = ['departmentname', 'departmentwebsite', 'weekday_id'];

        //checks each field if it is empty or not
            foreach($fields as $field){
                if(empty($validated[$field])){
                    $validated[$field] = $department->$field;
                }
            }
            $department->update($validated);
            return $department;
    }

    /**
     * Remove a specific department
     */
    public function destroy(Department $department)
    {
            //selects user_ids of that departments
            $deletable = Department::select('allocations.user_id')
                                ->join('allocations', 'allocations.department_id', '=', 'departments.id')
                                ->where('departments.id', $department->id)
                                ->get();

        //checks if there are any user_ids in deletable
        if (!$deletable->IsEmpty() ) {
            return response()->json('You can only delete empty departments', 403);
        }
        //deletes that department, if there aren't any employees in that department
        $department->delete();
        return response()->json('everything worked', 200);

    }

      /**
     * Displays the User aka Employees that are in the selected department
     */
    public function displayEmployees(Department $department)
    {
        //selects all employees of that department
         $employees = Department::select('users.username')
         ->join('allocations', 'departments.id', '=', 'allocations.department_id')
         ->join('users', 'allocations.user_id', '=', 'users.id')
         ->where('allocations.department_id', $department->id)
         ->get();

         return $employees;
    }
}
