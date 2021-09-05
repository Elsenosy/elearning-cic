<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return "Hello world";
});

Route::get('/test', function(){
    return "This is a test page";
});

// Route::get('/blade', function(){
//     return view('elearning');
// });

Route::get('/blade', 'HomeController@index');

Route::get('/users/{id?}', function($id=null){
    // Get all request queries
    $allQueries = request()->query();
    dump($allQueries);
    dump(request()->id);
    dump(request()->is('users'));
    dump("ID is: ".$id);

    dump(request()->has('desc'));
});

Route::get('instructors', 'InstructorController@index');
Route::get('instructors/create', 'InstructorController@create');
Route::post('instructors', 'InstructorController@store');