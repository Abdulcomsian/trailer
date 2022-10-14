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
        $coupondata = Coupon::find($id);
        return view('admin.coupon.edit', compact('coupondata'));
    }


    public function update(Request $request, $coupon)
    {
        Validations::updatecoupon($request);
        try {
            $all_inputs = $request->except('id', '_token');
            Coupon::find($coupon)->update($all_inputs);;
            return redirect()->back()->with('success', 'Success .. ! Coupon Updated');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'ERROR .. !  ' . $exception->getMessage() . '.');
        }
    }


    public function destroy($id)
    {
        try {
            Coupon::FindorFail($id)->delete();
            toastr()->error('Coupon successfully deleted!');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastr()->error('Something Went Wrong!');
            return Redirect::back();
        }
    }
}
