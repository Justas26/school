<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    public function markSubject()
    {
        return $this->hasMany('App\Models\Subject', 'subject_id', 'id');
    }
    public function markStudent()
    {
        return $this->hasMany('App\Models\Subject', 'student_id', 'id');
    }
}
