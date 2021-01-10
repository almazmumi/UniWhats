<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


Route::get('/', 'HomeController@index')->name("home");

Auth::routes();
Route::get('logout', function ()
{
    Auth::logout();
    Session()->flush();

    return redirect()->route("home");

})->name('logout');

Route::get('/login', 'AuthController@signin')->name('login');
Route::resource("groups", "GroupController");
Route::resource("comments", "CommentController");

Route::get('/callback', 'AuthController@callback');
Route::post('/getCourses/{dept}', 'CoursesController@getCourses');




Route::resource('feedback', "FeedbackController");
Route::get('/feedback', function(){
    return view('feedback');
})->name("feedback");
