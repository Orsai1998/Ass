<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dept_emp extends Model
{
     public $table ='dept_emp';
    public function department(){
        return $this->hasOne('App\departments', 'dept_no', 'dept_no');
    }
    public function dept_emp(){
        return $this->hasOne('App\employee',  'emp_no', 'emp_no');
    }
}
