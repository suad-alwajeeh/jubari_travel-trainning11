<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
class DepartmentController extends Controller
{
    public function index()
    {
        $del=0;
        if(isset($_GET['id']) && ($_GET['id']==0 || $_GET['id']==1) )
       { 
       
        $where=['is_active'=>$_GET['id']];
        //$where +=['deleted'===0];

        $data['dept']=Department::where(['deleted'=>0,'is_active'=>$_GET['id']])->get();
        return json_encode($data);}
    
        else if(isset($_GET['id']) && $_GET['id']==2 )
       { 
        //$where +=['deleted'===$del];
        $data['dept']=Department::where('deleted',0)->get();
        return json_encode($data);}
    
        
        else{
          //  $where +=['deleted'=>0];
          
            $data['dept']=Department::where('deleted',0)->get();
            return view('department',$data);
        }
    }
    public function insert(){

        return view('add-department');

    }
    
    public function saved(Request $request)
    {

        $request->validate([
            "name"=>"required",
            "created_at"=>"required",
            ]); 
     $active;
     if($request->input('is_active')==1)
     {
          $active=1;
     }
     else
     $active=0;
      $dept=new Department;
      $dept->name=$request->name;
      $dept->created_at=$request->created_at;
      $dept->is_active=$active;
     
      echo $dept->save();
      //return $dept->getall();
      return redirect('department')->with('seccess','Seccess Data Insert');
    
    }

    public function display_row($id)
    { 
        $data['dept'] = Department::where('id',$id)->get();
        return view('update-department',$data);
                    }

public function edit_row(Request $req){
                        $dept=new Department;
                        $active;
                        if($req->input('is_active')==1)
                        {
                             $active=1;
                        }
                        else
                        $active=0;

                        $dept::where('id',$req->id)
                        ->update(['name'=>$req->name,'created_at'=>$req->create_at,
                        'is_active'=>$active,
                        ]);
                        $data['dept'] = Department::where('deleted',0)->paginate(7);
                        return view('department',$data);
                        
                    }
    public function hide_row($id){
        $affected1= Department::where('id',$id)
        ->update(['deleted'=='1']);
        $data['dept'] = Department::where('deleted',0)->paginate(7);
        return view('department',$data);

        }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dept = Department::find($id);
        return view('update-department')->with('dept',$dept);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}