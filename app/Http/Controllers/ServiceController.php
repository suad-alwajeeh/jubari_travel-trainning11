<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service;
use App\airline;
use App\Suplier;
use App\Employee;
use App\TicketService;

class ServiceController extends Controller
{
    //
    public function index()
    {
        
 if(isset($_GET['id']) && ($_GET['id']==0 || $_GET['id']==1) )
       { 
        $del=0;
        $where=['services.is_active'=>$_GET['id']];
        $where +=['services.deleted'=>0];
        $where +=['employees.is_active'=>1];
       
        $data['service']=Service::join('employees', 'employees.emp_id', '=', 'services.emp_id_how_create')
        ->where($where)->get();
        return json_encode($data);}
    
        else if(isset($_GET['id']) && $_GET['id']==2 )
       { 
       
        //$where=['departments.is_active'=>1];
       
        $data['service']=Service::join('employees', 'employees.emp_id', '=', 'services.emp_id_how_create')
        ->where('employees.is_active',1)->get();
        return json_encode($data);}
    
        
        else{
            $where=['employees.is_active'=>1];

              $where +=['services.deleted'=>0];
           
            $data['service']=Service::join('employees','employees.emp_id', '=', 'services.emp_id_how_create')
            ->where($where)->get();
            return view('service',$data);
        }

    
    
    }

    public function insert(Request $request)
    {

     if($request->is_active==1)
     {
          $active=1;
     }
     else
     $active=0;
   

      $ser=new Service;
      $ser->ser_name=$request->ser_name;
      $ser->discrption=$request->discrption;
      $ser->is_active=$active;
    
      echo $ser->save();
      //return $dept->getall();
     return redirect('service')->with('seccess','Seccess Data Insert');
    
    }

public function edit_row(Request $req){
    $ser=new Service;
    $active;
    if($req->is_active==1)
    {
         $active=1;
    }
    else
    $active=0;
echo $req->ser_name;
    $ser::where('ser_id',$req->id)
    ->update(['ser_name'=>$req->ser_name,'discrption'=>$req->discrption,
    'is_active'=>$active,
    ]);
    $data['service'] = Service::where('deleted',0)->paginate(7);
    return view('service',$data);
    
}
public function display_row($id)
{ 
    $data['service'] = Service::where('ser_id',$id)->get();
    return view('update_service',$data);
                }

    public function hide_row($id){
        echo $id;
        $affected1= Service::where('ser_id',$id)
        ->update(['deleted'=>1]);
        $data['service'] = Service::where('deleted',0)->paginate(7);
      // return response()->json(['status'=>'Delete Successfully']);
      return redirect('service')->with('seccess','Seccess Data Delete');

        }
        
public function show()
{ 
 $data['airline']=Airline::where('is_active',1)->get();
 $data['suplier']=Suplier::where('is_active',1)->get();
 $data['emp']=Employee::where('is_active',1)->get();

    return view('sales-service',$data);
                }



public function add_ticket( Request $req)
{ 
    $ticket=new TicketService;

    if(isset($req->Dep_city2))
    {
        $ticket->Dep_city2 =$req->Dep_city1;

    }
    else{
        $ticket->Dep_city2='';
    }
    if(isset($req->arr_city2))
    {
        $ticket->arr_city2 =$req->arr_city1;

    }
    else{
        $ticket->arr_city2='';
    }

    

    if(isset($req->dep_date2))
    {
        $ticket->dep_date2 =$req->dep_date2;
        $ticket->bursher_time =$req->bursher_time;

    }
    else{
        $ticket->dep_date2='';
    }

    $ticket->Issue_date =$req->Issue_date;
    $ticket->refernce=$req->refernce;
    $ticket->passenger_name=$req->passenger_name;
    $ticket->airline_id =$req->airline;
    $ticket->ticket=$req->ticket;
    $ticket->ticket_number =$req->ticket_number;
    $ticket->ticket_status =$req->ticket_status;
    $ticket->Dep_city =$req->Dep_city1;
    $ticket->arr_city =$req->arr_city;
    $ticket->dep_date =$req->dep_date;
    $ticket->due_to_supp =$req->due_to_supp;
    $ticket->provider_cost=$req->provider_cost;
    $ticket->cur_id=$req->cur_id;
    $ticket->due_to_customer =$req->due_to_customer ;
    $ticket->cost =$req->cost ;
    $ticket->service_id=1;
    $ticket->passnger_currency=$req->passnger_currency;
    $ticket->remark=$req->remark;
    $ticket->service_status=1;
    $ticket->save();
    return redirect('/service/service_sales')->with('seccess','Seccess Data Insert');
}




public function add_bus( Request $req)
{ 
    $ticket=new BusService;
    $ticket->Issue_date =$req->Issue_date;
    $ticket->refernce=$req->refernce;
    $ticket->passenger_name=$req->passenger_name;
    $ticket->bus_number =$req->bus_number;
    $ticket->bus_name =$req->bus_name;
    $ticket->bus_status =$req->bus_status;
    $ticket->Dep_city =$req->Dep_city;
    $ticket->arr_city =$req->arr_city;
    $ticket->dep_date =$req->dep_date;
    $ticket->due_to_supp =$req->due_to_supp;
    $ticket->provider_cost=$req->provider_cost;
    $ticket->cur_id=$req->cur_id;
    $ticket->due_to_customer =$req->due_to_customer ;
    $ticket->cost =$req->cost ;
    $ticket->service_id=2;
    $ticket->passnger_currency=$req->passnger_currency;
    $ticket->remark=$req->remark;
    $ticket->service_status=1;
    $ticket->save();
    return redirect('/service/service_sales')->with('seccess','Seccess Data Insert');
}
}
