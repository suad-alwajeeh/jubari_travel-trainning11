<?php

namespace App\Http\Controllers;
use App\rolee;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index()
    {
        //
    }
    public function display_row($id)
    { 
        $affected = rolee::where('id',$id)->get();
        return view('role_edit',['data'=>$affected]);
                    }
    public function display()
    {
        $affected = rolee::where('is_delete',0)->paginate(7);
        return view('role_display',['data'=>$affected]);
        }
    public function add()
    {
        return view('role_add');
    }
    public function save1(Request $req)
    {
     $req->validate([
        "role_name"=>"required",
        "role_descripe"=>"required",
        "is_active"=>"required",
        ]);
      $role=new rolee;
      $role->role_name=$req->role_name;
      $role->role_descripe=$req->role_descripe;
      $role->how_create_it=$req->how_create_it;
      $role->is_active=$req->is_active;
       $role->save();
      $affected = rolee::where('is_delete',0)->paginate(7);
      return redirect('role_display');
    }
    public function edit_row(Request $req){
        $req->validate([
            "role_name"=>"required",
            "role_descripe"=>"required",
            "is_active"=>"required",
            ]);
        $role=new rolee;
        $role::where('id',$req->id)
        ->update(['role_name'=>$req->role_name,'role_descripe'=>$req->role_descripe,
        'how_create_it'=>$req->how_create_it,'is_active'=>$req->is_active,
        ]);
        $affected = rolee::where('is_delete',0)->paginate(7);
        return redirect('role_display');        
    }
    public function hide_row($id){
        $affected1= rolee::where('id',$id)
        ->update(['is_delete'=>'1']);
        $affected = role::where('is_delete',0)->paginate(7);
        return redirect('role_display');

        }
        public function is_active($id){
            $affected1= rolee::where('id',$id)
            ->update(['is_active'=>'1']);
            $affected = rolee::where('is_delete',0)->paginate(7);
            return redirect('role_display');
    
            }
            public function is_not_active($id){
                $affected1= rolee::where('id',$id)
                ->update(['is_active'=>'0']);
                $affected = rolee::where('is_delete',0)->paginate(7);
                return redirect('role_display');
        
                }
   
}