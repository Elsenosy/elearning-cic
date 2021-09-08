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

// Instructor routes
Route::group(['prefix' => 'instructors'], function(){
    $controller = "InstructorController@";

    // Route naming with middleware
    Route::get('/', $controller.'index')->name('instructors')->middleware('mine');
    Route::get('/create', $controller.'create')->name('instructors.create');
    Route::get('/{id}', $controller.'show')->name('instructors.show');
    Route::get('/{id}/edit', $controller.'edit')->name('instructors.edit');
    Route::post('/{id}/update', $controller.'update')->name('instructors.update');
    Route::post('/{id}/destroy', $controller.'destroy')->name('instructors.destroy');
    Route::post('/', $controller.'store')->name('instructors.store');
});

// Course routes
Route::get('courses', 'CourseController@index');
Route::get('courses/create', 'CourseController@create');
Route::post('courses', 'CourseController@store');
