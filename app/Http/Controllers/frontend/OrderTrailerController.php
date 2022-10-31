<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Utils\Validations;
use App\Utils\HelperFunctions;
use App\Models\{User, Trailer, Order, Coupon, OrderReturnTrailerImage};
use App\Mail\TrailerRefunMail;
use Auth;
use Session;
use Stripe;
use Validator;

class OrderTrailerController extends Controller
{
    public function order_trailer(Request $request)
    {
        Validations::order_trailer($request);
        try {
            $user_id = Auth::id();
            //old work here==========================================================================
            // $hire_time = explode(' - ', trim($request->date));
            // $start_time = date('Y-m-d h:i A', strtotime("$hire_time[0] $request->start_time"));
            // $end_time = date('Y-m-d h:i A', strtotime("$hire_time[1] $request->end_time"));
            // $start_date = strtotime($hire_time[0]);
            // $end_date = strtotime($hire_time[1]);

            //new work here ========================================================================
            $hire_time=[];
            $hire_time[]=$request->s_date;
            $hire_time[]=$request->e_date;
            $start_time = date('Y-m-d h:i A', strtotime("$request->s_date $request->start_time"));
            $end_time = date('Y-m-d h:i A', strtotime("$request->e_date $request->end_time"));
            
            $trailor = $this->getTrailerById($request->trailer_id);
            $user = $this->getUserById($user_id);
            return view('frontend.book_trailer', compact('hire_time', 'start_time', 'end_time', 'trailor', 'user'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return Redirect::back();
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

    //check Date 
    public function check_date(Request $request)
    {
        // dd($request->all());
        $hire_time = explode(' - ', trim($request->c_date));
        $start_time = date('Y-m-d', strtotime("$hire_time[0]"));
        $end_time = date('Y-m-d', strtotime("$hire_time[1]"));
        if ($start_time == $end_time) {
            $start_date = strtotime("$hire_time[0]");
            //dd($hire_time[0]);
            $disable_time = Order::where('trailer_id', $request->trailer_id)->where('start_date', $hire_time[0])->orWhere('end_date', $hire_time[1])->get();
            $start_time = array();
            $end_time = array();
            // dd($disable_time);
            foreach ($disable_time as $disable_t) {
                // dd(\Carbon\Carbon::parse($disable_t->start_time)->format('Y-m-d H:i:s'));
                $start_time[] = \Carbon\Carbon::parse($disable_t->start_time)->format('h:i A');
                $start_time[] = \Carbon\Carbon::parse($disable_t->end_time)->format('h:i A');
            }
            if (count($disable_time) > 0) {
                return response()->json([
                    'success' => true,
                    'message' => 'Select Time',
                    'data' => $start_time
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Select Time',
                    'data' => $disable_time
                ]);
            }
        } else {
            $start_date = strtotime("$hire_time[0]");
            $end_date = strtotime("$hire_time[1]");
            $disable_time = Order::where('trailer_id', $request->trailer_id)
                ->where([['start_date', '>=', $start_date], ['end_date', '<=', $end_date]])
                ->orWhere([['start_date', '<=', $start_date], ['end_date', '>=', $end_date]])
                ->orwhere([['start_date', '>=', $start_date], ['end_date', '<=', $end_date]])
                // ->orWhere([['start_date','>=' ,$end_date],['end_date','<=' , $end_date]])
                ->first();
            // dd($disable_time,$start_date,$end_date);
            // $disable_time = Order::where('start_date', $start_date)->get();
            // toastr()->error('Trailer already Booked in these Days.Kindly Select another date.');
            // dd($disable_time);
            if ($disable_time == null) {
                return response()->json([
                    'success' => true,
                    'message' => 'Select Time',
                    'data' => null
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Trailer already Booked in these Days.Kindly Select another date.',
                    'data' => null
                ]);
            }
        }
    }

    //check Date1 
    public function check_date1(Request $request)
    {
            $start_date = date('Y-m-d', strtotime($request->s_date));
            $disable_time = Order::where('trailer_id', $request->trailer_id)->where('start_date', $start_date)->get();      
            if(count($disable_time)>0)
            {
                    $disable_date = Order::where('trailer_id', $request->trailer_id)->orderBy('end_date','asc')->first();
                    $start_time = array();
                    foreach ($disable_time as $disable_t) {
                        $start_time[] = \Carbon\Carbon::parse($disable_t->start_time)->format('h:i A');
                        $start_time[] = \Carbon\Carbon::parse($disable_t->end_time)->format('h:i A');
                    }
                    if (count($disable_time) > 0) {
                        return response()->json([
                            'success' => true,
                            'message' => 'Select Time',
                            'data' => $start_time,
                            'pravioustime'=>false,
                             'disablednext'=>$disable_date->start_date ? $start_date:'' ,
                             'disabledpravious'=>$start_date,
                        ]);
                    } else {
                        return response()->json([
                            'success' => true,
                            'message' => 'Select Time',
                            'data' => $disable_time,
                            'pravioustime'=>false,
                        ]);
                    }
                
            }
           
            $disable_time = Order::where('trailer_id', $request->trailer_id)->where('end_date', $start_date)->first();
            if($disable_time)
            {
                $start_time = array();
                $start_time[] = \Carbon\Carbon::parse($disable_time->end_time)->format('h:i A');
                    return response()->json([
                        'success' => true,
                        'message' => 'Select Time',
                        'data' => $start_time,
                        'pravioustime'=>true,
                        'disabledpravious'=> $start_date,
                        'disablednext'=>'',
                    
                  ]);
            }
            else{
                $disable_time = Order::where('trailer_id', $request->trailer_id)->orderBy('end_date','asc')->first();
                $start_time[] = \Carbon\Carbon::parse($disable_time->start_time)->format('h:i A');
                $start_time = array();
                    return response()->json([
                        'success' => true,
                        'message' => 'Select Time',
                        'data' => $start_time,
                        'pravioustime'=>true,
                        'disabledpravious'=> $start_date,
                        'disablednext'=>'',
                    
                  ]);
             }
                 
                    
            
    }
    //check end date
    public function check_end_date(Request $request)
    {
        if($request->s_date!=$request->e_date)
        {
              return response()->json([
                            'success' => true,
                            'message' => 'Select Time',
                            'droptime'=> true,
                        ]);
        }
        else{
            
                $start_time = \Carbon\Carbon::parse($request->start_time)->format('h:i A');
                $start_date = $request->s_date;
                $disable_time = Order::where('trailer_id', $request->trailer_id)->where('start_date', $start_date)->first();

                if ($disable_time != null  && $start_time<$last_time) {
                    $disable_time = \Carbon\Carbon::parse($disable_time->start_time)->format('h:i A');
                    $data = [$disable_time, $request->pick_time];
                    return response()->json([
                        'success' => true,
                        'message' => 'Select Time',
                        'data' => $data
                    ]);
                } else {
                    $disable_time = null;
                    $data = [$disable_time,$request->pick_time];
                    return response()->json([
                        'success' => true,
                        'message' => 'No Time Disable on this date',
                        'data' => $data
                    ]);
                }
        }
    }

    public function check_drop_time(Request $request)
    {
        // dd($request->all());
        $hire_time = explode(' - ', trim($request->c_date));
        $start_time = \Carbon\Carbon::parse($request->pick_time)->format('h:i A');
        $end_time = \Carbon\Carbon::parse($hire_time[1])->format('h:i A');

        $start_date = strtotime("$hire_time[0]");
        $start_time = date('Y-m-d H:i:s', strtotime("$hire_time[0] $start_time"));
        $start_time = strtotime("$start_time");
        $disable_time = Order::where('trailer_id', $request->trailer_id)->where('start_date', $start_date)->where('start_time', '>', $start_time)->first();

        if ($disable_time != null) {
            $disable_time = \Carbon\Carbon::parse($disable_time->start_time)->format('h:i A');
            $data = [$disable_time, $request->pick_time];
            return response()->json([
                'success' => true,
                'message' => 'Click On Search Button',
                'data' => $data
            ]);
        } else {
            $disable_time = null;
            $data = [$disable_time, $request->pick_time];
            return response()->json([
                'error' => true,
                'message' => 'No Time Disable on this date',
                'data' => $data
            ]);
        }
    }


    public function check_drop_time1(Request $request)
    {
        $start_time = \Carbon\Carbon::parse($request->pick_time)->format('h:i A');
        $start_date = $request->s_date;
        //$start_time = date('Y-m-d H:i:s', strtotime("$request->s_date $start_time"));
        $start_time = strtotime("$start_time");
        $disable_time = Order::where('trailer_id', $request->trailer_id)->where('start_date', $start_date)->first();
        $last_time=strtotime(\Carbon\Carbon::parse($disable_time->start_time)->format('h:i A'));
        
        if ($disable_time != null && $start_time<$last_time) {
            $disable_time = \Carbon\Carbon::parse($disable_time->start_time)->format('h:i A');
            $data = [$disable_time, $request->pick_time];
            return response()->json([
                'success' => true,
                'message' => 'Click On Search Button',
                'data' => $data
            ]);
        } else {
            $disable_time = null;
            $data = [$disable_time, $request->pick_time];
            return response()->json([
                'error' => true,
                'message' => 'No Time Disable on this date',
                'data' => $data
            ]);
        }
    }


   
    //store driving licence
    public function store_licence(Request $request)
    {
        $rules = array('driving_licence' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Input filed required',
                'data' => null,
                'redirectURL' => '',
            ], 400);
        }
        $code = $request->code;
        try {
            $user_id = Auth::id();
            $user = $this->getUserById($user_id);
            if ($request->hasfile('driving_licence')) {
                $filePath = 'uploads/driving_licence/';
                $image_name = HelperFunctions::saveFile(null, $request->file('driving_licence'), $filePath);
                $user->driving_licence = $image_name;
                $user->save();
            }

            if ($request->code) {
                $couponsData = Coupon::where(['code' => $request->code])->first();
                if ($couponsData) {
                    if ($couponsData->toal_count > $couponsData->use_count) {
                        $value = $couponsData->value;
                    } else {
                        return response()->json([
                            'status' => 'Error',
                            'message' => 'Coupon EXpired or Max count reached',
                            'data' => null,
                            'redirectURL' => '',
                        ], 400);
                    }
                } else {
                    return response()->json([
                        'status' => 'Error',
                        'message' => 'Coupon Code not found',
                        'data' => null,
                        'redirectURL' => '',
                    ], 400);
                }
            }

            $this->successResponse($user, 'Driving Licence Uploaded', 200);
        } catch (\Exception $exception) {
            $this->errorResponse('Something Went Wrong', 400);
        }
    }

    //check coupon
    public function checkcoupon(Request $request)
    {
        if ($request->code) {
            //check coupon code
            $couponsData = Coupon::where(['code' => $request->code])->first();
            if ($couponsData) {
                if ($couponsData->toal_count > $couponsData->use_count) {
                    $value = $couponsData->value;
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Coupon Applied',
                        'data' => $value,
                        'redirectURL' => '',
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 'Error',
                        'message' => 'Coupon Not Valid',
                        'data' => null,
                        'redirectURL' => '',
                    ], 400);
                }
            } else {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Coupon Code Invalid',
                    'data' => null,
                    'redirectURL' => '',
                ], 400);
            }
        } else {
            return response()->json([
                'status' => 'Error',
                'message' => 'Coupon Not Found',
                'data' => null,
                'redirectURL' => '',
            ], 400);
        }
    }

    public function order_checkout(Request $request)
    {
        $trailer_id = $request->trailer_id;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $code = $request->code;
        $value = '';
        if ($code) {
            $couponsData = Coupon::where(['code' => $request->code])->first();
            if ($couponsData) {
                if ($couponsData->toal_count > $couponsData->use_count) {
                    $value = $couponsData->value;
                }
            }
        }
        return view('frontend.order-checkout', compact('value', 'trailer_id', 'start_time', 'end_time', 'start_date', 'end_date', 'code'));
    }
    //submit order
    public function orderSubmit(Request $request)
    {
        $amount = $request->amount;
        $amount = $amount + 150;
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripedata = Stripe\Charge::create([
                "amount" => $amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "This payment is for obaid purpose"
            ]);
            if ($stripedata->status == "succeeded") {
                $user_id = Auth::id();
                $user = $this->getUserById($user_id);
                $order = new Order();
                $order->user_id = $user_id;
                $order->trailer_id = $request->trailer_id;
                $order->amount = $request->amount;
                $order->charges = 150;
                $order->start_time = $request->start_time;
                $order->end_time = $request->end_time;
                $order->start_date = $request->start_date;
                $order->end_date = $request->end_date;
                $order->payment_status = 1;
                $order->payment_method = "Stripe";
                $order->status = "New Order";
                if ($request->code) {
                    $coupon = Coupon::where(['code' => $request->code])->first();
                    $order->coupon_id = $coupon->id;
                    $order->discount_price = $coupon->value;
                }

                if ($order->save()) {
                    $orderData = Order::with('user', 'trailer')->find($order->id);
                    $start_time = date('Y-m-d h:i A', strtotime("$order->start_date $request->start_time"));
                    $end_time = date('Y-m-d h:i A', strtotime("$order->end_date $request->end_time"));
                    $hours = HelperFunctions::getHirePeriodTimes($start_time, $end_time);
                    return view('frontend.order-sucess', compact('orderData', 'hours'));
                }
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'ERROR .. !  ' . $exception->getMessage() . '.');
        }
    }

    //order success
    public function orderSuccess($orderid = null)
    {
        $orderData = Order::with('user', 'trailer')->find($orderid);
        return view('frontend.order-sucess', compact('orderData'));
    }
    //User Bookings
    public function UserBooking(Request $request)
    {
        try {
            if (isset($request->trailer) || isset($request->sort)) {
                $sort = $request->sort == "" ? 'asc' : $request->sort;
                if (!empty($request->trailer)) {
                    $orderData = Order::with('user', 'trailer')->where(['user_id' => Auth::id(), 'trailer_id' => $request->trailer])->orderBy('id', $sort)->get();
                } else {
                    $orderData = Order::with('user', 'trailer')->where(['user_id' => Auth::id()])->orderBy('id', $sort)->get();
                }
            } else {
                $orderData = Order::with('user', 'trailer')->where(['user_id' => Auth::id()])->get();
            }
            $trailer = Trailer::get();
            return view('frontend.userDashboard.my_booking', compact('orderData', 'trailer'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'ERROR .. !  ' . $exception->getMessage() . '.');
        }
    }

    public function destroy(Request $request, $order)
    {
        try {
            Order::find($order)->delete();
            return redirect()->back()->with('success', 'Success .. ! Order Deleted');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'ERROR .. !  ' . $exception->getMessage() . '.');
        }
    }

    //paypal transaction
    public function paypal_transaction(Request $request)
    {
    }
    //refund trailer
    public function refund_trailer()
    {
        return view('frontend.upload_photo');
    }

    //upload photo and return trailer
    public function OrderReturnTrailer(Request $request, $id)
    {
        return view('frontend.photo_uploaded', compact('id'));
    }

    //upload photo
    public function Order_Trailer_Upload_Photo(Request $request)
    {
        $request->validate([
            'images.*' => 'required|mimes:jpeg,png,PNG,jpg,gif|min:1',

        ]);
        //upload car images
        $image_links = [];
        if ($request->file('images')) {
            $files = $request->file('images');
            foreach ($files  as $key => $file) {
                $filePath = 'uploads/trailer/images/';
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $image_links[] = $imagename;
            }
        }
        $model = new OrderReturnTrailerImage();
        $model->images = json_encode($image_links);
        $model->user_id = Auth::user()->id;
        $model->order_id = $request->order_id;
        if ($model->save()) {
            Order::find($request->order_id)->update(['status' => 'Refund Request']);
            \Mail::to('admin@gmail.com')->send(new TrailerRefunMail());
            return redirect('User/my_booking')->with('sucess', 'Success .. !  Images Uploaded');
        }
    }
}
