<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['employee_id', 'department_id'];

    // Definining relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
