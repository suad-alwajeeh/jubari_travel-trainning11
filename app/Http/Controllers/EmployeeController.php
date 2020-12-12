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
        $where +=['departments.is_active'=>1];
        //$where=['departments.is_active'=>1];
       
        $data['emps']=Employee::join('departments', 'departments.id', '=', 'employees.dept_id')
        ->where($where)->get();
        return json_encode($data);}
    
        else if(isset($_GET['id']) && $_GET['id']==2 )
       { 
       
        $where=['departments.is_active'=>1];
        //$where=['departments.is_active'=>1];
       
        $data['emps']=Employee::join('departments', 'departments.id', '=', 'employees.dept_id')
        ->where($where)->get();
        return json_encode($data);}
    
        
        else{
            $where=['departments.is_active'=>1];
            //$where=['departments.is_active'=>1];
           
            $data['emps']=Employee::join('departments', 'departments.id', '=', 'employees.dept_id')
            ->where($where)->get();
            return view('employee',$data);
        }

    
    }
}
