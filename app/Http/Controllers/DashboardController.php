<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function profile()
    {
        return view('frontend.user_profile');
    }
}
