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
use App\User;
use App\users;
use Auth;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    //
    public function __construct()
    {

    }

    public function deleteAllticket(Request $request){
      $ids = $request->get('ids');
      $dbs = DB::update('update  ticket_services  SET deleted="1" where id in ('.implode(",",$ids).')');
      return back();
    }
    public function sendAllticket(Request $request){
      $ids = $request->get('ids');
      $dbs = DB::update('update  ticket_services  SET service_status="2" where attachment!="null" && id in ('.implode(",",$ids).')');
      return back();
    }
    public function deleteAllbus(Request $request){
      $ids = $request->get('ids');
      $dbs = DB::update('update  bus_services  SET deleted="1" where bus_id in ('.implode(",",$ids).')');
    
      return back();
  }
  public function sendAllbus(Request $request){
    $ids = $request->get('ids');
    $dbs = DB::update('update  bus_services  SET service_status="2" where attachment!="null" && bus_id in ('.implode(",",$ids).')');
    return back();
}
  public function deleteAllcar(Request $request){
    $ids = $request->get('ids');
    $dbs = DB::update('update  car_services  SET deleted="1" where car_id in ('.implode(",",$ids).')');
    return back();
} 
public function sendAllcar(Request $request){
  $ids = $request->get('ids');
  $dbs = DB::update('update  car_services  SET service_status="2" where attachment!="null" && car_id in ('.implode(",",$ids).')');
  return back();
}
public function deleteAllvisa(Request $request){
  $ids = $request->get('ids');
  $dbs = DB::update('update  visa_services  SET deleted="1" where visa_id in ('.implode(",",$ids).')');
  return back();
}
public function sendAllvisa(Request $request){
  $ids = $request->get('ids');
  $dbs = DB::update('update  visa_services  SET service_status="2" where attachment!="null" && visa_id in ('.implode(",",$ids).')');
  return back();
}
public function deleteAllhotel(Request $request){
  $ids = $request->get('ids');
  $dbs = DB::update('update  hotel_services  SET deleted="1" where hotel_id in ('.implode(",",$ids).')');
  return back();
}
public function sendAllhotel(Request $request){
  $ids = $request->get('ids');
  $dbs = DB::update('update  hotel_services  SET service_status="2" where attachment!="null" && hotel_id in ('.implode(",",$ids).')');
  return back();
}
public function deleteAllgen(Request $request){
  $ids = $request->get('ids');
  $dbs = DB::update('update  general_services  SET deleted="1" where gen_id in ('.implode(",",$ids).')');
  return back();
}
public function sendAllmed(Request $request){
  $ids = $request->get('ids');
  $dbs = DB::update('update  medical_services  SET service_status="2" where attachment!="null" && med_id in ('.implode(",",$ids).')');
  return back();
}
public function deleteAllmed(Request $request){
  $ids = $request->get('ids');
  $dbs = DB::update('update  medical_services  SET deleted="1" where med_id in ('.implode(",",$ids).')');
  return back();
}
public function sendallgen(Request $request){
  $ids = $request->get('ids');
  $dbs = DB::update('update  general_services  SET service_status="2" where attachment!="null" && gen_id in ('.implode(",",$ids).')');
  return back();
}
    public function index()
    {
        
 if(isset($_GET['id']) && ($_GET['id']==0 || $_GET['id']==1) )
       { 
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
            return view('services',$data);
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
      return redirect('service_test')->with('seccess','Seccess Data Delete');

        }
  
        
public function show()
{ 
 $data['airline']=Airline::where('is_active',1)->get();
 $data['suplier']=Suplier::where('is_active',1)->get();
 $data['emp']=Employee::where('is_active',1)->get();

    return view('sales-service',$data);
                }
public function show_ticket($id)
{
 $data['ticket']=TicketService::join('supliers','supliers.sup_id','=','ticket_services.due_to_supp')
 ->join('currency','currency.cur_id','=','ticket_services.cur_id')
 ->where(['ticket_services.service_status'=>$id,'ticket_services.deleted'=>0])->paginate(10);
return view('show_ticket',$data);


} 
public function show_bus($id)
{
 $data['bus']=BusService::join('supliers','supliers.sup_id','=','bus_services.due_to_supp')
 ->join('currency','currency.cur_id','=','bus_services.cur_id')
 ->where(['bus_services.service_status'=>$id,'bus_services.deleted'=>0])->paginate(10);
return view('show_bus',$data);
} 
public function show_hotel($id)
{
 $data['hotel']=HotelService::join('supliers','supliers.sup_id','=','hotel_services.due_to_supp')
 ->join('currency','currency.cur_id','=','hotel_services.cur_id')
 ->where(['hotel_services.service_status'=>$id,'hotel_services.deleted'=>0])->paginate(10);
return view('show_hotel',$data);
}

public function show_visa($id)
{
 $data['visa']=VisaService::join('supliers','supliers.sup_id','=','visa_services.due_to_supp')
 ->join('currency','currency.cur_id','=','visa_services.cur_id')
 ->where(['visa_services.service_status'=>$id,'visa_services.deleted'=>0])->paginate(10);
return view('show_visa',$data);
} 

public function show_car($id)
{
 $data['car']=CarService::join('supliers','supliers.sup_id','=','car_services.due_to_supp')
 ->join('currency','currency.cur_id','=','car_services.cur_id')
 ->where(['car_services.service_status'=>$id,'car_services.deleted'=>0])->paginate(10);
return view('show_car',$data);
} 

public function show_med($id)
{
                 
  $_SESSION['id']=1;
 $data['med']=MedicalService::join('supliers','supliers.sup_id','=','medical_services.due_to_supp')
 ->join('currency','currency.cur_id','=','medical_services.cur_id')
 ->where(['medical_services.service_status'=>$id,'medical_services.deleted'=>0,'medical_services.due_to_customer'=> $_SESSION['id']])->paginate(10);
 return view('show_med',$data);
} 
public function show_gen($id)
{
 $data['gen']=GeneralService::join('supliers','supliers.sup_id','=','general_services.due_to_supp')
 ->join('currency','currency.cur_id','=','general_services.cur_id')
 ->where(['general_services.service_status'=>$id,'general_services.deleted'=>0])->paginate(10);
return view('show_gen',$data);
} 
public function hide_ticket($id){
    echo $id;
    $affected1= TicketService::where('id',$id)
    ->update(['deleted'=>1]);
  
 return back()->with('seccess','Seccess Data Delete');

    }

    public function send_ticket($id){
        echo $id;
        $where=['id'=>$id];

        $where +=['attachment'=>'null'];
        $affected1=TicketService::where($where)->count();
        if($affected1 >0)
       { 
       
     //return redirect('service')->with('Erroe','Seccess Data Delete');
     json_encode('noorder');
    // print_r(json_encode($x));
     }
      else{
        $affected= TicketService::where(['id'=>$id])
        ->update(['service_status'=>2]);
     return back()->with('Status','Seccess Data Delete');
       
     }
        }

    public function hide_bus($id){
        echo $id;
        $affected1= BusService::where('bus_id',$id)
        ->update(['deleted'=>1]);
     
        return back()->with('seccess','Seccess Data Delete');
    
        }
        public function send_bus($id){
            echo $id;
            $where=['bus_id'=>$id];
    
            $where +=['attachment'=>'null'];
            $affected1=BusService::where($where)->count();
            if($affected1 >0)
           { 
           
         //return redirect('service')->with('Erroe','Seccess Data Delete');
         json_encode('noorder');
        // print_r(json_encode($x));
         }
          else{
            $affected= BusService::where(['bus_id'=>$id])
            ->update(['service_status'=>2]);
            return back()->with('seccess','Seccess Data Delete');
           
         }
            }
            public function send_visa($id){
              echo $id;
              $where=['visa_id'=>$id];
      
              $where +=['attachment'=>'null'];
              $affected1=VisaService::where($where)->count();
              if($affected1 >0)
             { 
             
           //return redirect('service')->with('Erroe','Seccess Data Delete');
           json_encode('noorder');
          // print_r(json_encode($x));
           }
            else{
              $affected= VisaService::where(['visa_id'=>$id])
              ->update(['service_status'=>2]);
              return back()->with('seccess','Seccess Data Delete');
             
           }
              }
        public function hide_hotel($id){
            echo $id;
            $affected1=HotelService::where('hotel_id',$id)
            ->update(['deleted'=>1]);
            return back()->with('seccess','Seccess Data Delete');

            }
            public function send_hotel($id){
                echo $id;
                $where=['hotel_id'=>$id];
        
                $where +=['attachment'=>'null'];
                $affected1=HotelService::where($where)->count();
                if($affected1 >0)
               { 
                json_encode('noorder');
             }
              else{
                $affected= HotelService::where(['hotel_id'=>$id])
                ->update(['service_status'=>2]);
                return back()->with('seccess','Seccess Data Delete');
              }
                }
            public function hide_car($id){
                echo $id;
                $affected1=CarService::where('car_id',$id)
                ->update(['deleted'=>1]);
                return back()->with('seccess','Seccess Data Delete');
              }
             public function send_car($id){
                echo $id;
                $where=['car_id'=>$id];
        
                $where +=['attachment'=>'null'];
                $affected1=CarService::where($where)->count();
                if($affected1 >0)
               { 
                           json_encode('noorder');
             }
              else{
                $affected= CarService::where(['car_id'=>$id])
                ->update(['service_status'=>2]);
                return back()->with('seccess','Seccess Data Delete');
               
             }
                }
                public function hide_visa($id){
                    echo $id;
                    $affected1=VisaService::where('visa_id',$id)
                    ->update(['deleted'=>1]);
                    return back()->with('seccess','Seccess Data Delete');
                  }
                    public function hide_med($id){
                        echo $id;
                        $affected1=MedicalService::where('med_id',$id)
                        ->update(['deleted'=>1]);
                        return back()->with('seccess','Seccess Data Delete');
                      }
                        public function send_med($id){
                            echo $id;
                            $where=['med_id'=>$id];
                    
                            $where +=['attachment'=>'null'];
                            $affected1=MedicalService::where($where)->count();
                            if($affected1 >0)
                           { 
                              json_encode('noorder');
                         }
                          else{
                            $affected= MedicalService::where(['med_id'=>$id])
                            ->update(['service_status'=>2]);
                            return back()->with('seccess','Seccess Data Delete');
                           
                         }
                            }
                        public function hide_gen($id){
                            echo $id;
                            $affected1=GeneralService::where('gen_id',$id)
                            ->update(['deleted'=>1]);
                            return back()->with('seccess','Seccess Data Delete');
                        
                            }
                            public function send_gen($id){
                                echo $id;
                                $where=['gen_id'=>$id];
                        
                                $where +=['attachment'=>'null'];
                                $affected1=GeneralService::where($where)->count();
                                if($affected1 >0)
                               { 
                               
                             json_encode('noorder');
                             }
                              else{
                                $affected= GeneralService::where(['gen_id'=>$id])
                                ->update(['service_status'=>2]);
                                return back()->with('seccess','Seccess Data Delete');
                               
                             }
                                }
 public function show_repo()
                { 
                    $_SESSION['id']=1;
                    //get data of ticket service
                 $data['save_ticket']=TicketService::join('employees','employees.emp_id', '=','ticket_services.due_to_customer')
                ->where(['ticket_services.service_status'=>1,'ticket_services.due_to_customer'=> $_SESSION['id'],'ticket_services.deleted'=>0])->count();;
                $data['sent_ticket']=TicketService::join('employees','employees.emp_id', '=','ticket_services.due_to_customer')
                ->where(['ticket_services.service_status'=>2,'ticket_services.due_to_customer'=> $_SESSION['id'],'ticket_services.deleted'=>0])->count();;
                $data['archev_ticket']=TicketService::join('employees','employees.emp_id', '=','ticket_services.due_to_customer')
                ->where(['ticket_services.service_status'=>4,'ticket_services.due_to_customer'=> $_SESSION['id'],'ticket_services.deleted'=>0])->count();;
                 
                //get data of bus service
                $data['save_bus']=BusService::join('employees','employees.emp_id', '=','bus_services.due_to_customer')
                ->where(['bus_services.service_status'=>1,'bus_services.due_to_customer'=> $_SESSION['id'],'bus_services.deleted'=>0])->count();;
                $data['sent_bus']=BusService::join('employees','employees.emp_id', '=','bus_services.due_to_customer')
                ->where(['bus_services.service_status'=>2,'bus_services.due_to_customer'=> $_SESSION['id'],'bus_services.deleted'=>0])->count();;
                $data['archev_bus']=BusService::join('employees','employees.emp_id', '=','bus_services.due_to_customer')
                ->where(['bus_services.service_status'=>4,'bus_services.due_to_customer'=> $_SESSION['id'],'bus_services.deleted'=>0])->count();;
                 
                 //get data of hotelservice
                 $data['save_hotel']=HotelService::join('employees','employees.emp_id', '=','hotel_services.due_to_customer')
                 ->where(['hotel_services.service_status'=>1,'hotel_services.due_to_customer'=> $_SESSION['id'],'hotel_services.deleted'=>0])->count();;
                 $data['sent_hotel']=HotelService::join('employees','employees.emp_id', '=','hotel_services.due_to_customer')
                 ->where(['hotel_services.service_status'=>2,'hotel_services.due_to_customer'=> $_SESSION['id'],'hotel_services.deleted'=>0])->count();;
                 $data['archev_hotel']=HotelService::join('employees','employees.emp_id', '=','hotel_services.due_to_customer')
                 ->where(['hotel_services.service_status'=>4,'hotel_services.due_to_customer'=> $_SESSION['id'],'hotel_services.deleted'=>0])->count();;
                  
                 //get data of visa service
                 $data['save_visa']=VisaService::join('employees','employees.emp_id', '=','visa_services.due_to_customer')
                 ->where(['visa_services.service_status'=>1,'visa_services.due_to_customer'=> $_SESSION['id'],'visa_services.deleted'=>0])->count();;
                 $data['sent_visa']=VisaService::join('employees','employees.emp_id', '=','visa_services.due_to_customer')
                 ->where(['visa_services.service_status'=>2,'visa_services.due_to_customer'=> $_SESSION['id'],'visa_services.deleted'=>0])->count();;
                 $data['archev_visa']=VisaService::join('employees','employees.emp_id', '=','visa_services.due_to_customer')
                 ->where(['visa_services.service_status'=>4,'visa_services.due_to_customer'=> $_SESSION['id'],'visa_services.deleted'=>0])->count();;
                  
                 //get data of car service
                 $data['save_car']=CarService::join('employees','employees.emp_id', '=','car_services.due_to_customer')
                 ->where(['car_services.service_status'=>1,'car_services.due_to_customer'=> $_SESSION['id'],'car_services.deleted'=>0])->count();;
                 $data['sent_car']=CarService::join('employees','employees.emp_id', '=','car_services.due_to_customer')
                 ->where(['car_services.service_status'=>2,'car_services.due_to_customer'=> $_SESSION['id'],'car_services.deleted'=>0])->count();;
                 $data['archev_car']=CarService::join('employees','employees.emp_id', '=','car_services.due_to_customer')
                 ->where(['car_services.service_status'=>4,'car_services.due_to_customer'=> $_SESSION['id'],'car_services.deleted'=>0])->count();;
                  //get data of medical service
                  $data['save_med']=MedicalService::join('employees','employees.emp_id', '=','medical_services.due_to_customer')
                  ->where(['medical_services.service_status'=>1,'medical_services.due_to_customer'=> $_SESSION['id'],'medical_services.deleted'=>0])->count();;
                  $data['sent_med']=MedicalService::join('employees','employees.emp_id', '=','medical_services.due_to_customer')
                  ->where(['medical_services.service_status'=>2,'medical_services.due_to_customer'=> $_SESSION['id'],'medical_services.deleted'=>0])->count();;
                  $data['archev_med']=MedicalService::join('employees','employees.emp_id', '=','medical_services.due_to_customer')
                  ->where(['medical_services.service_status'=>4,'medical_services.due_to_customer'=> $_SESSION['id'],'medical_services.deleted'=>0])->count();;
                   
                   //get data of serviceservice
                   $data['save_service']=GeneralService::join('employees','employees.emp_id', '=','general_services.due_to_customer')
                   ->where(['general_services.service_status'=>1,'general_services.due_to_customer'=> $_SESSION['id'],'general_services.deleted'=>0])->count();;
                   $data['sent_service']=GeneralService::join('employees','employees.emp_id', '=','general_services.due_to_customer')
                   ->where(['general_services.service_status'=>2,'general_services.due_to_customer'=> $_SESSION['id'],'general_services.deleted'=>0])->count();;
                   $data['archev_service']=GeneralService::join('employees','employees.emp_id', '=','general_services.due_to_customer')
                   ->where(['general_services.service_status'=>4,'general_services.due_to_customer'=> $_SESSION['id'],'general_services.deleted'=>0])->count();;
                    
                    return view('sales-wedgate',$data);
   }


  public function ticket(){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Suplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
   
      return view('add_ticket',$data);
  } 
  public function update_ticket($id){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Suplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
    $data['tickets']=TicketService::join('currency','currency.cur_id','=','ticket_services.cur_id')->where('id',$id)->get();
   
      return view('update_ticket',$data);
  } 
  public function update_Bus($id){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Suplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
    $data['buss']=BusService::join('currency','currency.cur_id','=','bus_services.cur_id')->where('bus_id',$id)->get();
   
      return view('update_bus',$data);
  } 
  public function update_Hotel($id){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Suplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
    $data['hotels']=HotelService::join('currency','currency.cur_id','=','hotel_services.cur_id')->where('hotel_id',$id)->get();
   
      return view('update_hotel',$data);
  } 
  public function update_Car($id){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Suplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
    $data['cars']=CarService::join('currency','currency.cur_id','=','car_services.cur_id')->where('car_id',$id)->get();
   
      return view('update_car',$data);
  } 

  public function update_visa($id){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Suplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
    $data['visas']=VisaService::join('currency','currency.cur_id','=','visa_services.cur_id')->where('visa_id',$id)->get();
   
      return view('update_visa',$data);
  } 
  public function update_med($id){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Suplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
    $data['meds']=MedicalService::join('currency','currency.cur_id','=','medical_services.cur_id')->where('med_id',$id)->get();
   
      return view('update_med',$data);
  } 
  public function update_gen($id){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Suplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
    $data['gens']=GeneralService::join('currency','currency.cur_id','=','general_services.cur_id')->where('gen_id',$id)->get();
   
      return view('update_gen',$data);
  } 
  public function bus(){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Suplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
   
      return view('add_bus',$data);
  } 
  public function visa(){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Suplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
   
      return view('add_visa',$data);
  } 
  public function car(){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Suplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
   
      return view('add_car',$data);
  } 
  public function hotel(){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Suplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
   
      return view('add_hotel',$data);
  } 

  public function medical(){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Suplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
   
      return view('add_medical',$data);
  } 
  public function general(){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Suplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
   
      return view('add_general',$data);
  } 
public function add_ticket( Request $req)
{ 
    $ticket=new TicketService;
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    $tick_id= vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    $ticket->id=$tick_id; 
    $loged_id=  Auth::user()->id ;
    if( $loged_id==$req->due_to_customer )
    {
      $ticket->user_id= $loged_id;
      $ticket->user_status=0;

    }
    else{
      $ticket->user_id= $loged_id;
      $ticket->user_status=1;
    }
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
   
    if($req->hasfile('attachment'))
    {
       $attchmentFile =$req->file('attachment') ;
       $num=count($attchmentFile);
      for($i=0;$i<$num;$i++){
         $ext=$attchmentFile[$i]->getClientOriginalExtension();
       $attchmentName =rand(123456,999999).".".$ext;
       $attchment=$attchmentFile[$i]->move('img/user_attchment/',$attchmentName);
       //$ticket->attachment=$attchmentName;
       $ticket->attachment .=$attchmentName.',';
   
       }
    //$ticket->attachment =$attachment;

    }
    else{
      $ticket->attachment='null';
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
return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
}

public function updateTicket( Request $req)
{ 
    $ticket=new TicketService;
$dep_city2='';
$arr_city2='';
$img='';
$dp_date='';
$busher='';
    if(isset($req->Dep_city2))
    {
        $dep_city2 =$req->Dep_city1;

    }
    else{
        $dep_city2='';
    }
    if(isset($req->arr_city2))
    {
        $arr_city2 =$req->arr_city1;

    }
    else{
        $arr_city2='';
    }

    

    if(isset($req->dep_date2))
    {
        $dp_date =$req->dep_date2;
        $ticket->bursher_time =$req->bursher_time;

    }
    else{
        $dp_date='';
    }
    if(isset($req->bursher_time))
    {
        $busher =$req->dep_date2;

    }
    else{
        $busher='';
    }
   

    if($req->hasfile('attachment'))
    {
       $attchmentFile =$req->file('attachment') ;
       $num=count($attchmentFile);
      for($i=0;$i<$num;$i++){
         $ext=$attchmentFile[$i]->getClientOriginalExtension();
       $attchmentName =rand(123456,999999).".".$ext;
       $attchment=$attchmentFile[$i]->move('img/user_attchment/',$attchmentName);
       $img.=$attchmentName.',';
   
       }

       $ticket::where('id',$req->id)
       ->update(['Issue_date'=>$req->Issue_date,
       'refernce'=>$req->refernce,'passenger_name'=>$req->passenger_name,'airline_id'=>$req->airline,
       'ticket'=>$req->ticket,'ticket_status'=>$req->ticket_status,
       'ticket_number'=>$req->ticket_number,'Dep_city'=>$req->Dep_city1,'arr_city'=>$req->arr_city,'dep_date'=>$req->dep_date,
      'due_to_supp'=>$req->due_to_supp,'provider_cost'=>$req->provider_cost,'cur_id'=>$req->cur_id,'due_to_customer'=>$req->due_to_customer,
      'cost'=>$req->cost,'service_id'=>1,'passnger_currency'=>$req->passnger_currency,'remark'=>$req->remark,'service_status'=>1,
      'attachment'=>$img ,'Dep_city2'=>$dep_city2,'arr_city2'=>$arr_city2,'dep_date2'=>$dp_date,'bursher_time'=>$busher

       ]); 

    }
    else{
      $ticket::where('id',$req->id)
      ->update(['Issue_date'=>$req->Issue_date,
      'refernce'=>$req->refernce,'passenger_name'=>$req->passenger_name,'airline_id'=>$req->airline,
      'ticket'=>$req->ticket,'ticket_status'=>$req->ticket_status,
      'ticket_number'=>$req->ticket_number,'Dep_city'=>$req->Dep_city1,'arr_city'=>$req->arr_city,'dep_date'=>$req->dep_date,
     'due_to_supp'=>$req->due_to_supp,'provider_cost'=>$req->provider_cost,'cur_id'=>$req->cur_id,'due_to_customer'=>$req->due_to_customer,
     'cost'=>$req->cost,'service_id'=>1,'passnger_currency'=>$req->passnger_currency,'remark'=>$req->remark,'service_status'=>1,
     'Dep_city2'=>$dep_city2,'arr_city2'=>$arr_city2,'dep_date2'=>$dp_date,'bursher_time'=>$busher

      ]); 
    }
return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
}

public function add_bus( Request $req)
{ 

   $ticket=new BusService;
   $data = random_bytes(16);
   $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
   $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
   $bus_id2= vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));

    $loged_id=  Auth::user()->id ;
    if( $loged_id==$req->due_to_customer )
    {
      $ticket->user_id= $loged_id;
      $ticket->user_status=0;

    }
    else{
      $ticket->user_id= $loged_id;
      $ticket->user_status=1;
    }
    if($req->hasfile('attachment'))
    {
       $attchmentFile =$req->file('attachment') ;
       $num=count($attchmentFile);
      for($i=0;$i<$num;$i++){
         $ext=$attchmentFile[$i]->getClientOriginalExtension();
       $attchmentName =rand(123456,999999).".".$ext;
       $attchment=$attchmentFile[$i]->move('img/user_attchment/',$attchmentName);
       //$ticket->attachment=$attchmentName;
       $ticket->attachment .=$attchmentName.',';
   
       }
    //$ticket->attachment =$attachment;

    }
    else{
      $ticket->attachment='null';
    }
    $ticket->Issue_date =$req->Issue_date;
    $ticket->refernce=$req->refernce;
    $ticket->passenger_name=$req->passenger_name;
    $ticket->bus_name =$req->bus_name;
    $ticket->bus_number =$req->bus_number;
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
    $ticket->bus_id=$bus_id2;
    $ticket->save();
    return back()->with('seccess','Seccess Data Insert');
}
public function updateBus( Request $req)
{ 
    $ticket=new BusService;

   $img='';

    if($req->hasfile('attachment'))
    {
       $attchmentFile =$req->file('attachment') ;
       $num=count($attchmentFile);
      for($i=0;$i<$num;$i++){
         $ext=$attchmentFile[$i]->getClientOriginalExtension();
       $attchmentName =rand(123456,999999).".".$ext;
       $attchment=$attchmentFile[$i]->move('img/user_attchment/',$attchmentName);
       $img.=$attchmentName.',';
   
       }

       $ticket::where('bus_id',$req->id)
       ->update(['Issue_date'=>$req->Issue_date,
       'refernce'=>$req->refernce,'passenger_name'=>$req->passenger_name,
       'bus_name'=>$req->bus_name,'bus_status'=>$req->bus_status,
       'bus_number'=>$req->bus_number,'Dep_city'=>$req->Dep_city1,'arr_city'=>$req->arr_city,'dep_date'=>$req->dep_date,
      'due_to_supp'=>$req->due_to_supp,'provider_cost'=>$req->provider_cost,'cur_id'=>$req->cur_id,'due_to_customer'=>$req->due_to_customer,
      'cost'=>$req->cost,'service_id'=>2,'passnger_currency'=>$req->passnger_currency,'remark'=>$req->remark,'service_status'=>1,
      'attachment'=>$img 

       ]); 

    }
    else{
      $ticket::where('bus_id',$req->id)
       ->update(['Issue_date'=>$req->Issue_date,
       'refernce'=>$req->refernce,'passenger_name'=>$req->passenger_name,
       'bus_name'=>$req->bus_name,'bus_status'=>$req->bus_status,
       'bus_number'=>$req->bus_number,'Dep_city'=>$req->Dep_city1,'arr_city'=>$req->arr_city,'dep_date'=>$req->dep_date,
      'due_to_supp'=>$req->due_to_supp,'provider_cost'=>$req->provider_cost,'cur_id'=>$req->cur_id,'due_to_customer'=>$req->due_to_customer,
      'cost'=>$req->cost,'service_id'=>2,'passnger_currency'=>$req->passnger_currency,'remark'=>$req->remark,'service_status'=>1

       ]); 
    }
    return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
  }


public function updateHotel( Request $req)
{ 
    $ticket=new HotelService;

   $img='';

    if($req->hasfile('attachment'))
    {
       $attchmentFile =$req->file('attachment') ;
       $num=count($attchmentFile);
      for($i=0;$i<$num;$i++){
         $ext=$attchmentFile[$i]->getClientOriginalExtension();
       $attchmentName =rand(123456,999999).".".$ext;
       $attchment=$attchmentFile[$i]->move('img/user_attchment/',$attchmentName);
       $img.=$attchmentName.',';
   
       }

       $ticket::where('hotel_id',$req->id)
       ->update(['Issue_date'=>$req->Issue_date,
       'refernce'=>$req->refernce,'passenger_name'=>$req->passenger_name,
       'hotel_status'=>$req->hotel_status,
       'voucher_number'=>$req->voucher_number,'country'=>$req->country,'city'=>$req->city,'hotel_name'=>$req->hotel_name,
       'check_in'=>$req->check_in,'check_out'=>$req->check_out,
      'due_to_supp'=>$req->due_to_supp,'provider_cost'=>$req->provider_cost,'cur_id'=>$req->cur_id,'due_to_customer'=>$req->due_to_customer,
      'cost'=>$req->cost,'service_id'=>2,'passnger_currency'=>$req->passnger_currency,'remark'=>$req->remark,'service_status'=>1,
      'attachment'=>$img 

       ]); 

    }
    else{
      $ticket::where('hotel_id',$req->id)
       ->update(['Issue_date'=>$req->Issue_date,
       'refernce'=>$req->refernce,'passenger_name'=>$req->passenger_name,
       'hotel_status'=>$req->hotel_status,
       'voucher_number'=>$req->voucher_number,'country'=>$req->country,'city'=>$req->city,'hotel_name'=>$req->hotel_name,
       'check_in'=>$req->check_in,'check_out'=>$req->check_out,'due_to_supp'=>$req->due_to_supp,'provider_cost'=>$req->provider_cost,'cur_id'=>$req->cur_id,'due_to_customer'=>$req->due_to_customer,
      'cost'=>$req->cost,'service_id'=>2,'passnger_currency'=>$req->passnger_currency,'remark'=>$req->remark,'service_status'=>1

       ]); 
    }
    return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
  }

public function updateCar( Request $req)
{ 
    $ticket=new CarService;

   $img='';

    if($req->hasfile('attachment'))
    {
       $attchmentFile =$req->file('attachment') ;
       $num=count($attchmentFile);
      for($i=0;$i<$num;$i++){
         $ext=$attchmentFile[$i]->getClientOriginalExtension();
       $attchmentName =rand(123456,999999).".".$ext;
       $attchment=$attchmentFile[$i]->move('img/user_attchment/',$attchmentName);
       $img.=$attchmentName.',';
   
       }

       $ticket::where('car_id',$req->id)
       ->update(['Issue_date'=>$req->Issue_date,
       'refernce'=>$req->refernce,'passenger_name'=>$req->passenger_name,
       'car_status'=>$req->car_status,'car_info'=>$req->car_info,
       'voucher_number'=>$req->voucher_number,'Dep_city'=>$req->Dep_city1,'arr_city'=>$req->arr_city,'dep_date'=>$req->dep_date,
      'due_to_supp'=>$req->due_to_supp,'provider_cost'=>$req->provider_cost,'cur_id'=>$req->cur_id,'due_to_customer'=>$req->due_to_customer,
      'cost'=>$req->cost,'service_id'=>2,'passnger_currency'=>$req->passnger_currency,'remark'=>$req->remark,'service_status'=>1,
      'attachment'=>$img 

       ]); 

    }
    else{
      $ticket::where('car_id',$req->id)
       ->update(['Issue_date'=>$req->Issue_date,
       'refernce'=>$req->refernce,'passenger_name'=>$req->passenger_name,
       'car_status'=>$req->car_status,'car_info'=>$req->car_info,
       'voucher_number'=>$req->voucher_number,'Dep_city'=>$req->Dep_city1,'arr_city'=>$req->arr_city,'dep_date'=>$req->dep_date,
      'due_to_supp'=>$req->due_to_supp,'provider_cost'=>$req->provider_cost,'cur_id'=>$req->cur_id,'due_to_customer'=>$req->due_to_customer,
      'cost'=>$req->cost,'service_id'=>2,'passnger_currency'=>$req->passnger_currency,'remark'=>$req->remark,'service_status'=>1

       ]); 
    }
    return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
  }

  public function updateGen( Request $req)
  { 
      $ticket=new GeneralService;
  
     $img='';
  
      if($req->hasfile('attachment'))
      {
         $attchmentFile =$req->file('attachment') ;
         $num=count($attchmentFile);
        for($i=0;$i<$num;$i++){
           $ext=$attchmentFile[$i]->getClientOriginalExtension();
         $attchmentName =rand(123456,999999).".".$ext;
         $attchment=$attchmentFile[$i]->move('img/user_attchment/',$attchmentName);
         $img.=$attchmentName.',';
     
         }
  
         $ticket::where('gen_id',$req->id)
         ->update(['Issue_date'=>$req->Issue_date,
         'refernce'=>$req->refernce,'passenger_name'=>$req->passenger_name,
         'offered_status'=>$req->offered_status,'gen_info'=>$req->gen_info,
         'voucher_number'=>$req->voucher_number,'general_status'=>$req->general_status ,
        'due_to_supp'=>$req->due_to_supp,'provider_cost'=>$req->provider_cost,'cur_id'=>$req->cur_id,'due_to_customer'=>$req->due_to_customer,
        'cost'=>$req->cost,'service_id'=>2,'passnger_currency'=>$req->passnger_currency,'remark'=>$req->remark,'service_status'=>1,
        'attachment'=>$img 
  
         ]); 
  
      }
      else{
        $ticket::where('gen_id',$req->id)
        ->update(['Issue_date'=>$req->Issue_date,
        'refernce'=>$req->refernce,'passenger_name'=>$req->passenger_name,
        'offered_status'=>$req->offered_status,'gen_info'=>$req->gen_info,
        'voucher_number'=>$req->voucher_number,'general_status'=>$req->general_status ,
       'due_to_supp'=>$req->due_to_supp,'provider_cost'=>$req->provider_cost,'cur_id'=>$req->cur_id,'due_to_customer'=>$req->due_to_customer,
       'cost'=>$req->cost,'service_id'=>2,'passnger_currency'=>$req->passnger_currency,'remark'=>$req->remark,'service_status'=>1
 
        ]); 
      }
      return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
    }
  
public function updateMed( Request $req)
{ 
    $ticket=new MedicalService;

   $img='';

    if($req->hasfile('attachment'))
    {
       $attchmentFile =$req->file('attachment') ;
       $num=count($attchmentFile);
      for($i=0;$i<$num;$i++){
         $ext=$attchmentFile[$i]->getClientOriginalExtension();
       $attchmentName =rand(123456,999999).".".$ext;
       $attchment=$attchmentFile[$i]->move('img/user_attchment/',$attchmentName);
       $img.=$attchmentName.',';
   
       }

       $ticket::where('med_id',$req->id)
       ->update(['Issue_date'=>$req->Issue_date,
       'refernce'=>$req->refernce,'passenger_name'=>$req->passenger_name,
       'report_status'=>$req->report_status,'med_info'=>$req->med_info,
       'document_number'=>$req->document_number,
      'due_to_supp'=>$req->due_to_supp,'provider_cost'=>$req->provider_cost,'cur_id'=>$req->cur_id,'due_to_customer'=>$req->due_to_customer,
      'cost'=>$req->cost,'service_id'=>2,'passnger_currency'=>$req->passnger_currency,'remark'=>$req->remark,'service_status'=>1,
      'attachment'=>$img 

       ]); 

    }
    else{
      $ticket::where('med_id',$req->id)
       ->update(['Issue_date'=>$req->Issue_date,
       'refernce'=>$req->refernce,'passenger_name'=>$req->passenger_name,
       'report_status'=>$req->report_status,'med_info'=>$req->med_info,
       'document_number'=>$req->document_number,
      'due_to_supp'=>$req->due_to_supp,'provider_cost'=>$req->provider_cost,'cur_id'=>$req->cur_id,'due_to_customer'=>$req->due_to_customer,
      'cost'=>$req->cost,'service_id'=>2,'passnger_currency'=>$req->passnger_currency,'remark'=>$req->remark,'service_status'=>1

       ]); 
    }
    return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
  }

public function updateVisa( Request $req)
{ 
    $ticket=new VisaService;

   $img='';

    if($req->hasfile('attachment'))
    {
       $attchmentFile =$req->file('attachment') ;
       $num=count($attchmentFile);
      for($i=0;$i<$num;$i++){
         $ext=$attchmentFile[$i]->getClientOriginalExtension();
       $attchmentName =rand(123456,999999).".".$ext;
       $attchment=$attchmentFile[$i]->move('img/user_attchment/',$attchmentName);
       $img.=$attchmentName.',';
   
       }

       $ticket::where('visa_id',$req->id)
       ->update(['Issue_date'=>$req->Issue_date,
       'refernce'=>$req->refernce,'passenger_name'=>$req->passenger_name,
       'visa_status'=>$req->visa_status,'visa_type'=>$req->visa_type,'country'=>$req->country,'visa_info'=>$req->visa_info,
       'voucher_number'=>$req->voucher_number,
      'due_to_supp'=>$req->due_to_supp,'provider_cost'=>$req->provider_cost,'cur_id'=>$req->cur_id,'due_to_customer'=>$req->due_to_customer,
      'cost'=>$req->cost,'service_id'=>2,'passnger_currency'=>$req->passnger_currency,'remark'=>$req->remark,'service_status'=>1,
      'attachment'=>$img 

       ]); 

    }
    else{
      $ticket::where('visa_id',$req->id)
       ->update(['Issue_date'=>$req->Issue_date,
       'refernce'=>$req->refernce,'passenger_name'=>$req->passenger_name,
       'visa_status'=>$req->visa_status,'visa_type'=>$req->visa_type,'country'=>$req->country,'visa_info'=>$req->visa_info,
       'voucher_number'=>$req->voucher_number,
      'due_to_supp'=>$req->due_to_supp,'provider_cost'=>$req->provider_cost,'cur_id'=>$req->cur_id,'due_to_customer'=>$req->due_to_customer,
      'cost'=>$req->cost,'service_id'=>2,'passnger_currency'=>$req->passnger_currency,'remark'=>$req->remark,'service_status'=>1

       ]); 
    }
    return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
  }
public function add_hotel( Request $req)
{ 
  print_r($_FILES['attachment']);
    $ticket=new HotelService;
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    $hotel_id= vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
 
    $loged_id=  Auth::user()->id ;
    if( $loged_id==$req->due_to_customer )
    {
      $ticket->user_id= $loged_id;
      $ticket->user_status=0;

    }
    else{
      $ticket->user_id= $loged_id;
      $ticket->user_status=1;
    }
    $img='';
    if($req->hasfile('attachment'))
    {
       $attchmentFile =$req->file('attachment') ;
       $num=count($attchmentFile);
      for($i=0;$i<$num;$i++){
         $ext=$attchmentFile[$i]->getClientOriginalExtension();
       $attchmentName =rand(123456,999999).".".$ext;
       $attchment=$attchmentFile[$i]->move('img/user_attchment/',$attchmentName);
       $ticket->attachment .=$attchmentName.',';
   
       }} else{
        $ticket->attachment='null';
      }

    $ticket->Issue_date =$req->Issue_date;
    $ticket->hotel_id=$hotel_id;
    $ticket->refernce=$req->refernce;
    $ticket->passenger_name=$req->passenger_name;
    $ticket->voucher_number=$req->voucher_number;
    $ticket->hotel_status =$req->hotel_status;
    $ticket->country =$req->country;
    $ticket->city =$req->city;
    $ticket->hotel_name =$req->hotel_name;
    $ticket->check_in =$req->check_in;
    $ticket->check_out =$req->check_out;
    $ticket->due_to_supp =$req->due_to_supp;
    $ticket->provider_cost=$req->provider_cost;
    $ticket->cur_id=$req->cur_id;
    $ticket->due_to_customer =$req->due_to_customer ;
    $ticket->cost =$req->cost ;
    $ticket->service_id=3;
    $ticket->passnger_currency=$req->passnger_currency;
    $ticket->remark=$req->remark;
    $ticket->service_status=1;
    $ticket->save();
    return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
}


public function add_visa( Request $req)
{ 
    $ticket=new VisaService;
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    $visa_id= vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    $ticket->visa_id=$visa_id; 
    $loged_id=  Auth::user()->id ;
    if( $loged_id==$req->due_to_customer )
    {
      $ticket->user_id= $loged_id;
      $ticket->user_status=0;

    }
    else{
      $ticket->user_id= $loged_id;
      $ticket->user_status=1;
    }
    $img='';
    if($req->hasfile('attachment'))
    {
       $attchmentFile =$req->file('attachment') ;
       $num=count($attchmentFile);
      for($i=0;$i<$num;$i++){
         $ext=$attchmentFile[$i]->getClientOriginalExtension();
       $attchmentName =rand(123456,999999).".".$ext;
       $attchment=$attchmentFile[$i]->move('img/user_attchment/',$attchmentName);
       $img.=$attchmentName.',';
   
       }
       $ticket->attachment=$img;
    }
    else{
      $ticket->attachment='null';
    }
    $ticket->Issue_date =$req->Issue_date;
    $ticket->refernce=$req->refernce;
    $ticket->passenger_name=$req->passenger_name;
    $ticket->voucher_number=$req->visa_number;
    $ticket->visa_status =$req->visa_status;
    $ticket->visa_type =$req->visa_type;
    $ticket->visa_info =$req->visa_info;
    $ticket->country  =$req->country ;
    $ticket->due_to_supp =$req->due_to_supp;
    $ticket->provider_cost=$req->provider_cost;
    $ticket->cur_id=$req->cur_id;
    $ticket->due_to_customer =$req->due_to_customer ;
    $ticket->cost =$req->cost ;
    $ticket->service_id=4;
    $ticket->passnger_currency=$req->passnger_currency;
    $ticket->remark=$req->remark;
    $ticket->service_status=1;
    $ticket->save();
    return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
}


public function add_car( Request $req)
{ 
    $ticket=new CarService;
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    $car_id= vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    $ticket->car_id=$car_id; 
    $loged_id=  Auth::user()->id ;
    if( $loged_id==$req->due_to_customer )
    {
      $ticket->user_id= $loged_id;
      $ticket->user_status=0;

    }
    else{
      $ticket->user_id= $loged_id;
      $ticket->user_status=1;
    }
    $img='';
    if($req->hasfile('attachment'))
    {
       $attchmentFile =$req->file('attachment') ;
       $num=count($attchmentFile);
      for($i=0;$i<$num;$i++){
         $ext=$attchmentFile[$i]->getClientOriginalExtension();
       $attchmentName =rand(123456,999999).".".$ext;
       $attchment=$attchmentFile[$i]->move('img/user_attchment/',$attchmentName);
       $img.=$attchmentName.',';
   
       }
       $ticket->attachment=$img;
    }
    else{
      $ticket->attachment='null';
    }
    $ticket->Issue_date =$req->Issue_date;
    $ticket->refernce=$req->refernce;
    $ticket->passenger_name=$req->passenger_name;
    $ticket->voucher_number =$req->voucher_number;
    $ticket->car_info =$req->car_info;
    $ticket->car_status =$req->car_status;
    $ticket->Dep_city =$req->Dep_city;
    $ticket->arr_city =$req->arr_city;
    $ticket->dep_date =$req->dep_date;
    $ticket->due_to_supp =$req->due_to_supp;
    $ticket->provider_cost=$req->provider_cost;
    $ticket->cur_id=$req->cur_id;
    $ticket->due_to_customer =$req->due_to_customer ;
    $ticket->cost =$req->cost ;
    $ticket->service_id=5;
    $ticket->passnger_currency=$req->passnger_currency;
    $ticket->remark=$req->remark;
    $ticket->service_status=1;
    $ticket->save();
    return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
}

public function add_service( Request $req)
{ 
    $ticket=new GeneralService;
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    $gen_id= vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    $ticket->gen_id=$gen_id; 
    $loged_id=  Auth::user()->id ;
    if( $loged_id==$req->due_to_customer )
    {
      $ticket->user_id= $loged_id;
      $ticket->user_status=0;

    }
    else{
      $ticket->user_id= $loged_id;
      $ticket->user_status=1;
    }

    $img='';
    if($req->hasfile('attachment'))
    {
       $attchmentFile =$req->file('attachment') ;
       $num=count($attchmentFile);
      for($i=0;$i<$num;$i++){
         $ext=$attchmentFile[$i]->getClientOriginalExtension();
       $attchmentName =rand(123456,999999).".".$ext;
       $attchment=$attchmentFile[$i]->move('img/user_attchment/',$attchmentName);
       $img.=$attchmentName.',';
   
       }
       $ticket->attachment=$img;
    }
    else{
      $ticket->attachment='null';
    }
    $ticket->Issue_date =$req->Issue_date;
    $ticket->refernce=$req->refernce;
    $ticket->passenger_name=$req->passenger_name;
    $ticket->voucher_number=$req->voucher_number;
    $ticket->gen_info =$req->med_info;
    $ticket->general_status =$req->general_status;
    $ticket->offered_status =$req->offered_status;
    $ticket->due_to_supp =$req->due_to_supp;
    $ticket->provider_cost=$req->provider_cost;
    $ticket->cur_id=$req->cur_id;
    $ticket->due_to_customer =$req->due_to_customer ;
    $ticket->cost =$req->cost ;
    $ticket->service_id=7;
    $ticket->passnger_currency=$req->passnger_currency;
    $ticket->remark=$req->remark;
    $ticket->busher_time=$req->busher_time;
    $ticket->service_status=1;
    $ticket->save();
    return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
}

public function add_Medical( Request $req)
{ 
    $ticket=new MedicalService;
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    $med_id= vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    $ticket->med_id=$med_id; 
    $loged_id=  Auth::user()->id ;
    if( $loged_id==$req->due_to_customer )
    {
      $ticket->user_id= $loged_id;
      $ticket->user_status=0;

    }
    else{
      $ticket->user_id= $loged_id;
      $ticket->user_status=1;
    }
    $img='';
    if($req->hasfile('attachment'))
    {
       $attchmentFile =$req->file('attachment') ;
       $num=count($attchmentFile);
      for($i=0;$i<$num;$i++){
         $ext=$attchmentFile[$i]->getClientOriginalExtension();
       $attchmentName =rand(123456,999999).".".$ext;
       $attchment=$attchmentFile[$i]->move('img/user_attchment/',$attchmentName);
       $img.=$attchmentName.',';
   
       }
       $ticket->attachment=$img;
    }
    else{
      $ticket->attachment='null';
    }
    $ticket->Issue_date =$req->Issue_date;
    $ticket->refernce=$req->refernce;
    $ticket->passenger_name=$req->passenger_name;
    $ticket->document_number=$req->document_number;
    $ticket->med_info=$req->med_info;
    $ticket->report_status=$req->report_status;
    $ticket->from_city=$req->from_city;
    $ticket->due_to_supp =$req->due_to_supp;
    $ticket->provider_cost=$req->provider_cost;
    $ticket->cur_id=$req->cur_id;
    $ticket->due_to_customer =$req->due_to_customer ;
    $ticket->cost =$req->cost ;
    $ticket->service_id=6;
    $ticket->passnger_currency=$req->passnger_currency;
    $ticket->remark=$req->remark;
    $ticket->service_status=1;
    $ticket->save();
    return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
}

}
