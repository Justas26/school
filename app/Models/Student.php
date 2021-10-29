<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function studentClass()
    {
        return $this->belongsTo('App\Models\SchoolClass', 'school_class_id', 'id');
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subjects');
    }
}
