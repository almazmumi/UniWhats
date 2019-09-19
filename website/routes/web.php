<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });




Auth::routes();

Route::prefix('auth') -> group(function(){
    Route::get('init', 'AppController@init');
    Route::post('login', 'AppController@login');
    Route::post('register', 'AppController@register');
    Route::post('logout', 'AppController@logout');
    Route::post('login', 'AppController@login');

});


// Route to handle page reload in Vue except for api routes
// Route::get('/{any?}', function (){return view('spa');})->where('any', '^(?!api\/)[\/\w\.-]*');


Route::get('/{any}', 'SpaController@index')->where('any', '.*');
