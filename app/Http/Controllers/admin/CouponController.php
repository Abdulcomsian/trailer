<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\Validations;
use App\Models\Coupon;

class CouponController extends Controller
{

    public function index()
    {
        $coupons = Coupon::get();
        return view('admin.coupon.index', compact('coupons'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        Validations::coupon($request);
        try {
            $all_inputs = $request->except('_token');
            Coupon::create($all_inputs);
            return redirect()->back()->with('success', 'Success .. ! Coupon Created');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'ERROR .. !  ' . $exception->getMessage() . '.');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
