<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order,OrderPickupTrailerImage,OrderReturnTrailerImage};

class OrderController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (isset($_GET['status'])) {
                $orderData = Order::with('user', 'trailer')->where(['status' => $_GET['status']])->paginate(20);
            } else {
                $orderData = Order::with('user', 'trailer')->whereIn('status' , ['New Order','Pick Up'])->paginate(20);
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

    public function OrderView($id)
    {
        try {
            $orderImages=OrderPickupTrailerImage::with('order')->where('order_id',$id)->first();
            return view('admin.orders.view',compact('orderImages'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'ERROR .. !  ' . $exception->getMessage() . '.');
        }

    }

    public function OrderReturn($id)
    {
        try {
            $orderImages=OrderReturnTrailerImage::with('order')->where('order_id',$id)->first();
            return view('admin.orders.view',compact('orderImages'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'ERROR .. !  ' . $exception->getMessage() . '.');
        }

    }

    
}
