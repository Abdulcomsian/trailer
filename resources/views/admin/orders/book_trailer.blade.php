@extends('layouts.Backend.master')
@section('title')
Admin Orders
@endsection
@section('css')
@include('layouts.sweetalert.sweetalert_css')
<style type="text/css">
    p{
        color:black !important;
    }
</style>
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
                <div class="card-body pt-0">
                    <div class="specifi">
                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <p>Type: {{$trailor->trailer_name}}</p>
                            </div>
                            <div class="col-lg-6">
                                @php
                                $pickup_time = \Carbon\Carbon::parse($start_time)->format('h:i A');
                                $dropoff_time = \Carbon\Carbon::parse($end_time)->format('h:i A');
                                $periodTimes=App\Utils\HelperFunctions::getHirePeriodTimes($start_time,$end_time);
                                $payment=App\Utils\HelperFunctions::getPaymentByHours($periodTimes['hire_hours'],$trailor->id);
                                @endphp
                                <p>Hire Period:
                                    
                                        {{--@if($periodTimes['hire_period'] > 0)
                                        {{ $periodTimes['hire_period'] }} days
                                        @else--}}
                                        @if($periodTimes['hire_hours'] > 0)
                                        {{$periodTimes['hire_hours']}} hrs @if($periodTimes['hire_mins'] % 60 > 0) {{$periodTimes['hire_mins']%60}} mins @endif
                                        @else
                                        {{$periodTimes['hire_mins']}} mins
                                        @endif
                                    
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <p>Pick Date: {{$start_date}}</p>
                            </div>
                            <div class="col-lg-6">
                                <p>Dropoff Date: {{$end_date}}</p>
                            </div>
                            <div class="col-lg-6">
                                <p>Pickup Time: {{ $pickup_time }}</p>
                            </div>
                            <div class="col-lg-6">
                                <p>Dropoff Time: {{ $dropoff_time }}</p>
                            </div>
                            

                        </div>
                        <div class="payment_form">
                            <div class="d-flex justify-content-between">
                                <p>Trailer payment:</p>
                                <p id="trailer-payment" data-val="{{$payment}}">${{$payment}}</p>
                            </div>
                            <div class="d-flex justify-content-between borderBottom">
                                <p>Bond charges (Refundable):</p>
                                <p>$150</p>
                            </div>
                            <div class="d-flex mt-2 justify-content-between">
                                <p class="mb-0"><b>Total:</b></p>
                                <p class="mb-0"><b id="total">${{(float)$payment+150}}</b></p>
                            </div>
                        </div>
                    </div>
                    <p class="s_des mt-2">Note: The trailer address will be shared with you via email after booking
                        your trailer for rent.</p>
                    <form  action="{{route('admin.order.submit')}}" method="post" enctype="multipart/form-data" id="payment-form">
                        @csrf
                        <input type="hidden" name="amount" value="{{(float)$payment}}" />
                        <input type="hidden" name="trailer_id" value="{{$trailor->id}}" />
                        <input type="hidden" name="start_time" value="{{$pickup_time}}" />
                        <input type="hidden" name="end_time" value="{{$dropoff_time}}" />
                        <input type="hidden" name="start_date" value="{{$start_date}}" />
                        <input type="hidden" name="end_date" value="{{$end_date}}" />
                        <select class="form-control" name="user" required>
                            <option value="">Select User</option>
                            @foreach($users as $us)
                            <option value="{{$us->id}}">{{$us->name}}</option>
                            @endforeach
                        </select>
                        <!-- <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div id="paypal-button-container" class="d-none">
                                </div>
                                <div class="card">
                                    
                                    <div class="form-group">
                                        <div class="card-header text-warning">
                                            <label for="card-element">
                                                Enter your credit card information
                                            </label>
                                        </div>
                                        <div class="card-body">
                                            <div id="card-element">
                                               
                                            </div>

                                           
                                            <div id="card-errors" role="alert"></div>

                                        </div>
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="buttons mt-5 d-flex align-items-start justify-content-between">
                            <div class="btns d-flex align-items-center">
                                <button type="submit" class="btn btn_yellow ms-2">Submit ${{(float)$payment+150}}</button>
                            
                            </div>
                        </div>
                    </form>
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
<script src="https://js.stripe.com/v3/"></script>
     <script>
        $(document).ready(function() {
            var stripe = Stripe('pk_test_9y4Gd3xTRMGZOq1vAXtSjrZ1');
            var elements = stripe.elements();
            // Custom styling can be passed to options when creating an Element.
            var style = {
                base: {
                    color: "#32325d",
                    fontFamily: 'Arial, sans-serif',
                    fontSmoothing: "antialiased",
                    fontSize: "16px",
                    "::placeholder": {
                        color: "#32325d"
                    }
                },
                invalid: {
                    fontFamily: 'Arial, sans-serif',
                    color: "#fa755a",
                    iconColor: "#fa755a"
                }
            };
            // Create an instance of the card Element.
            var card = elements.create('card', {
                hidePostalCode: true,
                style: style
            });
            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');
            // Create a token or display an error when the form is submitted.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the customer that there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                hiddenInput.setAttribute('style', "border:1px");
                form.appendChild(hiddenInput);
                // Submit the form
                form.submit();
            }
        })
    </script>

@endsection