<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $pageTitle = "Elearning page";

        return view('elearning', compact('pageTitle'));
    }
}
