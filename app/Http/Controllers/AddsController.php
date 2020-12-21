<?php

namespace App\Http\Controllers;
use App\adds;
use App\adds_user;
use App\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AddsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['role:admin']); 
    }
    public function index()
    {
    }
    public function display_row($id)
    { 
        $affected = adds::where('id',$id)->get();
        return view('adds_edit',['data'=>$affected]);
                    }
    public function adds_user($id)
                    { 
                        $affected = adds::where('id',$id)->get();
                        $affected1 = DB::table('adds')->where('adds_id',$id)
                        ->join('adds_users','adds.id','adds_users.adds_id')->where('adds_users.is_delete',0)
                        ->join('users','adds_users.user_id','users.id')
                        ->select('users.name as u_name','adds_users.id as au_id','adds.id as a_id')->get();
                        $affected2 = DB::table('users')->where('is_delete','0')->get();
                            return view('adds_user',['data'=>$affected,'data1'=>$affected1,'data2'=>$affected2]);
}
    public function display()
    {   $affected2 = DB::table('users')->where('is_delete','0')->get();
        $affected = adds::where('is_delete',0)->paginate(7);
        $affected1 = Department::where('is_active',1)->get();
        return view('adds_display',['data'=>$affected,'data1'=>$affected1,'data2'=>$affected2]);
        }
    public function add()
    {
        return view('adds_add');
    }
    public function save1(Request $req)
    {
     $req->validate([
        "adds_name"=>"required",
        "adds_text"=>"required",
        "adds_type"=>"required",
        "is_active"=>"required",
        ]);
      $role=new adds;
      $role->adds_name=$req->adds_name;
      $role->adds_text=$req->adds_text;
      $role->how_create_it=$req->how_create_it;
      $role->adds_type=$req->adds_type;
      $role->is_active=$req->is_active;
       $role->save();
      $affected = adds::where('is_delete',0)->paginate(7);
      return redirect('adds_display');
    }
    public function edit_row(Request $req){
        $req->validate([
            "adds_name"=>"required",
            "adds_text"=>"required",
            "adds_type"=>"required",
            "is_active"=>"required",
            ]);
        $role=new adds;
        $role::where('id',$req->id)
        ->update(['adds_name'=>$req->adds_name,'adds_type'=>$req->adds_type,
        'how_create_it'=>$req->how_create_it,'is_active'=>$req->is_active,'adds_text'=>$req->adds_text,
        ]);
        $affected = adds::where('is_delete',0)->paginate(7);
        return redirect('adds_display');
        
    }
    public function hide_row($id){
        $affected1= adds::where('id',$id)
        ->update(['is_delete'=>'1']);
        $affected = adds::where('is_delete',0)->paginate(7);
        return redirect('adds_display');

        }
        public function hide_user_row($id){
            $affected1= adds_user::where('id',$id)
            ->update(['is_delete'=>'1']);
               
            }
            public function add_user_row($id,$user){
                $role=new adds_user;
            
                $role->user_id=$user;
                $role->adds_id=$id;
                 $role->save();
                   
                }
                public function delete_user_row1($id,$user){
                    $affected1= adds_user::where([['adds_id',$id],['user_id',$user]])->update(['is_delete'=>'1']);;                       
                    }
        public function is_active($id){
            $affected1= adds::where('id',$id)
            ->update(['is_active'=>'1']);
            $affected = role::where('is_delete',0)->paginate(7);
            return redirect('adds_display');
            }
            public function is_not_active($id){
                $affected1= adds::where('id',$id)
                ->update(['is_active'=>'0']);
                $affected = adds::where('is_delete',0)->paginate(7);
                return redirect('adds_display');
                }
                public function filter($id){
                    if($id==1){
                        $affected1 = Department::where('is_active',1)->get();
                        $affected = adds::where([['is_delete',0],['is_active',1]])->paginate(7);
                        return view('adds_display',['data'=>$affected,'data1'=>$affected1]);
                    }elseif($id==0){
                        $affected1 = Department::where('is_active',1)->get();
                        $affected = adds::where([['is_delete',0],['is_active',0]])->paginate(7);
                        return view('adds_display',['data'=>$affected,'data1'=>$affected1]);
                    }
                }
}