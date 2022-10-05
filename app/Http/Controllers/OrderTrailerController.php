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

        //$order= new Order;
        $hire_time = explode(' - ',trim($request->date));
        
        $start_time = date('Y-m-d h:i A', strtotime("$hire_time[0] $request->start_time"));
        $end_time = date('Y-m-d h:i A', strtotime("$hire_time[1] $request->end_time"));
        $start_date = strtotime($hire_time[0]);
        $end_date = strtotime($hire_time[1]);
        // $order->trailer_id = $request->trailer_id;
        // $order->user_id = $user_id;
        // $order->start_time = strtotime($start_time);
        // $order->end_time = strtotime($end_time);
        // $order->start_date = strtotime($hire_time[0]);
        // $order->end_date = strtotime($hire_time[1]);
        // $order->save();

        $trailer_id = $request->trailer_id;
        $user_id = $user_id;
        $trailor = Trailer::where('id',$trailer_id)->first();
        $user = User::where('id',$user_id)->first();
        // $url = 'dashboard/book_trailer/' . $order->id;
        
        // return redirect($url);
        return view('frontend.book_trailer',compact('hire_time', 'start_time', 'end_time', 'trailor', 'user'));
       // return view('dashboard/book_trailer',compact('hire_time', 'start_time', 'end_time', 'trailer_id', 'user_id'));
    }

    public function login(Request $request){
        // dd($request->all());
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Attempt to log the user in
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            //return redirect('/');

            $response = array(
                'login' => "loggedin"
            );
            return $this->successResponse($response, null, 200);
        }else{
            $response = array(
                'login' => "error"
            );
            return $this->errorResponse($response, 401);
        }
        // if unsuccessful, then redirect back to the login with the form data
        //return redirect()->back()->withErrors->withInput($request->only(‘email’, ‘remember’));
       // return redirect()->back()->withErrors(['email'=>'These credentials do not match our records.'])->withInput
      //  ($request->only('email', 'remember'));
    }

    protected function successResponse($data, $message = null, $code = 200)
    {
        return response()->json([
            'status' => 'Success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    /*
    *  General Standard error response
    *  @params: message is error message that is generated from Exception
    *  @params: code is Http error code
    **/
    protected function errorResponse($message = null, $code, $redirectURL = null)
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'data' => null,
            'redirectURL' => $redirectURL,
        ], $code);
    }
}
