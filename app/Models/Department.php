<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['weekday_id', 'departmentname', 'departmentwebsite' ];

    // Definining relationships
    public function weekday()
    {
        return $this->hasOne(Weekday::class);
    }

    // Defines that when you for example attach an User it saves it in the allocations table
    public function user()
    {
        return $this->belongsToMany(User::class, 'allocations');
    }

}
