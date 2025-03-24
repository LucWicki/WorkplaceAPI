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
     * Display all meetings
     */
    public function index()
    {

        $meetings = Meeting::all();
        if ($meetings->IsEmpty()) {
            return response()->json('No Meetings available', 404);
        }
        return MeetingResource::collection($meetings);
    }

    /**
     * Store a newly created meeting
     */
    public function store(StoreMeetingRequest $request)
    {
        $validated = $request->validated();
        $meeting = Meeting::create($validated);
        return new MeetingResource($meeting);
    }

    /**
     * Update a specific meeting
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
