<?php

namespace App\Http\Controllers;
use App\users;
use App\Department;
use App\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class uuserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['role:sale_executive |admin']); 
    }
    public function login()
    {
        return view('login');
    }
    public function login_data(Request $req)
    {
        $user_email=$req->email;
        $user_password=$req->password;
      $u= users::where([['email',$user_email],['is_active',1],['is_delete',0]])->get();
      $check=Hash::check($user_password, $u[0]->password);
        if($check==true){
            $emp_img = DB::table('employee')->where('emp_id',$u[0]->emp_id)->get();
            $req->session()->put('id',$u[0]->id);
            $req->session()->put('name',$u[0]->name);
            $req->session()->put('img',$emp_img[0]->emp_photo);
            return redirect('/');
        }else{    
              return redirect('sign_in');
        }
        }


    public function display_row($id)
    { 
        $affected = users::where('id',$id)->get();
        return view('user_edit',['data'=>$affected]);
                    }
    public function display()
    {
        $affected = users::where('is_delete',0)->join('role_user','users.id','role_user.user_id')
        ->join('employee','role_user.user_id','employee.emp_id')
        ->join('departments','employee.dept_id','departments.id')
        ->select('users.id as u_id', 'users.is_active as u_is_active','users.is_delete as u_is_delete','users.name as u_name','users.email as u_email', 'departments.name as d_name')->paginate(7);
        $affected1 = users::where('is_delete',0)->join('role_user','users.id','role_user.user_id')->select('users.id as u_id');

        return view('user_display',['data'=>$affected,'data1'=>$affected1]);
        }
    public function add()
    {
        $affected = DB::table('employee')->where('deleted','0')->get();
        $affected1 = Department::where('is_active',1)->get();
       
        return view('user_add',['data'=>$affected,'data1'=>$affected1]);
    }
    public function save1(Request $req)
    {
     $req->validate([
        "email"=>"required",
        "password"=>"required",
        "how_create_it"=>"required",
        "is_active"=>"required",
        "emp_id"=>"required",
        "name"=>"required",
        ]);
      $user=new users;
      $user->name=$req->name;
      $user->email=$req->email;
      $user->how_add_it=$req->how_create_it;
      $user->emp_id=$req->emp_id;
      $user->is_active=$req->is_active;
      $user->password=Hash::make($req->password);
       $user->save();
      return redirect('user_display');
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
        return redirect('user_display');
        
    }
    public function hide_row($id){
        $affected1= users::where('id',$id)
        ->update(['is_delete'=>'1']);
        $affected = users::where('is_delete',0)->paginate(7);
        return redirect('user_display');

        }
        public function is_active($id){
            $affected1= users::where('id',$id)
            ->update(['is_active'=>'1']);
            $affected = users::where('is_delete',0)->paginate(7);
            return redirect('user_display');
            }
            public function is_not_active($id){
                $affected1= users::where('id',$id)
                ->update(['is_active'=>'0']);
                $affected = users::where('is_delete',0)->paginate(7);
                return redirect('user_display');
                }
                public function filter($id){
                    if($id==1){
                        $affected1 = Department::where('is_active',1)->get();
                        $affected = users::where([['is_delete',0],['is_active',1]])->paginate(7);
                        return view('adds_display',['data'=>$affected,'data1'=>$affected1]);
                    }elseif($id==0){
                        $affected1 = Department::where('is_active',1)->get();
                        $affected = users::where([['is_delete',0],['is_active',0]])->paginate(7);
                        return view('adds_display',['data'=>$affected,'data1'=>$affected1]);
                    }
                }
}