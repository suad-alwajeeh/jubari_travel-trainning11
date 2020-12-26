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
class GeneralServiceController extends Controller
{
    

    
public function show_gen($id)
{
 $data['gen']=GeneralService::join('suppliers','suppliers.s_no','=','general_services.due_to_supp')
 ->join('currency','currency.cur_id','=','general_services.cur_id')
 ->where(['general_services.service_status'=>$id,'general_services.deleted'=>0])->paginate(10);
return view('show_gen',$data);
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

        public function update_gen($id){
            $data['airline']=Airline::where('is_active',1)->get();
            $data['suplier']=Supplier::where('is_active',1)->get();
            $data['emp']=Employee::where('is_active',1)->get();
            $data['gens']=GeneralService::join('currency','currency.cur_id','=','general_services.cur_id')->where('gen_id',$id)->get();
           
              return view('update_gen',$data);
          } 


          public function general(){
            $data['airline']=Airline::where('is_active',1)->get();
            $data['suplier']=Supplier::where(['is_active'=>1,'is_deleted'=>0])->get();
            $data['emp']=Employee::where('is_active',1)->get();
           
              return view('add_general',$data);
          } 

          
public function add_service( Request $req)
{ 
    $general=new GeneralService;
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    $gen_id= vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    $general->gen_id=$gen_id; 
    $loged_id=  Auth::user()->id ;
    if( $loged_id==$req->due_to_customer )
    {
      $general->user_id= $loged_id;
      $general->user_status=0;

    }
    else{
      $general->user_id= $loged_id;
      $general->user_status=1;
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
       $general->attachment=$img;
    }
    else{
      $general->attachment='null';
    }
    $general->Issue_date =$req->Issue_date;
    $general->refernce=$req->refernce;
    $general->passenger_name=$req->passenger_name;
    $general->voucher_number=$req->voucher_number;
    $general->gen_info =$req->med_info;
    $general->general_status =$req->general_status;
    $general->offered_status =$req->offered_status;
    $general->due_to_supp =$req->due_to_supp;
    $general->provider_cost=$req->provider_cost;
    $general->cur_id=$req->cur_id;
    $general->due_to_customer =$req->due_to_customer ;
    $general->cost =$req->cost ;
    $general->service_id=7;
    $general->passnger_currency=$req->passnger_currency;
    $general->remark=$req->remark;
    $general->busher_time=$req->busher_time;
    $general->service_status=1;
    $general->save();
    return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
}


          public function updateGen( Request $req)
  { 
      $general=new GeneralService;
  
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
  
         $general::where('gen_id',$req->id)
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
        $general::where('gen_id',$req->id)
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
    public function deleteAllgen(Request $request){
      $ids = $request->input('ids');
      $dbs = GeneralService::where('gen_id',$ids)
      ->update(['deleted'=>1]);
      return back();
  }
  public function sendAllgen(Request $request){
    $ids = $request->input('ids');
    $where=['gen_id'=>$ids];
      $where +=['attachment'=>'null'];
      $affected1=GeneralService::where($where)->count();
      if($affected1 >0)
     { 
      return back()->with('error','Seccess Data Not send');
  
   }
    else{
     
      $dbs = GeneralService::where('gen_id',$ids)->update(['service_status'=>2]);

      return back()->with('seccess','Seccess Data Delete');
     
   }
}
}
