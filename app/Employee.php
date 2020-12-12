<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    protected $fillable = [
        'emp_id', 'emp_first_name', 'emp_middel_name ','emp_thired_name','emp_last_name','emp_hirdate','emp_salary',
        'emp_ssn','emp_telephone','emp_mobile','emp_photo','is_active','attachemnt','delete'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];
}
