<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Instructor;


class InstructorController extends Controller
{
    public function index()
    {
        // Define new instructor
        // $instructor = [
        //     'name' => 'Taha',
        //     'email' => 'test45@test.com',
        //     'phone' => '01112113023',
        //     'password' => \Hash::make('123456'),
        // ];

        // Add instructor data to the table
        // $result = Instructor::create($instructor);

        // Get only instructor by ID
        // $ins = Instructor::find(3);

        // Get instructors using where
        // $items = Instructor::where('name', 'like', "%ta%")
        //     ->get();

        // dump($ins->name);
        // dump($ins->email);

        
        $pageTitle = "Instructors";
        // Get data from database 
        $result = Instructor::paginate(10);

        return view('instructors.index', compact('pageTitle', 'result'));
    }

    public function create()
    {
        return view('instructors.create');
    }

    // Store instructor data in database
    public function store(Request $request)
    {
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
        if (isset($data['password']) || request()->has('password')) {
            $data['password'] = \Hash::make(request()->password);
        }

        Instructor::create($data);

        // Return to back;
        return back();

        // dd(request()->all());
    }
    
    /**
     * show an item
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        $pageTitle = 'Instructor';

        // Get item
        // $item = Instructor::find($id);
        $item = Instructor::findOrFail($id);

        // Check if not exists
        // if(!$item){
        //     abort(404);
        // }

        return view('instructors.show', compact('pageTitle', 'item'));
    } // End of show method

    
    /**
     * Edit a specific resource
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $pageTitle = 'Instructor';

        // Get item
        // $item = Instructor::find($id);
        $item = Instructor::findOrFail($id);

        // Check if exists  or abort error: 404 
        // if(!$item){
        //     abort(404);
        // }

        return view('instructors.edit', compact('pageTitle', 'item'));
    } // End of edit method

    
    /**
     * update specific resource
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return redirect
     */
    public function update($id, Request $request)
    {
        // Get the item
        $item = Instructor::findOrFail($id);

        // Define rules
        $rules = [
            'name' => 'required|string|min:3|max:225',
            'email' => 'required|email|max:225|unique:instructors,email,' . $id, // Unique and ignore this item ID
            'phone' => 'required|numeric|starts_with:0|digits_between:10,30|unique:instructors,phone,' . $id, // Unique and ignore this item ID
            'password' => 'nullable|string|min:6|max:10'
        ];

        // Do validation
        $this->validate($request, $rules);

        // Get request data
        $data = $request->all();

        // Check if request has password, to hash
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = \Hash::make(request()->password);
        }else{
            unset($data['password']);
        }

        // Define a session
        // session()->put('success', "Saved!");

        // Set a session of type 'Flash': it displayed once. 
        session()->flash('success', "Saved!");

        // Update the data
        $item->update($data);

        return back();

    } // End of update

    
    /**
     * destroy
     * Delete a specific resource
     * @param  mixed $id
     * @return void
     */
    public function destroy($id){
        // Get item
        $item = Instructor::findOrFail($id);

        // Delete the item
        $item->delete();

        session()->flash('success', 'Deleted!');
        return back();
    }
}
