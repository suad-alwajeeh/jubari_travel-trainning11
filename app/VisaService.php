<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisaService extends Model
{
    protected $table="visa_services";
    protected $fillable = [
        'Issue_date', 'refernce', 'passenger_name ','voucher_number',
        'Dep_city','arr_city','dep_date','due_to_supp','provider_cost',
        'cur_id','due_to_customer','cost','service_id','passnger_currency','remark',
        'service_status','visa_status','deleted','visa_info','country','visa_type','attachment','user_id','user_status'
    ];
}
