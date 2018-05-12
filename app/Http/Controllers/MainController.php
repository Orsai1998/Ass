<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\employee;
use App\dept_emp;
use App\departments;

class MainController extends Controller
{
     public function countEmp(){
     $countEmp=DB::table('dept_emp')->leftjoin('employees','dept_emp.emp_no','=','employees.emp_no')->join('departments','departments.dept_no','=','dept_emp.dept_no')->where('to_date','=','9999-01-01')->groupBy('departments.dept_name')->get([ DB::raw('departments.dept_name'),DB::raw('COUNT(departments.dept_name) as amount')]); 
     
     $countTitle=DB::table('titles')->join('salaries','titles.emp_no','=','salaries.emp_no')->groupBy('titles.title')->get([DB::raw('titles.title'),DB::raw('COUNT(distinct salaries.emp_no) as amountInEach')]);

      $countMax=DB::table('titles')->join('salaries','titles.emp_no','=','salaries.emp_no')->groupBy('titles.title')->get([DB::raw('titles.title'),DB::raw('MAX(salaries.salary) as max')]);

      $countAVG=DB::table('titles')->join('salaries','titles.emp_no','=','salaries.emp_no')->groupBy('titles.title')->get([DB::raw('titles.title'),DB::raw('AVG(salaries.salary) as avg')]);
     return view('index',['countEmp'=>$countEmp,'countTitle'=>$countTitle,'countMax'=>$countMax,'countAVG'=>$countAVG]);

     }

    public function showInfo(){
    	  $info=DB::table(DB::raw('employees'))->select(DB::raw('distinct employees.emp_no,employees.first_name,employees.last_name,departments.dept_name,employees.birth_date,employees.gender,employees.hire_date'))->leftjoin('dept_emp','dept_emp.emp_no','=','employees.emp_no')->leftjoin('departments','departments.dept_no','=','dept_emp.dept_no')->paginate(15);
    	  $dept=departments::all();
       return view('table-basic',['info'=>$info,'dept'=>$dept]); 	
    }
     public function employees(){
    	/*Show all employees with paganation*/
    	$name_e=Input::get('name_e');
    	$name_l=Input::get('name_l');
    	$depart=Input::get("departments");
       $info=DB::table(DB::raw('employees'))->select(DB::raw('distinct employees.emp_no,employees.first_name,employees.last_name,departments.dept_name,employees.birth_date,employees.gender,employees.hire_date'))->leftjoin('dept_emp','dept_emp.emp_no','=','employees.emp_no')->leftjoin('departments','departments.dept_no','=','dept_emp.dept_no')->where('employees.first_name','LIKE',"%$name_e%")->where('dept_emp.dept_no','=',$depart)->where('employees.last_name','LIKE',"%$name_l%")->paginate(15);
        $dept=departments::all();
        $info->appends(['name_e' => $name_e,'name_l'=>$name_l,'departments'=>$depart]);
       return view('table-basic',['info'=>$info,'dept'=>$dept]); 
    }
     public function showPersonalInfo($emp_no){
     	/*Personal information*/
      $perInf=DB::table(DB::raw('employees'))->select(DB::raw('employees.emp_no,employees.first_name,employees.last_name,departments.dept_name,employees.birth_date,employees.gender,employees.hire_date'))->leftjoin('dept_emp','dept_emp.emp_no','=','employees.emp_no')->leftjoin('departments','departments.dept_no','=','dept_emp.dept_no')->where('employees.emp_no','=',$emp_no)->get();
      /*Information about position for all period*/
      $data=DB::table('titles')->leftjoin('employees','employees.emp_no','=','titles.emp_no')->where('employees.emp_no','=',$emp_no)->get([DB::raw('titles.title'),DB::raw('titles.from_date'),DB::raw('titles.to_date')]);
      /*Information about salary for all period*/
      $salary=DB::table('salaries')->leftjoin('employees','employees.emp_no','=','salaries.emp_no')->where('employees.emp_no','=',$emp_no)->get([DB::raw('salaries.salary'),DB::raw('salaries.from_date')]);
       /*Rewrite variables and passing to pages-profile view*/
       return view('pages-profile',['perInf'=>$perInf,'data'=>$data,'salary'=>$salary]); 
    }

}
