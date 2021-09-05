<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Instructor;


class InstructorController extends Controller
{
    public function index(){
        // Define new instructor
        $instructor = [
            'name' => 'Taha',
            'email' => 'test45@test.com',
            'phone' => '01112113023',
            'password' => \Hash::make('123456'),
        ];

        // Add instructor data to the table
        // $result = Instructor::create($instructor);

        // Get data from database 
        $result = Instructor::all();

        // Get only instructor by ID
        $ins = Instructor::find(3);

        // Get instructors using where
        $items = Instructor::where('name', 'like', "%ta%")
                                ->get();
        
        // dump($ins->name);
        // dump($ins->email);
        
        $pageTitle = "Instructors";

        return view('instructors.index', compact('pageTitle', 'result'));
    }  
    
    public function create(){
        return view('instructors.create');
    }

    // Store instructor data in database
    public function store(Request $request){
        // Define rules
        $rules = [
            'name' => 'required|string|min:3|max:225',
            'email' => 'required|email|max:225|unique:instructors,email',
            'phone' => 'required|numeric|starts_with:0|unique:instructors,phone|digits_between:10,30',
            'password' => 'required|string|min:6|max:10'
        ];
        
        // Do validation
        $this->validate($request, $rules);  
        
        // $instructor = new Instructor();
        // $instructor->name = request()->name;
        // $instructor->email = request()->email;
        // $instructor->phone = request()->phone;
        // $instructor->password = \Hash::make(request()->password);
        // $instructor->save();

        // Another way to save data
        $data = request()->all();

        // Check if request has password, to hash
        if(isset($data['password']) || request()->has('password')){
            $data['password'] = \Hash::make(request()->password);
        }

        Instructor::create($data);

        // Return to back;
        return back();

        // dd(request()->all());
    }
}
