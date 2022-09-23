<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
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
                'password'=>'required|min:6|max:18',
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
