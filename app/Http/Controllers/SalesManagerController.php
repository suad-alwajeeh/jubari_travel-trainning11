<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TicketService;
use App\BusService;
use App\CarService;
use App\GeneralService;
use App\HotelService;
use App\MedicalService;
use App\VisaService;


class SalesManagerController extends Controller
{
    public function display(){
       
       // return view('displaySalesManager');
         
         $affected = TicketService::select('id','ticket_status','remark','employees.emp_first_name','employees.emp_last_name')
         ->join('employees','employees.emp_id','=','due_to_customer')->paginate(7);
         $affected1 = BusService::select('id','bus_status','remark','employees.emp_first_name','employees.emp_last_name')
         ->join('employees','employees.emp_id','=','due_to_customer')->paginate(7);
         $affected2 = HotelService::select('hotel_id','hotel_status','remark','employees.emp_first_name','employees.emp_last_name')
         ->join('employees','employees.emp_id','=','due_to_customer')->paginate(7);
         $affected3 = VisaService::select('id','visa_status','remark','employees.emp_first_name','employees.emp_last_name')
         ->join('employees','employees.emp_id','=','due_to_customer')->paginate(7);
         $affected4 = CarService::select('id','car_status','remark','employees.emp_first_name','employees.emp_last_name')
         ->join('employees','employees.emp_id','=','due_to_customer')->paginate(7);
         $affected5 = MedicalService::select('id','medical_status','remark','employees.emp_first_name','employees.emp_last_name')
         ->join('employees','employees.emp_id','=','due_to_customer')->paginate(7);
         $affected6 = GeneralService::select('id','general_status','remark','employees.emp_first_name','employees.emp_last_name')
         ->join('employees','employees.emp_id','=','due_to_customer')->paginate(7);
         $affected0=TicketService::where('deleted',0);
         return view('displaySalesManager',['data'=>$affected ,'data1'=>$affected1 ,'data2'=>$affected2 ,'data3'=>$affected3 ,'data4'=>$affected4 ,'data5'=>$affected5 ,'data6'=>$affected0]);
    }
}
