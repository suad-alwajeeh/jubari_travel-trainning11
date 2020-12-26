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

class TicketServiceController extends Controller
{
    public function show_ticket($id)
{
 $data['ticket']=TicketService::join('suppliers','suppliers.s_no','=','ticket_services.due_to_supp')
 ->join('currency','currency.cur_id','=','ticket_services.cur_id')
 ->where(['ticket_services.service_status'=>$id,'ticket_services.deleted'=>0])->paginate(10);
return view('show_ticket',$data);


} 
public function hide_ticket($id){
    echo $id;
    $affected1= TicketService::where('ids',$id)
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

        public function ticket(){
            $data['airline']=Airline::where('is_active',1)->get();
            $data['suplier']=Supplier::where(['is_active'=>1,'is_deleted'=>0])->get();
            $data['emp']=Employee::where('is_active',1)->get();
           
              return view('add_ticket',$data);
          } 
          public function update_ticket($id){
            $data['airline']=Airline::where('is_active',1)->get();
            $data['suplier']=Supplier::where('is_active',1)->get();
            $data['emp']=Employee::where('is_active',1)->get();
            $data['tickets']=TicketService::join('currency','currency.cur_id','=','ticket_services.cur_id')->where('id',$id)->get();
           
              return view('update_ticket',$data);
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


public function deleteAllticket(Request $request){
    $ids = $request->input('ids');
    $dbs = TicketService::where('id',$ids)
    ->update(['deleted'=>1]);
    return back();
}
public function sendAllticket(Request $request){
  $ids = $request->input('ids');
  $where=['id'=>$ids];
    $where +=['attachment'=>'null'];
    $affected1=TicketService::where($where)->count();
    if($affected1 >0)
   { 
    return back()->with('error','Seccess Data Not send');

 }
  else{
   
    $dbs = TicketService::where('id',$ids)->update(['service_status'=>2]);

    return back()->with('seccess','Seccess Data Delete');
   
 }
}
}
