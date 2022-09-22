<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Auth;
use App\Models\Trailer;

class OrderTrailerController extends Controller
{
    public function order_trailer(Request $request)
    {
        $this->validate($request,[ 
            'trailer_id'=>'required', 
            'hire_time'=>'required', 
            'start_time'=>'required', 
            'end_time' => 'required',

        ]);

        $trailer= new Trailer;
        $trailer->trailer_id = $request->trailer_id;
        $trailer->hire_time = strtotime($request->hire_time);
        $trailer->start_time = strtotime($request->start_time);
        $trailer->end_time = strtotime($request->end_time);
        $trailer->save();
        
        return redirect('/book_trailer');
    }
}
