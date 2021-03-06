<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Table;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $menus = Menu::all();
        $table = Table::find($id);
        return view('staff.addOrder',compact(['menus','table']));
    }

    public function viewOrder()
    {
        $orders = Order::orderBy('id', 'ASC')->paginate(8)->appends(request()->query());
        
        return view('admin.viewOrder', compact('orders'));
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

        $table = Table::find($request->id);
        $table->statusTable = $request->statusTable;
        $table->save();


        $order = Order::create($request->all());
        
        $menus = $request->input('menus',[]);
        $quantities = $request->input('quantities',[]);
        for ($menu=0; $menu < count($menus); $menu++){
            if($menus[$menu] != '' ){
                $order->menus()->attach($menus[$menu],['quantity'=> $quantities[$menu]]);
            }
        }

       
        

        return redirect('staff/mainmenu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = $request->status;
        $order->save();
        return redirect('staff/mainmenu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public static function destroy(Order $order)
    {     
        //
    }

    public function delete($id,$tableId)
    {
        $table = Table::find($tableId);
        $table->statusTable = 'Available';
        $table->save();

        $order = Order::find($id);
        $order->delete();
        return redirect('staff/mainmenu');
    }

}
