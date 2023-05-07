<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function paid(Request $request,$id)
    {
        $validateData=$request->validate([
            'salary_month'=>'required',
        ]);
        $month=$request->salary_month;
        $check=DB::table('salaries')->where('employee_id',$id)->where('salary_month',$month)->first();
        if($check){
            return response()->json('Salary Alrady Paid');
        }else{
            $data=array();
        $data['employee_id']=$id;
        $data['amount']=$request->salary;
        $data['salary_date']=date('d/m/Y');
        $data['salary_month']=$month;
        $data['salary_year']=date('Y');
        DB::table('salaries')->insert($data);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allSalary()
    {
         $salary=DB::table('salaries')->select('salary_month')->groupBy('salary_month')->get();
         return response()->json($salary);
    }
    public function viewSalary($id)
    {
        $month=$id;
        $view=DB::table('salaries')
                ->join('employees','salaries.employee_id','employees.id')
                ->select('employees.name','salaries.*')
                ->where('salaries.salary_month',$month)->get();
        return response()->json($view);
    }
    public function editSalary($id){ 
        $view=DB::table('salaries')
                ->join('employees','salaries.employee_id','employees.id')
                ->select('employees.name','employees.email','salaries.*')
                ->where('salaries.id',$id)->first();
        return response()->json($view);
    }
    public function updateSalary(Request $request,$id)
    {
        $data=array();
        $data['employee_id']=$request->employee_id;
        $data['amount']=$request->amount;
        $data['salary_month']=$request->salary_month;
        DB::table('salaries')->where('id',$id)->update($data);
    }
    public function index()
    {
        //
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
