<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        // $pageTitle = 'Courses';
        $pageTitle = __('lang.courses');

        // Get the data;
        $result = Course::all();

        return view('courses.index', compact('pageTitle', 'result'));

    } // End of index

    public function create(){
        return view('courses.create');
    } // End of create method

    public function store(Request $request){
        $rules = [
            'name' => 'required|string|min:5|max:255|unique:courses,name',
            'desc' => 'nullable|string|min:5|max:10000',
        ];

        // validate data
        $this->validate($request, $rules);

        // Save in the model
        Course::create($request->all());
        
        return redirect()->to('courses');
        // return back();

        // dd(request()->all());

    } // End of store method
}
