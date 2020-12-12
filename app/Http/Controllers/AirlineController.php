<?php

namespace App\Http\Controllers;
use App\Airline;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function display_row($id)
    { 
        $affected = Airline::where('id',$id)->get();
        return view('airline_edit',['data'=>$affected]);
                    }
    public function display()
    {
        $affected = Airline::where('is_active',1)->get();
        return view('airline_display',['data'=>$affected]);
        }
    public function add()
    {
        return view('airline_add');
    }
    public function save1(Request $req)
    {
     // print_r($req->input());
      $airline=new Airline;
      $airline->airline_code=$req->airline_code;
      $airline->airline_name=$req->airline;
      $airline->country=$req->country;
      $airline->carrier_code=$req->carrier_code;
      $airline->code=$req->code;
      $airline->IATA=$req->IATA;
      $airline->remark=$req->remark;
      $airline->is_active=$req->is_active;
      echo $airline->save();
      $affected = Airline::get();
      return view('airline_display',['data'=>$affected]);
    }
    public function edit_row(Request $req){
        $airline=new Airline;
        $airline::where('id',$req->id)
        ->update(['airline_code'=>$req->airline_code,'airline_name'=>$req->airline,
        'country'=>$req->country,'carrier_code'=>$req->carrier_code,'code'=>$req->code,
        'IATA'=>$req->IATA	,'remark'=>$req->remark,'is_active'=>$req->is_active,
        ]);
        $affected = Airline::get();
        return view('airline_display',['data'=>$affected]);
        
    }
    public function hide_row($id){
        $affected1= Airline::where('id',$id)
        ->update(['is_active'=>'0']);
        $affected = Airline::get();
        return view('airline_display',['data'=>$affected]);

        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
