<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public function subjectSubject()
    {
        return $this->belongsTo('App\Models\Teacher', 'subject_id', 'id');
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_subjects');
    }

    public function marks($student_id)
    {
        return Mark::where('student_id', '=', $student_id)->where('subject_id', '=', $this->id)->get();
    }
}
