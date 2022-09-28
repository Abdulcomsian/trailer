<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Auth;
use App\Models\Trailer;
use App\Models\Order;

class OrderTrailerController extends Controller
{
    public function order_trailer(Request $request)
    {
        $user_id = Auth::id();
        $this->validate($request,[ 
            'trailer_id'=>'required', 
            'date'=>'required', 
            'start_time'=>'required', 
            'end_time' => 'required',

        ]);

        $order= new Order;
        $hire_time = explode(' - ',trim($request->date));
        $start_time = date('Y-m-d H:i:s', strtotime("$hire_time[0] $request->start_time"));
        $end_time = date('Y-m-d H:i:s', strtotime("$hire_time[1] $request->end_time"));
        // dd($start_time);
        $order->trailer_id = $request->trailer_id;
        $order->user_id = $user_id;
        $order->start_time = strtotime($start_time);
        $order->end_time = strtotime($end_time);
        $order->start_date = strtotime($hire_time[0]);
        $order->end_date = strtotime($hire_time[1]);
        $order->save();
        
        return redirect('/book_trailer');
    }
}
