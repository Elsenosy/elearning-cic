<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table    = 'instructors';
    protected $fillable = ['name', 'email', 'phone', 'avatar', 'password'];

    protected $hidden = ['password'];
}
