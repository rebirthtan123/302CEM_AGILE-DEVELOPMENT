<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Menu;
use App\Models\Table;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.index');
    }


    public function menu()
    {
        $menus = Menu::all();
       return view('admin.menu',compact('menus'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMenu()
    {
        return view('admin.createMenu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMenu(Request $request)
    {
        $request->validate([
            'itemName' => 'required',
            'categoryName' => 'required',
            'price' => 'required',
        ]);
  
        Menu::create($request->all());
   
        return redirect()->route('admin.menu')
                        ->with('success','Menu created successfully.');
    
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }
    
    public function editMenu($id)
    {
        $menu = Menu::find($id);

        return view('admin.editMenu',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    public function updateMenu(Request $request)
    {
        $request->validate([
            'itemName' => 'required',
            'categoryName' => 'required',
            'price' => 'required',
        ]);
  
        $data= Menu::find($request->id);
        $data->itemName=$request->itemName;
        $data->categoryName=$request->categoryName;
        $data->price=$request->price;
        $data->save();
   
        return redirect()->route('admin.menu')
                        ->with('success','Menu updated successfully.');
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }


    public function deleteMenu($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('admin.menu');
    }
}
