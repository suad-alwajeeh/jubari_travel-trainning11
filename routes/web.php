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
/**************
 * suad routs
 ************* */

Route::get('/airline_add', 'AirlineController@add');
Route::get('/airline_edit/{id}', 'AirlineController@display_row');
Route::get('/airline_delete/{id}', 'AirlineController@hide_row');
Route::get('/airline_display', 'AirlineController@display');
Route::post('/addairline','AirlineController@save1');
Route::post('/editairline','AirlineController@edit_row');
Route::get('/dashboard',function(){

    return view('dashboard');
    });

/**************
 * end suad routs
 ************* */
Route::get('/', function () {
    return view('welcome');
});
Route::get('/addEmployee',function(){

return view('add_emp');
});
Route::resource('employees', 'EmployeesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
