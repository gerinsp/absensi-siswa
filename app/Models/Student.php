<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function classroom() 
    {
        return $this->belongsTo(Classroom::class);
    }

    public function presence() 
    {
        return $this->hasMany(Presence::class, 'student_nis', 'nis');
    }

}
