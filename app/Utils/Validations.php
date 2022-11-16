<?php


namespace App\Utils;


use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class Validations
{

    //Front End order trailer validation
    public static function order_trailer($request)
    {
        $request->validate([
            'trailer_id' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',

        ]);

        //  $request->validate([
        //     'trailer_id' => 'required',
        //     's_date' => 'required',
        //     'e_date' => 'required',
        //     'start_time' => 'required',
        //     'end_time' => 'required',

        // ]);
    }

    //store coupon
    public static function coupon($request)
    {
        $request->validate([
            'code' => 'unique:coupons|required',
            'value' => 'required',
            'toal_count' => 'required',
            'expired_at' => 'required',

        ]);
    }

    public static function updatecoupon($request)
    {
        $request->validate([
            'code' => ['required', Rule::unique('coupons')->ignore($request->id)],
            'value' => 'required',
            'toal_count' => 'required',
            'expired_at' => 'required',

        ]);
    }



    //Cutom Login Vaidations
    public static function customLogin($request)
    {
        $request->validate([
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
    }

    //store licence validation
    public static function storeLicence($request)
    {
        $request->validate([
            'driving_licence' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }
}
