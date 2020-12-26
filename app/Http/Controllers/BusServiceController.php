<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service;
use App\airline;
use App\Supplier;
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
class BusServiceController extends Controller
{
    //

    public function show_bus($id)
    {
     $data['bus']=BusService::join('suppliers','suppliers.s_no','=','bus_services.due_to_supp')
     ->join('currency','currency.cur_id','=','bus_services.cur_id')
     ->where(['bus_services.service_status'=>$id,'bus_services.deleted'=>0])->paginate(10);
    return view('show_bus',$data);
    } 
    public function bus(){
        $data['airline']=Airline::where('is_active',1)->get();
        $data['suplier']=Supplier::where(['is_active'=>1,'is_deleted'=>0])->get();
        $data['emp']=Employee::where('is_active',1)->get();
       
          return view('add_bus',$data);
      } 

      
public function add_bus( Request $req)
{ 

   $bus=new BusService;
   $data = random_bytes(16);
   $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
   $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
   $bus_id2= vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));

    $loged_id=  Auth::user()->id ;
    if( $loged_id==$req->due_to_customer )
    {
      $bus->user_id= $loged_id;
      $bus->user_status=0;

    }
    else{
      $bus->user_id= $loged_id;
      $bus->user_status=1;
    }
    if($req->hasfile('attachment'))
    {
       $attchmentFile =$req->file('attachment') ;
       $num=count($attchmentFile);
      for($i=0;$i<$num;$i++){
         $ext=$attchmentFile[$i]->getClientOriginalExtension();
       $attchmentName =rand(123456,999999).".".$ext;
       $attchment=$attchmentFile[$i]->move('img/user_attchment/',$attchmentName);
       //$bus->attachment=$attchmentName;
       $bus->attachment .=$attchmentName.',';
   
       }
    //$bus->attachment =$attachment;

    }
    else{
      $bus->attachment='null';
    }
    $bus->Issue_date =$req->Issue_date;
    $bus->refernce=$req->refernce;
    $bus->passenger_name=$req->passenger_name;
    $bus->bus_name =$req->bus_name;
    $bus->bus_number =$req->bus_number;
    $bus->bus_status =$req->bus_status;
    $bus->Dep_city =$req->Dep_city;
    $bus->arr_city =$req->arr_city;
    $bus->dep_date =$req->dep_date;
    $bus->due_to_supp =$req->due_to_supp;
    $bus->provider_cost=$req->provider_cost;
    $bus->cur_id=$req->cur_id;
    $bus->due_to_customer =$req->due_to_customer ;
    $bus->cost =$req->cost ;
    $bus->service_id=2;
    $bus->passnger_currency=$req->passnger_currency;
    $bus->remark=$req->remark;
    $bus->service_status=1;
    $bus->bus_id=$bus_id2;
    $bus->save();
    return back()->with('seccess','Seccess Data Insert');
}
public function updateBus( Request $req)
{ 
    $bus=new BusService;

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

       $bus::where('bus_id',$req->id)
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
      $bus::where('bus_id',$req->id)
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


    public function update_Bus($id){
        $data['airline']=Airline::where('is_active',1)->get();
        $data['suplier']=Supplier::where('is_active',1)->get();
        $data['emp']=Employee::where('is_active',1)->get();
        $data['buss']=BusService::join('currency','currency.cur_id','=','bus_services.cur_id')->where('bus_id',$id)->get();
       
          return view('update_bus',$data);
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

    public function hide_bus($id){
        echo $id;
        $affected1= BusService::where('bus_id',$id)
        ->update(['deleted'=>1]);
     
        return back()->with('seccess','Seccess Data Delete');
    
        }
        public function deleteAllbus(Request $request){
          $ids = $request->input('ids');
          $dbs = BusService::where('bus_id',$ids)
          ->update(['deleted'=>1]);
          return back();
      }
      public function sendAllbus(Request $request){
        $ids = $request->input('ids');
        $where=['bus_id'=>$ids];
          $where +=['attachment'=>'null'];
          $affected1=BusService::where($where)->count();
          if($affected1 >0)
         { 
          return back()->with('error','Seccess Data Not send');
      
       }
        else{
         
          $dbs = BusService::where('bus_id',$ids)->update(['service_status'=>2]);
    
          return back()->with('seccess','Seccess Data Delete');
         
       }
    }
}
