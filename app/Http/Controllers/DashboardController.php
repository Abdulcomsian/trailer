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
        // dd($request->all());
        $hire_time = explode(' - ',trim($request->c_date));
        $start_time = date('Y-m-d', strtotime("$hire_time[0]"));
        $end_time = date('Y-m-d', strtotime("$hire_time[1]"));
        if($start_time == $end_time)
        {
            $start_date = strtotime("$hire_time[0]");
            $disable_time = Order::where('trailer_id',$request->trailer_id)->where('start_date', $start_date)->orWhere('end_date', $start_date)->get();
            $start_time = array();
            $end_time = array();
            // dd($disable_time);
            foreach($disable_time as $disable_t)
            {
                // dd(\Carbon\Carbon::parse($disable_t->start_time)->format('Y-m-d H:i:s'));
                $start_time[] = \Carbon\Carbon::parse($disable_t->start_time)->format('h:i A');
                $start_time[] = \Carbon\Carbon::parse($disable_t->end_time)->format('h:i A');
            }
            if(count($disable_time) > 0)
            {
                return response()->json([
                    'success'=> true,
                    'message' => 'Select Time',
                    'data' => $start_time
                ]);
            }
            else
            {
                return response()->json([
                    'success'=> true,
                    'message' => 'Select Time',
                    'data' => $disable_time
                ]);
            }
        }
        else
        {
            $start_date = strtotime("$hire_time[0]");
            $end_date = strtotime("$hire_time[1]");
            $disable_time = Order::where('trailer_id',$request->trailer_id)
            ->where([['start_date','>=' ,$start_date],['end_date','<=' , $end_date]])
            ->orWhere([['start_date','<=' ,$start_date],['end_date','>=' , $end_date]])
            ->orwhere([['start_date','>=' ,$start_date],['end_date','<=' , $end_date]])
            // ->orWhere([['start_date','>=' ,$end_date],['end_date','<=' , $end_date]])
            ->first();
            // dd($disable_time,$start_date,$end_date);
            // $disable_time = Order::where('start_date', $start_date)->get();
            // toastr()->error('Trailer already Booked in these Days.Kindly Select another date.');
            // dd($disable_time);
            if($disable_time == null)
            {
                return response()->json([
                    'success'=> true,
                    'message' => 'Select Time',
                    'data' => null
                ]);
            }
            else
            {
                return response()->json([
                    'error'=> true,
                    'message' => 'Trailer already Booked in these Days.Kindly Select another date.',
                    'data' => null
                ]);
            }
        }
        // $check_date = Order::where('start_time',)->first();  

        // return Response::json($check_date);
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
