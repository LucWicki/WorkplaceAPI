<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMeetingRequest;
use App\Http\Requests\UpdateMeetingRequest;
use App\Http\Resources\MeetingResource;


class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meetings = Meeting::all();
        return MeetingResource::collection($meetings);
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
        $validated = $request->validated();
        $meeting = Meeting::create($validated);
        return new MeetingResource($meeting);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMeetingRequest $request, Meeting $meeting)
    {
        $validated = $request->validated();
        $fields = ['meetingname', 'reason', 'department_id'];

            foreach($fields as $field){
                if(empty($validated[$field])){
                    $validated[$field] = $meeting->$field;
                }
            }
            $meeting->update($validated);
            return $meeting;
    }
}
