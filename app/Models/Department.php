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
        return $this->belongsTo(Weekday::class);
    }
}
