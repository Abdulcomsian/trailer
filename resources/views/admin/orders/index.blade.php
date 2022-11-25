@extends('layouts.Backend.master')
@section('title')
Admin Orders
@endsection
@section('css')
@include('layouts.sweetalert.sweetalert_css')
@endsection
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">

                        <form method="get" action="{{url('admin/orders')}}" id="order_status_form" style="width:250px">
                            <select name="status" id="status" class="form-select form-control">
                                <option value="New Order" {{isset($_GET['status']) && $_GET['status']=='New Order' ? 'selected':''}}>New Order</option>
                                <option value="Pick Up" {{ isset($_GET['status']) && $_GET['status']=='Pick Up' ? 'selected':''}}>Picked up</option>
                                <option value="Refund Request" {{isset($_GET['status']) && $_GET['status']=='Refund Request' ? 'selected':''}}>Refund Request</option>
                                <option value="Completed" {{ isset($_GET['status']) && $_GET['status']=='Completed' ? 'selected':''}}>Completed</option>
                            </select>
                        </form>

                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="table-responsive">

                        <table class="table bookingTable">
                            <thead>
                                <tr>
                                    <th scope="col">Trailer Type</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Pickup Time</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Dropoff Time</th>
                                    <th scope="col">Hire Period</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Charges</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Order Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderData as $order)
                                @php
                                $start_time = date('Y-m-d h:i A', strtotime("$order->start_date $order->start_time"));
                                $end_time = date('Y-m-d h:i A', strtotime("$order->end_date $order->end_time"));
                                $periodTimes=App\Utils\HelperFunctions::getHirePeriodTimes($start_time, $end_time);
                               
                                @endphp
                                <tr>
                                    <td>{{$order->trailer->trailer_name ?? '-'}}</td>
                                    <td>{{date('Y-m-d',strtotime($order->start_date))}}</td>
                                    <td>{{$order->start_time}} </td>
                                    <td>{{date('Y-m-d',strtotime($order->end_date))}}</td>
                                    <td>{{date('h:i A',strtotime('-1 minutes',strtotime($order->end_time)))}}</td>
                                    <td>
                                       {{-- @if($periodTimes['hire_period'] > 0)
                                        {{ $periodTimes['hire_period'] }} days
                                        @else--}}
                                        @if($periodTimes['hire_hours'] > 0)
                                        {{$periodTimes['hire_hours']}} hrs {{-- @if($periodTimes['hire_mins'] % 60 > 0) {{$periodTimes['hire_mins']%60}} mins @endif --}}
                                        @else
                                        {{$periodTimes['hire_mins']}} mins
                                        @endif
                                    </td>
                                    <td>${{$order->amount}}</td>
                                    <td>${{$order->charges}}</td>
                                    <td>${{$order->discount_price ?? '0.00'}}</td>
                                    <td>{{$order->payment_method}}</td>
                                    <td>{{$order->payment_status == 1 ? 'Paid':'Unpaid'}}</td>
                                    <td><span class="text-success">{{$order->status}}</span></td>
                                    <td>
                                        <!-- <a href="{{url('User/Order/return-trailer',$order->id)}}">
                                            <i class="fa fa-undo" aria-hidden="true"></i>
                                        </a> -->
                                        <!--  <form id="form_{{$order->id}}" action="{{url('User/delete-booking',$order)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="{{$order->id}}" class="confirm"><span class="text-danger fa fa-trash"></span></button>

                                            </form>
                                            <form id="refundform_{{$order->id}}" action="{{url('User/refund-booking')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$order->id}}">
                                                <button type="submit" id="{{$order->id}}" data-type="refund" class="confirm" title="Refund">
                                                    <i class="fa fa-undo"  aria-hidden="true" ></i>
                                                </button>

                                            </form> -->
                                        @if($order->status=="Refund Request")
                                        <a href="{{url('admin/order-return-view',$order->id)}}"><i class="fa fa-eye"></i></a>
                                        @endif
                                        @if($order->status=="Pick Up")
                                        <a href="{{url('admin/order-pick-view',$order->id)}}"><i class="fa fa-eye"></i></a>
                                        @endif
                                        @if(isset($_GET['status']) && $_GET['status']=='Refund Request')
                                        <form id="completeform_{{$order->id}}" action="{{url('admin/order-completed')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$order->id}}">
                                            <button type="submit" id="{{$order->id}}" data-type="complete" title="Refund">
                                                <i class="fa fa-undo confirm1" aria-hidden="true"></i>
                                            </button>

                                        </form>
                                        @endif


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 d-flex" style="margin-bottom:10px">
                        {{$orderData->links("pagination::bootstrap-4")}}
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection
@section('script')
@include('layouts.sweetalert.sweetalert_admin_js')
<script>
    $("#status").change(function() {
        $("#order_status_form").submit();
    })
</script>
@endsection