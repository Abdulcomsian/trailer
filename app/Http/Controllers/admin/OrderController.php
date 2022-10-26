<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $orderData = Order::with('user', 'trailer')->paginate(20);
            return view('admin.orders.index', compact('orderData'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'ERROR .. !  ' . $exception->getMessage() . '.');
        }
    }

    public function OrderCompleted(Request $request)
    {
        try {
            Order::find($request->id)->update(['status' => 'Completed']);
            return redirect()->back()->with('success', 'Success .. ! Order Completed');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'ERROR .. !  ' . $exception->getMessage() . '.');
        }
    }
}
