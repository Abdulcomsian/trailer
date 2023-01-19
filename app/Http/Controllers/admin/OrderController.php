<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order,OrderPickupTrailerImage,OrderReturnTrailerImage,Trailer,User};
use App\Utils\Validations;
use App\Utils\HelperFunctions;
use App\Notifications\OrderPlaced;
use Notification;
use Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (isset($_GET['status'])) {
                $orderData = Order::with('user', 'trailer')->where(['status' => $_GET['status']])->paginate(20);
            } else {
                // $orderData = Order::with('user', 'trailer')->whereIn('status' , ['New Order','Pick Up'])->paginate(20);
                $orderData = Order::with('user', 'trailer')->where('status' , 'New Order')->paginate(20);
            }

            return view('admin.orders.index', compact('orderData'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'ERROR .. !  ' . $exception->getMessage() . '.');
        }
    }

    public function create()
    {
         $orders = Order::first();
        $trailers = Trailer::get();
        return view('admin.orders.create',compact('orders','trailers'));
    }

    public function order_trailer(Request $request)
    {

        Validations::order_trailer($request);
        try {
            $user_id = Auth::id();
            $hire_time = explode(' - ', trim($request->date));
            $start_time = date('Y-m-d h:i A', strtotime("$hire_time[0] $request->start_time"));
            $end_time = date('Y-m-d h:i A', strtotime("$hire_time[1] $request->end_time"));
            $start_date = $hire_time[0];
            $end_date = $hire_time[1];
            $trailor = $this->getTrailerById($request->trailer_id);
            $user = $this->getUserById($user_id);
            $users=User::role('user')->get();
            return view('admin.orders.book_trailer', compact('hire_time', 'start_date', 'end_date', 'start_time', 'end_time', 'trailor', 'user','users'));
        } catch (\Exception $exception) {
           return redirect()->back()->with('error', 'ERROR .. !  ' . $exception->getMessage() . '.');
            return Redirect::back();
        }
    }

    public function order_submit(Request $request)
    {
        $amount = $request->amount;
        $amount = $amount + 150;
        try {
                $user = $this->getUserById($request->user);
                $order = new Order();
                $order->user_id = $user->id;
                $order->trailer_id = $request->trailer_id;
                $order->amount = $request->amount;
                $order->charges = 150;
                $order->start_time = $request->start_time;
                $order->end_time = date('h:i A', strtotime('+1 minutes', strtotime($request->end_time)));
                $order->start_time_strtotime = strtotime("$request->start_date $request->start_time");
                $order->end_time_strtotime = strtotime("$request->end_date $request->end_time");
                $order->start_date = $request->start_date;
                $order->end_date = $request->end_date;
                $order->payment_status = 1;
                $order->payment_method = "Stripe";
                $order->status = "New Order";
                if ($order->save()) {
                    return redirect('admin/orders')->with('success', 'Success .. ! Order Submited Successfully'); 
                }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'ERROR .. !  ' . $exception->getMessage() . '.');
        }
    }

    //Get Trailer By id
    public function getTrailerById($id)
    {
        return Trailer::find($id);
    }

    //Get USER by id
    public function getUserById($id)
    {
        return User::find($id);
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

    public function OrderConfirm($id)
    {
        try {
            Order::find($id)->update(['approved_status' => 1]);
            $order=Order::with('user','trailer')->find($id);
            Notification::route('mail', $order->user->email)->notify(new OrderPlaced($order->trailer->pass_key,'user',NULL,NULL,'Confirm'));
            return redirect()->back()->with('success', 'Success .. ! Order Confirm');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'ERROR .. !  ' . $exception->getMessage() . '.');
        }
    }

    
}
