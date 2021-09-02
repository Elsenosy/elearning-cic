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
}
