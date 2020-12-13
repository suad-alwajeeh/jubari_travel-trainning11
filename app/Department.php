<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //protected $table = 'departments';

    protected $fillable = [
        'id','name','created_at','is_active','delete'
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
  
}
