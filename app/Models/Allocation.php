<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['user_id', 'department_id'];

    // Definining relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
