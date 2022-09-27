<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function landing_page()
    {
        // $user = Auth::user();
        $orders = Order::first();
        return view('frontend.index',compact('orders'));
    }

    public function check_date(Request $request)
    {   
        // dd($request->c_date);
        $hire_time = explode(' - ',trim($request->c_date));
        $start_time = date('Y-m-d H:i:s', strtotime("$hire_time[0]"));
        $end_time = date('Y-m-d H:i:s', strtotime("$hire_time[1]"));
        dd($start_time, $end_time);
        $check_date = Order::where('start_time',)->first();  

        return Response::json($check_date);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('frontend.user_profile',compact('user'));
    }

    public function update_profile(Request $request)
    { 
        // dd($request);
        $user = Auth::user();
        if($request->password)
        { 
            $this->validate($request,[ 
                'name'=>'required|min:3|max:180', 
                'email'=> ['required', Rule::unique('users')->ignore($user)],
                'password'=>'required|min:6|max:18|confirmed',
            ]);
        }
        else{
            $this->validate($request,[ 
                'name'=>'required|min:3|max:180', 
                'email'=> ['required', Rule::unique('users')->ignore($user)]

            ]);
        }

        $user= User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password)
        {
            $user->password = Hash::make($request->password);
        }

        if($request->phone)
        {
            $user->phone = $request->phone;
        }
        $user->save();

        return Redirect::back();
    }
}
