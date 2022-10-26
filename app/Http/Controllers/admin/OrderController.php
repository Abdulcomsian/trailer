<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (isset($_GET['status'])) {
                $orderData = Order::with('user', 'trailer')->where(['status' => $_GET['status']])->paginate(1);
            } else {
                $orderData = Order::with('user', 'trailer')->where(['status' => 'New Order'])->paginate(1);
            }

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
