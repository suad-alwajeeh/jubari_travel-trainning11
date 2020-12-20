<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralService extends Model
{
    protected $fillable = [
        'Issue_date', 'refernce', 'passenger_name ','bus_number',
        'Dep_city','arr_city','dep_date','due_to_supp','provider_cost',
        'cur_id','due_to_customer','cost','service_id','passnger_currency','remark',
        'bus_name','service_status','offered_status','deleted','general_status','busher_time','attachment'
    ];
}
