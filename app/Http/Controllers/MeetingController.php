<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMeetingRequest;
use App\Http\Requests\UpdateMeetingRequest;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * define a variable with all meetings
         * return it as Resource
         */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMeetingRequest $request)
    {
        /**
         * validate request
         * check if Meeting exists (will most likely be done in the StoreRequest)
         * checked values are:
         * create meeting
         * return data
         */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMeetingRequest $request, Meeting $meeting)
    {
        /**
         * validate request
         * check if meeting exists (will most likely be done in the UpdateRequest)
         * this includes: checking the meetingname
         * if else logic / maybe external function
         * this logic / function sets the values to their old values if the values in the request are empty
         * create department
         * return data
         */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meeting $meeting)
    {
        /**
         * check if the meeting has a department
         * if it has a department error message "a department has this meeting"
         * if empty: delete
         */
    }
}
