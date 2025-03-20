<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    /** @use HasFactory<\Database\Factories\MeetingFactory> */
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['department_id',  'meetingname' , 'reason'];
     // Definining relationships
     public function departments()
     {
         return $this->hasOne(Department::class);
     }
}
