<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\Validations;
use App\Models\{Order, Trailer};
use Auth;

class HomeController extends Controller
{
    //HOME PAGE
    public function landing_page()
    {
        $orders = Order::first();
        $trailers = Trailer::get();
        return view('frontend.index', compact('orders', 'trailers'));
    }

    //Custom Login Home page
    public function login(Request $request)
    {
        Validations::customLogin($request);
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $response = array(
                'login' => "loggedin"
            );
            return $this->successResponse($response, null, 200);
        } else {
            $response = array(
                'login' => "error"
            );
            return $this->errorResponse($response, 200);
        }
    }
}
