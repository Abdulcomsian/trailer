<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Auth;
use App\Models\{User, Order, Trailer};

class DashboardController extends Controller
{
    //PROFILE
    public function profile()
    {
        $user = Auth::user();
        return view('frontend.userDashboard.user_profile', compact('user'));
    }
    //UPDATE PROFILE
    public function update_profile(Request $request)
    {
        $user = Auth::user();
        if ($request->password) {
            $this->validate($request, [
                'name' => 'required|min:3|max:180',
                'email' => ['required', Rule::unique('users')->ignore($user)],
                'password' => 'required|min:6|max:18|confirmed',
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required|min:3|max:180',
                'email' => ['required', Rule::unique('users')->ignore($user)]

            ]);
        }
        try {

            $user = User::find($request->user_id);
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            if ($request->phone) {
                $user->phone = $request->phone;
            }
            if ($request->hasfile('driving_licence')) {
                $filePath = 'uploads/driving_licence/';
                $image_name = HelperFunctions::saveFile(null, $request->file('driving_licence'), $filePath);
                $user->driving_licence = $image_name;
            }
            $user->save();
            return redirect()->back()->with('success', 'Success .. ! User Profile Updated');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'ERROR .. !  ' . $exception->getMessage() . '.');
        }
    }

    public function book_trailer($order_id)
    {
        $order = Order::with('user', 'trailer')->find($order_id);
        return view('frontend.book_trailer', compact('order'));
    }
}
