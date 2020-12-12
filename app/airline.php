<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class airline extends Model
{
  public function getall(){
    $affected = Model::get();
        return view('airline_display',['data'=>$affected]);
    }
    
}
