<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Table;
use App\Models\Order;
use App\Models\Receipt;

use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$tableId)
    {
        $order = Order::with('menus')->find($id);
        $table = Table::find($tableId);
        //dd($table);

        return view('staff.receipt',compact(['order','table']));

    
    }

    public function showOut($id){
        return Order::find($id);
    }

    public function makePayment(Request $request,$id,$tableId){
        
        $order = Order::find($request->id);
        $order->paymentStatus = $request->status;
        $order->save();
        
        $table = Table::find($tableId);
        $table->statusTable = 'Available';
        $table->save();
            

        return redirect('staff/mainmenu');
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
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        $order = Order::find($request->id);
        return redirect('staff.receipt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        //
    }

    public function deletereceipt($id)
    {
        $order = Order::find($id);
        $order->deletereceipt();
        
    }


}
