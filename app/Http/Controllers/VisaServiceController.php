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

class VisaServiceController extends Controller
{
    //

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

        public function show_visa($id)
        {
         $data['visa']=VisaService::join('suppliers','suppliers.s_no','=','visa_services.due_to_supp')
         ->join('currency','currency.cur_id','=','visa_services.cur_id')
         ->where(['visa_services.service_status'=>$id,'visa_services.deleted'=>0])->paginate(10);
        return view('show_visa',$data);
        } 

        public function update_visa($id){
            $data['airline']=Airline::where('is_active',1)->get();
            $data['suplier']=Supplier::where('is_active',1)->get();
            $data['emp']=Employee::where('is_active',1)->get();
            $data['visas']=VisaService::join('currency','currency.cur_id','=','visa_services.cur_id')->where('visa_id',$id)->get();
           
              return view('update_visa',$data);
          } 

          public function visa(){
            $data['airline']=Airline::where('is_active',1)->get();
            $data['suplier']=Supplier::where(['is_active'=>1,'is_deleted'=>0])->get();
            $data['emp']=Employee::where('is_active',1)->get();
           
              return view('add_visa',$data);
          } 
          public function updateVisa( Request $req)
          { 
              $visa=new VisaService;
          
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
          
                 $visa::where('visa_id',$req->id)
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
                $visa::where('visa_id',$req->id)
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

            
public function add_visa( Request $req)
{ 
    $visa=new VisaService;
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    $visa_id= vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    $visa->visa_id=$visa_id; 
    $loged_id=  Auth::user()->id ;
    if( $loged_id==$req->due_to_customer )
    {
      $visa->user_id= $loged_id;
      $visa->user_status=0;

    }
    else{
      $visa->user_id= $loged_id;
      $visa->user_status=1;
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
       $visa->attachment=$img;
    }
    else{
      $visa->attachment='null';
    }
    $visa->Issue_date =$req->Issue_date;
    $visa->refernce=$req->refernce;
    $visa->passenger_name=$req->passenger_name;
    $visa->voucher_number=$req->visa_number;
    $visa->visa_status =$req->visa_status;
    $visa->visa_type =$req->visa_type;
    $visa->visa_info =$req->visa_info;
    $visa->country  =$req->country ;
    $visa->due_to_supp =$req->due_to_supp;
    $visa->provider_cost=$req->provider_cost;
    $visa->cur_id=$req->cur_id;
    $visa->due_to_customer =$req->due_to_customer ;
    $visa->cost =$req->cost ;
    $visa->service_id=4;
    $visa->passnger_currency=$req->passnger_currency;
    $visa->remark=$req->remark;
    $visa->service_status=1;
    $visa->save();
    return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
}
public function deleteAllvisa(Request $request){
  $ids = $request->input('ids');
  $dbs = VisaService::where('visa_id',$ids)
  ->update(['deleted'=>1]);
  return back();
}
public function sendAllvisa(Request $request){
$ids = $request->input('ids');
$where=['visa_id'=>$ids];
  $where +=['attachment'=>'null'];
  $affected1=VisaService::where($where)->count();
  if($affected1 >0)
 { 
  return back()->with('error','Seccess Data Not send');

}
else{
 
  $dbs = VisaService::where('visa_id',$ids)->update(['service_status'=>2]);

  return back()->with('seccess','Seccess Data Delete');
 
}
}
}
