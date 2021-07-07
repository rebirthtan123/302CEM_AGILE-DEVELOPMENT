<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function check(Request $request){
        //Validate requests
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $userInfo = Staff::where('username','=',$request->username)->first();
        $password = Staff::where('password','=',$request->password)->first();
        if(!$userInfo){
            return back()->with('fail','We do not recognize your username');
        }else{
            //check password
            if($password){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('staff/mainmenu');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }

    function mainmenu(){
        return view('staff.mainmenu');
    }

    function loginChef(){
        return view('auth.loginChef');
    }

    function loginAdmin(){
        return view('auth.loginAdmin');
    }

    function checkChef(Request $request){
        //Validate requests
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $userInfo = Staff::where('username','=',$request->username)->first();
        $password = Staff::where('password','=',$request->password)->first();
        if(!$userInfo){
            return back()->with('fail','We do not recognize your username');
        }else{
            //check password
            if($password){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('staff/kitchen');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }

    function checkAdmin(Request $request){
        //Validate requests
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $userInfo = Staff::where('username','=',$request->username)->first();
        $password = Staff::where('password','=',$request->password)->first();
        if(!$userInfo){
            return back()->with('fail','We do not recognize your username');
        }else{
            //check password
            if($password){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('admin/index');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
