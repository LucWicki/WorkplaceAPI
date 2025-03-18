<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
    //TODO
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * define a variable with all departments
         * return it as Resource
         */
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        /**
         * validate request
         * check if department exists (will most likely be done in the StoreRequest)
         * create department
         * return data
         */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        /**
         * validate request
         * check if department exists (will most likely be done in the UpdateRequest)
         * this includes: checking the name
         * if else logic / maybe external function
         * this logic / function sets the values to their old values if the values in the request are empty
         * create department
         * return data
         */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //TODO ask Artjan what he thinks abt this, aka can a department with users be deleted or not
        //and if not what to do?
        /**
         * check if the department has users
         * if it has users
         */
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
    }
}
