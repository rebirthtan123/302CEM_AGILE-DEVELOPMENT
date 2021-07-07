<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Menu;
use App\Models\Staff;
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
        $orders = Order::all();
       return view('admin.index',compact('orders'));
    }


    public function menu()
    {
        $menus = Menu::all();
       return view('admin.menu',compact('menus'));
    }

    public function user()
    {
        $users = Staff::all();
       return view('admin.user',compact('users'));
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

    public function createUser()
    {
        return view('admin.createUser');
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

    public function storeUser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'role' => 'required',
        ]);
  
        Staff::create($request->all());
   
        return redirect()->route('admin.user')
                        ->with('success','User created successfully.');
    
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

    public function editUser($id)
    {
        $user = Staff::find($id);

        return view('admin.editUser',compact('user'));
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

    public function updateUser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'role' => 'required',
        ]);
  
        $data= Staff::find($request->id);
        $data->username=$request->username;
        $data->role=$request->role;
        $data->save();
   
        return redirect()->route('admin.user')
                        ->with('success','User updated successfully.');
    
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

    public function deleteUser($id)
    {
        $user = Staff::find($id);
        $user->delete();
        return redirect()->route('admin.user');
    }
}
