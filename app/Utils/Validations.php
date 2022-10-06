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
