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
class HotelServiceController extends Controller
{
    //


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

            public function hotel(){
                $data['airline']=Airline::where('is_active',1)->get();
                $data['suplier']=Supplier::where(['is_active'=>1,'is_deleted'=>0])->get();
                $data['emp']=Employee::where('is_active',1)->get();
               
                  return view('add_hotel',$data);
              } 
            public function hide_visa($id){
                echo $id;
                $affected1=VisaService::where('visa_id',$id)
                ->update(['deleted'=>1]);
                return back()->with('seccess','Seccess Data Delete');
              }
   
              
              public function updateHotel( Request $req)
{ 
    $hotel=new HotelService;

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

       $hotel::where('hotel_id',$req->id)
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
      $hotel::where('hotel_id',$req->id)
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

  
public function add_hotel( Request $req)
{ 
  print_r($_FILES['attachment']);
    $hotel=new HotelService;
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    $hotel_id= vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
 
    $loged_id=  Auth::user()->id ;
    if( $loged_id==$req->due_to_customer )
    {
      $hotel->user_id= $loged_id;
      $hotel->user_status=0;

    }
    else{
      $hotel->user_id= $loged_id;
      $hotel->user_status=1;
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
       $hotel->attachment .=$attchmentName.',';
   
       }} else{
        $hotel->attachment='null';
      }

    $hotel->Issue_date =$req->Issue_date;
    $hotel->hotel_id=$hotel_id;
    $hotel->refernce=$req->refernce;
    $hotel->passenger_name=$req->passenger_name;
    $hotel->voucher_number=$req->voucher_number;
    $hotel->hotel_status =$req->hotel_status;
    $hotel->country =$req->country;
    $hotel->city =$req->city;
    $hotel->hotel_name =$req->hotel_name;
    $hotel->check_in =$req->check_in;
    $hotel->check_out =$req->check_out;
    $hotel->due_to_supp =$req->due_to_supp;
    $hotel->provider_cost=$req->provider_cost;
    $hotel->cur_id=$req->cur_id;
    $hotel->due_to_customer =$req->due_to_customer ;
    $hotel->cost =$req->cost ;
    $hotel->service_id=3;
    $hotel->passnger_currency=$req->passnger_currency;
    $hotel->remark=$req->remark;
    $hotel->service_status=1;
    $hotel->save();
    return redirect('/service/sales_repo')->with('seccess','Seccess Data Insert');
}

public function update_Hotel($id){
    $data['airline']=Airline::where('is_active',1)->get();
    $data['suplier']=Supplier::where('is_active',1)->get();
    $data['emp']=Employee::where('is_active',1)->get();
    $data['hotels']=HotelService::join('currency','currency.cur_id','=','hotel_services.cur_id')->where('hotel_id',$id)->get();
   
      return view('update_hotel',$data);
  } 
    public function show_hotel($id)
{
 $data['hotel']=HotelService::join('suppliers','suppliers.s_no','=','hotel_services.due_to_supp')
 ->join('currency','currency.cur_id','=','hotel_services.cur_id')
 ->where(['hotel_services.service_status'=>$id,'hotel_services.deleted'=>0])->paginate(10);
return view('show_hotel',$data);
}
public function deleteAllhotel(Request $request){
  $ids = $request->input('ids');
  $dbs = HotelService::where('hotel_id',$ids)
  ->update(['deleted'=>1]);
  return back();
}
public function sendAllhotel(Request $request){
$ids = $request->input('ids');
$where=['hotel_id'=>$ids];
  $where +=['attachment'=>'null'];
  $affected1=HotelService::where($where)->count();
  if($affected1 >0)
 { 
  return back()->with('error','Seccess Data Not send');

}
else{
 
  $dbs = HotelService::where('hotel_id',$ids)->update(['service_status'=>2]);

  return back()->with('seccess','Seccess Data Delete');
 
}
}
}
