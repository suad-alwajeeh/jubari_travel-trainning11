<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service;
use App\airline;
use App\Suplier;
use App\Employee;
use App\TicketService;
use App\BusService;
use App\CarService;
use App\ServiceService;
use App\visaService;
use App\HotelService;
use App\MedicalService;
use App\GeneralService;
class accountantController extends Controller
{
    public function accountant_view()
    {
        return view('accountant_view');

    }
    public function accountant_ticket()
    {
        return view('accountant_ticket');

    }
}
