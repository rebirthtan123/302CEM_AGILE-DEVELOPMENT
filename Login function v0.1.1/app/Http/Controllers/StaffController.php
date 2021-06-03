<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
}
