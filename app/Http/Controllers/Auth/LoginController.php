<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{    
    /**
     * login
     * retrieve login view
     * @return void
     */
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request){
        // dump($request->all());
        // dump($request->only(['email', 'password']));
        // dd($request->except(['_token']));
        
        // Array to retrieve only the email and password from the request
        $credentials = $request->only(['email', 'password']);

        // Do check 
        $checkStatus = auth('instructor')->check();

        // Do verify 
        $checkLogin = auth('instructor')->attempt($credentials);

        // Get instructor
        // dd(auth('instructor')->user()); 
        
        if(!$checkLogin){
            session()->flash('error', 'Email or password is not correct!');
            return redirect()->to('/login');
        }

        session()->flash('success', 'Logged in successfully!');
        return redirect()->to('instructors');
    }

    public function logout(){
        if(auth('instructor')->check()){
            auth('instructor')->logout();
        }

        session()->flash('success', 'Logged out successfully!');
        return redirect()->to('login');
    }
}
