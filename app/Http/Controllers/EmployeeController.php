<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Department;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
 if(isset($_GET['id']) && ($_GET['id']==0 || $_GET['id']==1) )
       { 
       
        $where=['employees.is_active'=>$_GET['id']];
        $where +=['employees.deleted'=>0];
        $where +=['departments.deleted'=>0];
        $where +=['departments.is_active'=>1];
        //$where=['departments.is_active'=>1];
       
        $data['emps']=Employee::join('departments', 'departments.id', '=', 'employees.dept_id')
        ->get();
        return json_encode($data);
    }
    
        else if(isset($_GET['id']) && $_GET['id']==2 )
       { 
       
        //$where=['departments.is_active'=>1];
        $where =['employees.deleted'=>0];
        $where +=['departments.deleted'=>0];
        $where +=['departments.is_active'=>1];
        $data['emps']=Employee::join('departments', 'departments.id', '=', 'employees.dept_id')
        ->where($where,1)->get();
        return json_encode($data);}
    
        
        else{
            //$where=['departments.is_active'=>1];
            $where =['employees.deleted'=>0];
            $where +=['departments.deleted'=>0];
        $where +=['departments.is_active'=>1];
            $data['emps']=Employee::join('departments', 'departments.id', '=', 'employees.dept_id')
            ->where($where)->get();
            return view('employee',$data);
        }

    
    }
    public function insert(){
        $where=['is_active'=>1];
        $where +=['deleted'=>0];
        $data['emps']=Department::where($where)->get();
        return view('add-employee',$data);

    }

    public function saved(Request $request)
    {
print_r($_FILES);
        
     $active='';
     $emp_photo='';
     $attchment='';
    if($request->input('is_active')==1)
     {
          $active=1;
     }
     else
     $active=0;
     $targetDirImg ="assets/img/user/" ;
$imgName =time().basename($_FILES["emp_photo3"]["name"]);
$targetImagePath = $targetDirImg . $imgName;
$emp_photo=move_uploaded_file($targetImagePath,$_FILES["emp_photo3"]["tmp_name"]);

$targetDir ="assets/img/attchment/" ;
$fileName =time().basename($_FILES["attachment"]["name"]);
$targetFilePath = $targetDir . $fileName;
$attchment=move_uploaded_file($targetFilePath,$_FILES["attachment"]["tmp_name"]);

      $emp=new Employee;
      $emp->emp_first_name=$request->emp_first_name;
      $emp->emp_middel_name=$request->emp_medil_name;
      $emp->emp_thired_name=$request->emp_thired_name;
      $emp->emp_last_name=$request->emp_last_name;
      $emp->emp_ssn=$request->emp_ssn;
      $emp->emp_email=$request->emp_email;
      $emp->emp_mobile=$request->emp_mobile;
      $emp->emp_photo=$targetImagePath;
      $emp->attchment=$targetFilePath;
      $emp->emp_salary=$request->emp_salary;
      $emp->emp_hirdate=$request->emp_hirdate;
      $emp->dept_id=$request->dept_id;
      $emp->is_active=$active;
    
      echo $emp->save();
      //return $dept->getall();
     return redirect('employees')->with('seccess','Seccess Data Insert');
       //return ['$path'=>$path,'upload'=>'seccee'];
    
    }
   

    
    public function display_row($id)
    { 
        $data['emps'] = Employee::where('emp_id',$id)->get();
        $data['dept'] = Department::all();
        return view('update-employee',$data);
                    }

public function edit_row(Request $req){
                        $dept=new Employee;
                        $active;
                        if($req->is_active==1)
                        {
                             $active=1;
                        }
                        else
                        $active=0;
                        
                        $dept::where('emp_id',$req->id)
                        ->update(['emp_first_name'=>$req->emp_first_name,'emp_middel_name'=>$req->emp_medil_name,'created_at'=>$req->create_at,
                        'is_active'=>$active,'emp_thired_name'=>$req->emp_thired_name,'emp_last_name'=>$req->emp_last_name,
                        'emp_ssn'=>$req->emp_ssn,'emp_email'=>$req->emp_email,'emp_mobile'=>$req->emp_mobile,
                        'emp_salary'=>$req->emp_salary,'emp_hirdate'=>$req->emp_hirdate,'dept_id'=>$req->dept_id
                        ]);
                        $data['emps'] = Employee::where('deleted',0)->paginate(7);
                        return redirect('employees')->with($data);

                        
                    }
    public function hide_row($id){
        $affected1= Empolyee::where('emp_id',$id)
        ->update(['deleted'=>'1']);
        $data['dept'] = Employeee::where('deleted',0)->paginate(7);
        return redirect('employees')->with('seccess','Seccess Data Delete');

        }
    
}
