<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstructorCourse extends Model
{
    protected $fillable = ['instructor_id', 'course_id', 'price'];

    /**
     * Relationships
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
