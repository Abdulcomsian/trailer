@extends('layouts.UserBackend.master')
@section('title')
Trailer | My Booking
@endsection
@section('css')
@include('layouts.sweetalert.sweetalert_css')
@endsection
@section('content')
<main class="dashboad_main">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                {{-- sidebar --}}
                @include('layouts.UserBackend.side-bar')
            </div>
            <div class="col-lg-9">
                <div class="filter_field d-flex justify-content-end">
                    <div class="filter">
                        <form method="get" action="{{url('User/my_booking')}}" id="form">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Trailer Type</label>
                                        <!-- select -->
                                        <select class="form-select" name="trailer" id="filter_trailer" aria-label="Default select example">
                                            <option value="">Select an option </option>
                                            @foreach($trailer as $tr)
                                            <option value="{{$tr->id}}" {{request()->get('trailer') == $tr->id ? 'selected':''}}>{{$tr->trailer_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Sort By</label>
                                        <!-- select -->
                                        <select class="form-select" name="sort" id="filter_sort" aria-label="Default select example">
                                            <option value="">Select an option </option>
                                            <option value="asc" {{request()->get('sort') == 'asc' ? 'selected':''}}>Asc</option>
                                            <option value="desc" {{request()->get('sort') == 'desc' ? 'selected':''}}>Desc</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">New Booking</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Refund Requests</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="false">Completed</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                    $periodTimes=App\Utils\HelperFunctions::getHirePeriodTimes($order->start_time,$order->end_time);

                                    @endphp
                                    @if($order->status=="New Order")
                                    <tr>
                                        <td>{{$order->trailer->trailer_name ?? '-'}}</td>
                                        <td>{{date('Y-m-d',strtotime($order->start_date))}}</td>
                                         <td>{{$order->start_time}} </td>
                                        <td>{{date('Y-m-d',strtotime($order->end_date))}}</td>
                                        <td>{{$order->end_time}}</td>
                                        <td>
                                            @if($periodTimes['hire_period'] > 0)
                                            {{ $periodTimes['hire_period'] }} days
                                            @elseif($periodTimes['hire_hours'] > 0)
                                            {{$periodTimes['hire_hours']}} hrs @if($periodTimes['hire_mins'] % 60 > 0) {{$periodTimes['hire_mins']%60}} mins @endif
                                            @else
                                            {{$periodTimes['hire_mins']}} mins
                                            @endif
                                        </td>
                                        <td>${{$order->amount}}</td>
                                        <td>${{$order->charges}}</td>
                                        <td>${{$order->discount_price}}</td>
                                        <td>{{$order->payment_method}}</td>
                                        <td>{{$order->payment_status == 1 ? 'Paid':'Unpaid'}}</td>
                                        <td><span class="text-success">{{$order->status}}</span></td>
                                        <td>
                                            <a href="{{url('User/Order/return-trailer',$order->id)}}">
                                                <i class="fa fa-undo" aria-hidden="true"></i>
                                            </a>
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


                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                                    $periodTimes=App\Utils\HelperFunctions::getHirePeriodTimes($order->start_time,$order->end_time);

                                    @endphp
                                    @if($order->status=="Refund Request")
                                    <tr>
                                        <td>{{$order->trailer->trailer_name ?? '-'}}</td>
                                        <td>{{date('Y-m-d',strtotime($order->start_date))}}</td>
                                        <td>{{$order->start_time}} </td>
                                        <td>{{date('Y-m-d',strtotime($order->end_date))}}</td>
                                        <td>{{$order->end_time}}</td>
                                        <td>
                                            @if($periodTimes['hire_period'] > 0)
                                            {{ $periodTimes['hire_period'] }} days
                                            @elseif($periodTimes['hire_hours'] > 0)
                                            {{$periodTimes['hire_hours']}} hrs @if($periodTimes['hire_mins'] % 60 > 0) {{$periodTimes['hire_mins']%60}} mins @endif
                                            @else
                                            {{$periodTimes['hire_mins']}} mins
                                            @endif
                                        </td>
                                        <td>${{$order->amount}}</td>
                                        <td>${{$order->charges}}</td>
                                        <td>${{$order->discount_price}}</td>
                                        <td>{{$order->payment_method}}</td>
                                        <td>{{$order->payment_status == 1 ? 'Paid':'Unpaid'}}</td>
                                        <td><span class="text-success">{{$order->status}}</span></td>
                                        <td>

                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="table-responsive">
                            <table class="table bookingTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Trailer Type</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Pickup Time</th>
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
                                    $periodTimes=App\Utils\HelperFunctions::getHirePeriodTimes($order->start_time,$order->end_time);

                                    @endphp
                                    @if($order->status=="Completed")
                                    <tr>
                                        <td>{{$order->trailer->trailer_name ?? '-'}}</td>
                                        <td>{{date('Y-m-d',strtotime($order->start_date))}}</td>
                                        <td>{{date('Y-m-d',strtotime($order->end_date))}}</td>
                                        <td>{{$order->start_time}} </td>
                                        <td>{{$order->end_time}}</td>
                                        <td>
                                            @if($periodTimes['hire_period'] > 0)
                                            {{ $periodTimes['hire_period'] }} days
                                            @elseif($periodTimes['hire_hours'] > 0)
                                            {{$periodTimes['hire_hours']}} hrs @if($periodTimes['hire_mins'] % 60 > 0) {{$periodTimes['hire_mins']%60}} mins @endif
                                            @else
                                            {{$periodTimes['hire_mins']}} mins
                                            @endif
                                        </td>
                                        <td>${{$order->amount}}</td>
                                        <td>${{$order->charges}}</td>
                                        <td>${{$order->discount_price}}</td>
                                        <td>{{$order->payment_method}}</td>
                                        <td>{{$order->payment_status == 1 ? 'Paid':'Unpaid'}}</td>
                                        <td><span class="text-success">{{$order->status}}</span></td>
                                        <td>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
@include('layouts.sweetalert.sweetalert_js')
<script>
    $("#filter_trailer,#filter_sort").change(function() {
        $("#form").submit();

    })
</script>
@endsection