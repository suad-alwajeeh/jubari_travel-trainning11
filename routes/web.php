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
<<<<<<< HEAD
/*****************AIRLINE************** */
=======
Route::get('employees', 'EmployeeController@index');


>>>>>>> c92bfd59ebfb6f9e33a86a951b93206d6ba7f89e
Route::get('/airline_add', 'AirlineController@add');
Route::get('/airline_edit/{id}', 'AirlineController@display_row');
Route::get('/airline_delete/{id}', 'AirlineController@hide_row');
Route::get('/airline_display', 'AirlineController@display');
Route::post('/addairline','AirlineController@save1');
Route::post('/editairline','AirlineController@edit_row');
<<<<<<< HEAD
/*****************Adds************** */
Route::get('/adds_add', 'AddsController@add');
Route::get('/adds_edit/{id}', 'AddsController@display_row');
Route::get('/adds_delete/{id}', 'AddsController@hide_row');
Route::get('/is_active_adds/{id}', 'AddsController@is_active');
Route::get('/no_active_adds/{id}', 'AddsController@is_not_active');
Route::get('/adds_display', 'AddsController@display');
Route::post('/addadds','AddsController@save1');
Route::post('/editadds','AddsController@edit_row');
/*****************ROLE************** */
Route::get('/role_add', 'RoleController@add');
Route::get('/role_edit/{id}', 'RoleController@display_row');
Route::get('/role_delete/{id}', 'RoleController@hide_row');
Route::get('/is_active/{id}', 'RoleController@is_active');
Route::get('/no_active/{id}', 'RoleController@is_not_active');
Route::get('/role_display', 'RoleController@display');
Route::post('/addrole','RoleController@save1');
Route::post('/editrole','RoleController@edit_row');
=======
Route::get('department', 'DepartmentController@index');
Route::get('/department/insert', 'DepartmentController@insert');
Route::get('/department/saved', 'DepartmentController@saved');
Route::get('department/department-edit/{id}','DepartmentController@department_edit');
Route::get('/department/department-delete/{id}', 'DepartmentController@hide_row');
Route::get('department/department-edit/{id}', 'DepartmentController@display_row');
Route::get('department/editdepartment','DepartmentController@edit_row');

>>>>>>> c92bfd59ebfb6f9e33a86a951b93206d6ba7f89e

Route::get('/dashboard',function(){

    return view('dashboard');
    });

/**************
 * end suad routs
 ************* */
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
