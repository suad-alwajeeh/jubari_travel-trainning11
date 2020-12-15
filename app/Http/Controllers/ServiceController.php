<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service;
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
       
        $data['service']=Service::join('employees','employees.emp_id','=','services.emp_id_how_create')
        ->where($where)->get();
        return json_encode($data);}
    
        else if(isset($_GET['id']) && $_GET['id']==2 )
       { 
       
        //$where=['departments.is_active'=>1];
       
        $data['service']=Service::join('employees','employees.emp_id','=','services.emp_id_how_create')
        ->where('employees.is_active',1)->get();
        return json_encode($data);}
    
        
        else{
            $where=['employees.is_active'=>1];

              $where +=['services.deleted'=>0];
           
            $data['service']=Service::join('employees', 'employees.emp_id', '=', 'services.emp_id_how_create')
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
}
