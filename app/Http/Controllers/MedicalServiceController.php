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

class MedicalServiceController extends Controller
{
    //



    
public function show_med($id)
{
                 
  $_SESSION['id']=1;
 $data['med']=MedicalService::join('suppliers','suppliers.s_no','=','medical_services.due_to_supp')
 ->join('currency','currency.cur_id','=','medical_services.cur_id')
 ->where(['medical_services.service_status'=>$id,'medical_services.deleted'=>0,'medical_services.due_to_customer'=> $_SESSION['id']])->paginate(10);
 return view('show_med',$data);
} 


public function update_med($id){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Supplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
    $data['meds']=MedicalService::join('currency','currency.cur_id','=','medical_services.cur_id')->where('med_id',$id)->get();
   
      return view('update_med',$data);
  } 

  public function hide_med($id){
    echo $id;
    $affected1=MedicalService::where('med_id',$id)
    ->update(['deleted'=>1]);
    return back()->with('seccess','Seccess Data Delete');
  }
  public function medical(){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Supplier::where(['is_active'=>1,'is_deleted'=>0])->get();
    $data['emp']=Employee::where('is_active',1)->get();
   
      return view('add_medical',$data);
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

public function add_Medical( Request $req)
{ 
    $medical=new MedicalService;
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    $med_id= vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    $medical->med_id=$med_id; 
    $loged_id=  Auth::user()->id ;
    if( $loged_id==$req->due_to_customer )
    {
      $medical->user_id= $loged_id;
      $medical->user_status=0;

    }
    else{
      $medical->user_id= $loged_id;
      $medical->user_status=1;
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
       $medical->attachment=$img;
    }
    else{
      $medical->attachment='null';
    }
    $medical->Issue_date =$req->Issue_date;
    $medical->refernce=$req->refernce;
    $medical->passenger_name=$req->passenger_name;
    $medical->document_number=$req->document_number;
    $medical->med_info=$req->med_info;
    $medical->report_status=$req->report_status;
    $medical->from_city=$req->from_city;
    $medical->due_to_supp =$req->due_to_supp;
    $medical->provider_cost=$req->provider_cost;
    $medical->cur_id=$req->cur_id;
    $medical->due_to_customer =$req->due_to_customer ;
    $medical->cost =$req->cost ;
    $medical->service_id=6;
    $medical->passnger_currency=$req->passnger_currency;
    $medical->remark=$req->remark;
    $medical->service_status=1;
    $medical->save();
    return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
}


public function updateMed( Request $req)
{ 
    $medical=new MedicalService;

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

       $medical::where('med_id',$req->id)
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
      $medical::where('med_id',$req->id)
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

  public function deleteAllmed(Request $request){
    $ids = $request->input('ids');
    $dbs = MedicalService::where('bus_id',$ids)
    ->update(['deleted'=>1]);
    return back();
}
public function sendAllmed(Request $request){
  $ids = $request->input('ids');
  $where=['med_id'=>$ids];
    $where +=['attachment'=>'null'];
    $affected1=MedicalService::where($where)->count();
    if($affected1 >0)
   { 
    return back()->with('error','Seccess Data Not send');

 }
  else{
   
    $dbs = MedicalService::where('med_id',$ids)->update(['service_status'=>2]);

    return back()->with('seccess','Seccess Data Delete');
   
 }
}
}
