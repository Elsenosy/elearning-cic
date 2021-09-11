<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Instructor extends Authenticatable
{
    protected $table    = 'instructors';
    protected $fillable = ['name', 'email', 'phone', 'avatar', 'password'];

    protected $hidden = ['password'];

    // Delete the avatar
    public function deleteAvatar(){
        if(!empty($this->avatar)){
            \Storage::delete($this->avatar);
        }
    }

    /**
     * Relationships
     */
    public function courses(){
        return $this->hasMany(InstructorCourse::class, 'instructor_id');
    }

}
