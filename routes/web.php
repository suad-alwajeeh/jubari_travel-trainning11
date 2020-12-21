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

 /*****************AIRLINE************** */
 Auth::routes();
 Route::group(['middleware' => ['auth']], function() {
 Route::get('/logout','Auth\LoginController@logout');
 Route::get('/home', 'HomeController@index')->name('home');
 Route::get('/','dashboard@index');
Route::get('/airline_add', 'AirlineController@add');
Route::get('/airline_edit/{id}', 'AirlineController@display_row');
Route::get('/airline_delete/{id}', 'AirlineController@hide_row');
Route::get('/airline_display', 'AirlineController@display');
Route::post('/addairline','AirlineController@save1');
Route::post('/editairline','AirlineController@edit_row');
/*****************Adds************** */
Route::get('/adds_add', 'AddsController@add');
Route::get('/adds_edit/{id}', 'AddsController@display_row');
Route::get('/adds_user/{id}', 'AddsController@adds_user');
Route::get('/adds_user_delete/{id}', 'AddsController@hide_user_row');
Route::get('/adds_user_delete1/{id}/{user}', 'AddsController@delete_user_row1');
Route::get('/adds_user_add/{id}/{user}', 'AddsController@add_user_row');
Route::get('/adds_delete/{id}', 'AddsController@hide_row');
Route::get('/is_active_adds/{id}', 'AddsController@is_active');
Route::get('/no_active_adds/{id}', 'AddsController@is_not_active');
Route::get('/adds_display/{id}', 'AddsController@filter');
Route::get('/adds_display', 'AddsController@display');
Route::post('/addadds','AddsController@save1');
Route::post('/editadds','AddsController@edit_row');
/*****************users************** */
Route::post('/logout', 'LoginController@logout');
Route::get('/user_add', 'uuserController@add');
Route::get('/user_edit/{id}', 'uuserController@display_row');
Route::get('/user_delete/{id}', 'uuserController@hide_row');
Route::get('/is_active_user/{id}', 'uuserController@is_active');
Route::get('/no_active_user/{id}', 'uuserController@is_not_active');
Route::get('/user_display/{id}', 'uuserController@filter');
Route::get('/user_display', 'uuserController@display');
Route::post('/adduser','uuserController@save1');
Route::post('/edituser','uuserController@edit_row');
/*****************users************** */


/*****************ROLE************** */
Route::get('/role_add', 'RoleController@add');
Route::get('/role_edit/{id}', 'RoleController@display_row');
Route::get('/role_delete/{id}', 'RoleController@hide_row');
Route::get('/is_active/{id}', 'RoleController@is_active');
Route::get('/no_active/{id}', 'RoleController@is_not_active');
Route::get('/role_display', 'RoleController@display');
Route::post('/addrole','RoleController@save1');
Route::post('/editrole','RoleController@edit_row');

//employees
Route::get('employees', 'EmployeeController@index');
Route::get('/employees/insert', 'EmployeeController@insert');
Route::post('/employees/saved', 'EmployeeController@saved');
Route::get('/employees/employee_delete/{id}', 'EmployeeController@hide_row');
Route::get('employees/employee-edit/{id}', 'EmployeeController@display_row');
Route::get('/employees/employee-show/{id}','EmployeeController@show_row');
Route::post('employees/editemployee','EmployeeController@edit_row');
//department
Route::get('department', 'DepartmentController@index');
Route::get('/department/insert', 'DepartmentController@saved');
Route::get('department/department-edit/{id}','DepartmentController@department_edit');
Route::get('/department/department_delete/{id}', 'DepartmentController@hide_row');
Route::get('department/department-edit/{id}', 'DepartmentController@display_row');
Route::get('department/editdepartment','DepartmentController@edit_row');
Route::get('/is_active_dept/{id}', 'AddsController@is_active');
Route::get('/no_active_dept/{id}', 'AddsController@is_not_active');

Route::get('service', 'ServiceController@index');
Route::get('/service/insert', 'ServiceController@insert');
Route::get('/service/saved', 'ServiceController@saved');
Route::get('/service/service_delete/{id}','ServiceController@hide_row');
Route::get('/service/service-edit/{id}','ServiceController@display_row');
Route::get('/service/editservice/','ServiceController@edit_row');
Route::get('/service/sales/','ServiceController@show');
Route::post('/service/add_ticket/','ServiceController@add_ticket');
Route::post('/service/add_hotel/','ServiceController@add_hotel');
Route::post('/service/add_car/','ServiceController@add_car');
Route::post('/service/add_visa/','ServiceController@add_visa');
Route::post('/service/add_service/','ServiceController@add_service');
Route::post('/service/add_medical/','ServiceController@add_medical');
Route::get('/service/sales_repo','ServiceController@show_repo');
Route::get('/service/ticket','ServiceController@ticket');
Route::get('/service/bus','ServiceController@bus');
Route::get('/service/car','ServiceController@car');
Route::get('/service/visa','ServiceController@visa');
Route::get('/service/medical','ServiceController@medical');
Route::get('/service/hotel','ServiceController@hotel');
Route::get('/service/general','ServiceController@general');
Route::get('/service/show_ticket/{id}','ServiceController@show_ticket');
Route::get('/service/show_bus/{id}','ServiceController@show_bus');
Route::get('/service/show_hotel/{id}','ServiceController@show_hotel');
Route::get('/service/show_car/{id}','ServiceController@show_car');
Route::get('/service/show_visa/{id}','ServiceController@show_visa');
Route::get('/service/show_medical/{id}','ServiceController@show_med');
Route::get('/service/show_general/{id}','ServiceController@show_gen');
Route::get('/service/ticket_delete/{id}','ServiceController@hide_ticket');
Route::get('/service/bus_delete/{id}','ServiceController@hide_bus');
Route::get('/service/hotel_delete/{id}','ServiceController@hide_hotel');
Route::get('/service/car_delete/{id}','ServiceController@hide_car');
Route::get('/service/visa_delete/{id}','ServiceController@hide_visa');
Route::get('/service/med_delete/{id}','ServiceController@hide_med');
Route::get('/service/gen_delete/{id}','ServiceController@hide_gen');
Route::get('/service/ticket_send/{id}','ServiceController@send_ticket');
Route::get('/service/ticket_bus/{id}','ServiceController@send_bus');
Route::get('/service/ticket_visa/{id}','ServiceController@send_visa');
Route::get('/service/ticket_car/{id}','ServiceController@send_car');
Route::get('/service/ticket_hotel/{id}','ServiceController@send_hotel');
Route::get('/service/ticket_gen/{id}','ServiceController@send_gen');
Route::get('/service/ticket_med/{id}','ServiceController@send_med');



Route::get('/form',function(){

  return view('form');
  });

 });

 

