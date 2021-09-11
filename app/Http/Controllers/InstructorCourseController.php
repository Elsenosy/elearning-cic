<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorCourseController extends Controller
{
    public function store(int $id, Request $request)
    {
        $rules = [
            'course_id' => 'required|exists:courses,id'
        ];

        $this->validate($request, $rules);

        // Get instructor
        $instructor = Instructor::findOrFail($id);

        // Get data 
        $data = $request->all();
        $data['price'] = 16;

        // Save instructor data
        $instructor->courses()->create($data);

        return back();
    }
}