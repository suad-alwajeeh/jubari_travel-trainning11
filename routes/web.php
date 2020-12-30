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
Route::group(['middleware' => ['auth','role:admin|sale_manager|sale_executive|accountant']], function() {
  Route::get('/logout','Auth\LoginController@logout');
});
 Route::group(['middleware' => ['auth','role:admin']], function() {
 Route::get('/','dashboard@index');
 Route::get('/remark','dashboard@remark');
Route::get('/dashboard/addBusRemark','dashboard@addBusRemark');
Route::get('/dashboard/addTicketRemark','dashboard@addTicketRemark');
Route::get('/dashboard/addCarRemark','dashboard@addCarRemark');
Route::get('/dashboard/addHotelRemark','dashboard@addHotelRemark');
Route::get('/dashboard/addVisaRemark','dashboard@addVisaRemark');
Route::get('/dashboard/addMedRemark','dashboard@addMedRemark');
Route::get('/dashboard/addGenRemark','dashboard@addGenRemark');
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
Route::get('/adds_user_display', 'AddsController@adds_user_display');
Route::get('/adds_user_display_row/{id}', 'AddsController@adds_user_display_row');
Route::get('/adds_user_display_u/{id}', 'AddsController@adds_user_display_u');
Route::get('/ok/{id}', 'AddsController@ok');
Route::get('/cansel/{id}', 'AddsController@cansel');
Route::post('/addadds','AddsController@save1');
Route::post('/editadds','AddsController@edit_row');
/*****************users************** */
Route::get('/user_add', 'uuserController@add');
Route::get('/user_edit/{id}', 'uuserController@display_row');
Route::get('/user_edit/{id}', 'uuserController@display_row');
Route::get('/user_profile/{id}', 'uuserController@user_profile');
Route::get('/is_active_user/{id}', 'uuserController@is_active');
Route::get('/no_active_user/{id}', 'uuserController@is_not_active');
Route::get('/user_display/{id}', 'uuserController@filter');
Route::get('/employee_dept/{id}', 'uuserController@employee_dept');
Route::get('/employee_data/{id}', 'uuserController@employee_data');
Route::get('/user_display', 'uuserController@display');
Route::get('/user_display/{id}', 'uuserController@filter');
Route::post('/adduser','uuserController@save17');
Route::post('/edituser','uuserController@edit_row');
/*****************users************** */
/*****************ROLE************** */
Route::get('/role_add', 'RoleController@add');
Route::get('/role_edit/{id}', 'RoleController@display_row');
Route::get('/role_delete/{id}', 'RoleController@hide_row');
Route::get('/is_active/{id}', 'RoleController@is_active');
Route::get('/no_active/{id}', 'RoleController@is_not_active');
Route::get('/role_display', 'RoleController@display');
Route::get('/role_user_display', 'RoleController@display_role_user');
Route::get('/role_user_display1/{id}', 'RoleController@display_role_user1');
Route::get('/user_role_delete/{u_id}/{r_id}', 'RoleController@role_user_hide_row');
Route::get('/add_role_user', 'RoleController@add_role_user');
Route::post('/addrole','RoleController@save1');
Route::post('/addroleuser','RoleController@save_user_role');
Route::post('/editrole','RoleController@edit_row');

//employees
Route::get('employees', 'EmployeeController@index');
Route::get('employees/active', 'EmployeeController@Activate');
Route::get('/employees/insert', 'EmployeeController@insert');
Route::post('/employees/saved', 'EmployeeController@saved');
Route::get('/employees/employee_delete/{id}','EmployeeController@hide_row');
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

Route::get('/service_test','ServiceController@index');
Route::get('/service/insert', 'ServiceController@insert');
Route::get('/service/saved', 'ServiceController@saved');
Route::get('/service/service_delete/{id}','ServiceController@hide_row');
Route::get('/service/service-edit/{id}','ServiceController@display_row');
Route::get('/service/editservice/','ServiceController@edit_row');
Route::get('/service/sales/','ServiceController@show');
Route::post('/service/add_ticket/','TicketServiceController@add_ticket');
Route::get('/service/update_ticket/{id}','TicketServiceController@update_ticket');
Route::get('/service/update_bus/{id}','BusServiceController@update_bus');
Route::get('/service/update_car/{id}','CarServiceController@update_car');
Route::get('/service/update_hotel/{id}','HotelServiceController@update_hotel');
Route::get('/service/update_visa/{id}','VisaServiceController@update_visa');
Route::get('/service/update_med/{id}','MedicalServiceController@update_med');
Route::get('/service/update_gen/{id}','GeneralServiceController@update_gen');
Route::post('/service/updateTicket','TicketServiceController@updateTicket');
Route::post('/service/updateBus','BusServiceController@updateBus');
Route::post('/service/updateCar','CarServiceController@updateCar');
Route::post('/service/updateHotel','HotelServiceController@updateHotel');
Route::post('/service/updateVisa','VisaServiceController@updateVisa');
Route::post('/service/updateMed','MedicalServiceController@updateMed');
Route::post('/service/updateGen','GeneralServiceController@updateGen');
Route::get('/service/update_ticketAttachment/{id}','TicketServiceController@ticketAttachment');
Route::post('/service/add_bus/','BusServiceController@add_bus');
Route::post('/service/add_hotel/','HotelServiceController@add_hotel');
Route::post('/service/add_car/','CarServiceController@add_car');
Route::post('/service/add_visa/','ServiceController@add_visa');
Route::post('/service/add_service/','ServiceController@add_service');
Route::post('/service/add_medical/','MedicalServiceController@add_medical');
Route::get('/service/sales_repo','ServiceController@show_repo');
Route::get('/service/ticket','TicketServiceController@ticket');
Route::get('/service/bus','BusServiceController@bus');
Route::get('/service/car','CarServiceController@car');
Route::get('/service/visa','VisaServiceController@visa');
Route::get('/service/medical','MedicalServiceController@medical');
Route::get('/service/hotel','HotelServiceController@hotel');
Route::get('/service/general','GeneralServiceController@general');
Route::get('/service/show_ticket/{id}','TicketServiceController@show_ticket');
Route::get('/service/show_bus/{id}','BusServiceController@show_bus');
Route::get('/service/show_hotel/{id}','HotelServiceController@show_hotel');
Route::get('/service/show_car/{id}','CarServiceController@show_car');
Route::get('/service/show_visa/{id}','VisaServiceController@show_visa');
Route::get('/service/show_medical/{id}','MedicalServiceController@show_med');
Route::get('/service/show_general/{id}','GeneralServiceController@show_gen');
Route::get('/service/ticket_delete/{id}','TicketServiceController@hide_ticket');
Route::get('/service/bus_delete/{id}','BusServiceController@hide_bus');
Route::get('/service/hotel_delete/{id}','HotelServiceController@hide_hotel');
Route::get('/service/car_delete/{id}','CarServiceController@hide_car');
Route::get('/service/visa_delete/{id}','VisaServiceController@hide_visa');
Route::get('/service/med_delete/{id}','MedicalServiceController@hide_med');
Route::get('/service/gen_delete/{id}','GeneralServiceController@hide_gen');
Route::get('/service/ticket_send/{id}','TicketServiceController@send_ticket');
Route::get('/service/bus_send/{id}','BusServiceController@send_bus');
Route::get('/service/send_visa/{id}','VisaServiceController@send_visa');
Route::get('/service/send_car/{id}','CarServiceController@send_car');
Route::get('/service/send_hotel/{id}','HotelServiceController@send_hotel');
Route::get('/service/send_gen/{id}','GeneralServiceController@send_gen');
Route::get('/service/send_med/{id}','MedicalServiceController@send_med');
//show remark admin

//ti send or delete multi  row in table service
Route::post('/deleteallticket','TicketServiceController@deleteAllticket');
Route::post('/sendallticket','TicketServiceController@sendallticket');
Route::post('/deleteallbus','BusServiceController@deleteAllbus');
Route::post('/sendallbus','BusServiceController@sendAllbus');
Route::post('/deleteallcar','CarServiceController@deleteAllcar');
Route::post('/sendallcar','CarServiceController@sendallcar');
Route::post('/deleteallhotel','HotelServiceController@deleteallhotel');
Route::post('/sendallhotel','HotelServiceController@sendallhotel');
Route::post('/deleteallvisa','VisaServiceController@deleteallvisa');
Route::post('/sendallvisa','VisaServiceController@sendallvisa');
Route::post('/deleteallmed','MedicalServiceController@deleteallmed');
Route::post('/sendallmed','MedicalServiceController@sendallmed');
Route::post('/deleteallgen','GeneralServiceController@deleteallgen');
Route::post('/sendallgen','GeneralServiceController@sendallgen');

//Supplier


Route::get('/airline/airline_row','AirlineController@show_row');
Route::get('/suplier/suplier_row','SupplierController@show_row');
Route::get('/addSupplier', 'SupplierController@add');
Route::get('/displaySupplier', 'SupplierController@display');
Route::get('/editSupplier/{id}', 'SupplierController@display_row');
Route::get('/deleteSupplier/{id}', 'SupplierController@hide_row');
Route::post('/add_supplier','SupplierController@save1');
Route::post('/edit_supplier','SupplierController@edit_row');
Route::get('/is_active_supplier/{id}', 'SupplierController@is_active');
Route::get('/no_active_supplier/{id}', 'SupplierController@is_not_active');
Route::get('/displaySupplier/{id}', 'SupplierController@filter');

//

// Sales Manager
Route::get('/displaySalesManager', 'SalesManagerController@display');
//

Route::get('/form',function(){

  return view('form');
  });

 Route::group(['middleware' => ['auth','role:accountant']], function() {
  Route::get('/accountant','accountantController@accountant_view');
  Route::get('/accountant_ticket','accountantController@accountant_ticket');
  
});
Route::group(['middleware' => ['auth','role:sale_manager']], function() {

});
Route::group(['middleware' => ['auth','role:sale_executive']], function() {
  Route::post('/service/add_ticket/','ServiceController@add_ticket');
  Route::get('/service/update_ticket/{id}','ServiceController@update_ticket');
  Route::get('/service/update_bus/{id}','ServiceController@update_bus');
  Route::get('/service/update_car/{id}','ServiceController@update_car');
  Route::get('/service/update_hotel/{id}','ServiceController@update_hotel');
  Route::get('/service/update_visa/{id}','ServiceController@update_visa');
  Route::get('/service/update_med/{id}','ServiceController@update_med');
  Route::get('/service/update_gen/{id}','ServiceController@update_gen');
  Route::post('/service/updateTicket','ServiceController@updateTicket');
  Route::post('/service/updateBus','ServiceController@updateBus');
  Route::post('/service/updateCar','ServiceController@updateCar');
  Route::post('/service/updateHotel','ServiceController@updateHotel');
  Route::post('/service/updateVisa','ServiceController@updateVisa');
  Route::post('/service/updateMed','ServiceController@updateMed');
  Route::post('/service/updateGen','ServiceController@updateGen');
  Route::get('/service/update_ticketAttachment/{id}','ServiceController@ticketAttachment');
  Route::post('/service/add_bus/','ServiceController@add_bus');
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
  //for show remark
  Route::get('/show_remark','ServiceController@show_remark');
  
});

 });
