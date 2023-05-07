<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function getProduct($id)
    {
        $product=DB::table('products')->where('category_id',$id)->get();
        return response()->json($product);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function TodaySell()
    {
        $date=date('d/m/Y');
        $sell=DB::table('orders')->where('order_date',$date)->sum('total');
        return response()->json($sell);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function TodayIncome()
    {
        
        $date=date('d/m/Y');
        $income=DB::table('orders')->where('order_date',$date)->sum('pay');
        return response()->json($income);
    }
    public function TodayDue()
    {
        
        $date=date('d/m/Y');
        $due=DB::table('orders')->where('order_date',$date)->sum('due');
        return response()->json($due);
    }
    public function TodayExpense()
    {
        
        $date=date('d/m/Y');
        $expense=DB::table('expenses')->where('expense_date',$date)->sum('amount');
        return response()->json($expense);
    }

    public function TodayStockOut()
    {
        $product=DB::table('products')->where('product_quantity','<','1')->get();
        return response()->json($product);
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
