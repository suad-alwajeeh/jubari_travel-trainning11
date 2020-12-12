<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$data['dept']=Department::all();
        return view('department',$data);*/
        if(isset($_GET['id']) && ($_GET['id']==0 || $_GET['id']==1) )
       { 
       
        $where=['is_active'=>$_GET['id']];
        $data['dept']=Department::where($where)->get();
        return json_encode($data);}
    
        else if(isset($_GET['id']) && $_GET['id']==2 )
       { 
       
        $data['dept']=Department::all();
        return json_encode($data);}
    
        
        else{
            $data['dept']=Department::all();
            return view('department',$data);
        }
    }
    

}
