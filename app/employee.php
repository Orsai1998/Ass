<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    public $table = 'employees';
    public $timestamps=false;
    public $primaryKey='emp_no';	
    
}
