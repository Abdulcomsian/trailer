<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trailer | Home</title>

    <!-- bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome 5 CDN -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css"> -->

    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/media.css') }}">
</head>

<body class="form_page">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg inquiry_nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <!-- <img src="img/logo.png" alt="logo"> -->
                <img src="{{asset('assets/img/logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <!-- img --> <img src="{{asset('assets/img/menu.png') }}" alt="menu">
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex align-items-center ms-auto">
                    <a href="{{url('/contact_us')}}" class="mx-2 me-3 btn btn_yellow">Contact</a>
                    <!-- <a href="#"><img src="img/user.png" alt="user"></a> -->
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- <img src="img/user.png" alt="user"> -->
                            <img src="{{asset('assets/img/user.png') }}" alt="user">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('dashboard.profile') }}">Profile</a>
                                <hr class="mx-1 my-0">
                            </li>
                            <li><a class="dropdown-item" href="#">Return Trailer</a>
                                <hr class="mx-1 my-0">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <?php

    ?>
    <main class="inquiry_main">
        <div class="row mx-0">
            <div class="col-lg-5">
                <div class="side_content content1">
                    <h2 class="head">Book your trailer</h2>
                    <div class="specifi">
                        <div class="row">
                            <div class="col-lg-6">
                                <p>Type: <span>{{$trailor->trailer_name}}</span></p>
                            </div>
                            <div class="col-lg-6">
                                @php
                                $pickup_time = \Carbon\Carbon::parse($start_time)->format('h:i A');
                                $dropoff_time = \Carbon\Carbon::parse($end_time)->format('h:i A');
                                $periodTimes=App\Utils\HelperFunctions::getHirePeriodTimes($start_time,$end_time);
                                @endphp
                                <p>Hire Period:
                                    <span>
                                        @if($periodTimes['hire_period'] > 0)
                                        {{ $periodTimes['hire_period'] }} days
                                        @elseif($periodTimes['hire_hours'] > 0)
                                        {{$periodTimes['hire_hours']}} hrs @if($periodTimes['hire_mins'] % 60 > 0) {{$periodTimes['hire_mins']%60}} mins @endif
                                        @else
                                        {{$periodTimes['hire_mins']}} mins
                                        @endif
                                    </span>
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <p>Pickup Time: <span>{{ $pickup_time }} </span></p>
                            </div>
                            <div class="col-lg-6">
                                <p>Dropoff Time: <span>{{ $dropoff_time }}</span></p>
                            </div>
                        </div>
                    </div>
                    <p class="s_des mt-2">Note: The trailer address will be shared with you via email after booking
                        your trailer for rent.</p>
                        <!-- id="driving_licence_form" -->
                      <form  action="{{route('store-licence')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="hire_period" value="{{$periodTimes['hire_hours']}}">
                         <input type="hidden" name="trailer_id" value="{{$trailor->id}}" />
                         <input type="hidden" name="start_time" value="{{$pickup_time}}" />
                         <input type="hidden" name="end_time" value="{{$dropoff_time}}" />
                         <input type="hidden" name="start_date" value="{{$hire_time[0]}}" />
                         <input type="hidden" name="end_date" value="{{$hire_time[1]}}" />
                        <div class="mb-3">

                            {{-- @if($user->driving_licence == null) --}}
                            <label for="exampleFormControlInput1" class="form-label">
                                <img src="{{asset('assets/img/label_icon1.png') }}" alt="label">
                                Driver’s Licence
                            </label>
                            <input type="file" class="form_control py-1" id="exampleFormControlInput1" name="driving_licence" placeholder="Upload Photo" accept="image/*">
                            <span class="text-danger driving_licence_valid">
                                {{$errors->first('driving_licence')}}
                            </span>
                          {{--   @endif --}}
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">
                                <!-- <img src="img/label_icon2.png" alt="label">  -->
                                <img src="{{asset('assets/img/label_icon2.png') }}" alt="label">
                                Promo code
                            </label>
                            <input type="text" class="form_control" name="code" id="exampleFormControlInput1" placeholder="Enter promo code (if any)">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                I agree to <a href="#">Terms & Conditions</a>
                            </label>
                        </div>

                        <div class="buttons mt-5 d-flex align-items-start justify-content-between">
                            <div class="progress_bar text-center mt-2">
                                <div class="progress" style="width: 90px;height: 7px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span for="#">1/3</span>
                            </div>
                            <div class="btns d-flex align-items-center">
                                <a href="#" class="btn link text-white">GO BACK</a>
                                 <button type="submit" class="btn btn_yellow ms-2" style="cursor: not-allowed; opacity:0.7;" id="continue">CONTINUE</button>
                                @if($user->driving_licence == null)
                                <!-- <button type="submit" class="btn btn_yellow ms-2" style="cursor: not-allowed; opacity:0.7;" id="continue">CONTINUE</button> -->
                                @else
                                <!-- <a href="#" class="btn btn_yellow ms-2" style="cursor: not-allowed; opacity:0.7;" id="continue" onclick="navigate('content2','checkcoupon')">CONTINUE</a> -->
                                @endif
                            </div>
                        </div>
                     </form>
                    
                </div>
                <!-- 2 -->
                <!-- <div class="side_content content2 d-none">
                    <h2 class="head">Payment Method</h2>
                    <div class="payment_form">
                        <div class="d-flex justify-content-between">
                            <p>Trailer payment:</p>
                            @php
                            $payment=App\Utils\HelperFunctions::getPaymentByHours($periodTimes['hire_hours']);
                            @endphp
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

                    <div class="mb-3 mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Choose payment method:</label>
                        <div class="d-flex">
                            <div class="bank_cards me-2">
                                <a href="#" class="card_img">
                                    <img src="{{asset('assets/img/credit-card.png') }}" width="40" alt="paypal">
                                </a>
                            </div>
                            <div class="bank_cards me-2">
                                <a href="#" class="card_img">
                                    <img src="{{asset('assets/img/gpay.png') }}" width="80" alt="gpay">
                                </a>
                            </div>
                            <div class="bank_cards me-2">
                                <a href="#" class="card_img">
                                    <img src="{{asset('assets/img/paypal.png') }}" width="80" alt="paypal">
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('order.submit')}}" method="POST" id="payment-form">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                    <input type="hidden" name="amount" value="{{(float)$payment+150}}" />
                                    <input type="hidden" name="trailer_id" value="{{$trailor->id}}" />
                                    <input type="hidden" name="start_time" value="{{$pickup_time}}" />
                                    <input type="hidden" name="end_time" value="{{$dropoff_time}}" />
                                    <input type="hidden" name="start_date" value="{{$hire_time[0]}}" />>
                                    <input type="hidden" name="end_date" value="{{$hire_time[1]}}" />
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
                                            <input type="hidden" name="plan" value="{{Auth::user()->id}}" />
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                    </div>

                            </div>
                        </div>
                    </div>

                    <div class="buttons mt-5 d-flex align-items-start justify-content-between">
                        <div class="progress_bar text-center mt-2">
                            <div class="progress" style="width: 90px;height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span for="#">2/3</span>
                        </div>
                        <div class="btns d-flex align-items-center">
                            <a href="#" class="btn link text-white" onclick="navigate('content1','back')">GO BACK</a>
                            <button type="submit" class="btn btn_yellow ms-2" id="paybutton">Pay ${{(float)$payment+150}}</button>
                        </div>
                    </div>
                    </form>
                </div> -->
                <!-- 3 -->
                <!-- <div class="side_content content3 d-none">
                    <div class="congrats_box d-flex align-items-center justify-content-center flex-column">
                      
                        <img src="{{asset('assets/img/congrats.png') }}" alt="congrats">
                        <h1>Congratulations!</h1>
                        <p>You have successfully made payment
                            of <b class="text-white">2T Trailer</b> for <b class="text-white">24hrs</b> . We have sent
                            further details to your email <b class="text-white">johndoe@gmail.com</b>.
                            Please check your email</p>
                    </div>
                    <div class="buttons mt-5 d-flex align-items-start justify-content-between">
                        <div class="progress_bar text-center mt-2">
                            <div class="progress" style="width: 90px;height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span for="#">3/3</span>
                        </div>
                        <div class="btns d-flex align-items-center">
                            <a href="#" class="btn link text-white" onclick="navigate('content2','back')">GO BACK</a>
                            <a href="#" class="btn btn_yellow ms-2">Pay $210</a>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-7 p-0">
                <div class="img">
                    <!-- <img src="img/car_main.png" class="w-100" alt="car"> -->
                    <img src="{{asset('assets/img/car_main.png') }}" class="w-100" alt="car">
                </div>
            </div>
        </div>
    </main>
    <!-- load jquery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script src="https://www.paypal.com/sdk/js?client-id=Aae4GB5knrVLrqV6EpSXQMJkNbM3kaa6bGLTbGX0vkRUWn19sH-pDWUgmY72qhsGBuU402gTwIppueK1&currency=EUR"></script>
    <script src="https://js.stripe.com/v3/"></script> -->
    <script>
        function navigate(content,$checkcoupon) {
            if($checkcoupon=='checkcoupon')
            {
                let code=$("input[name='code']").val();
                if(code)
                {
                    $.ajax({
                    type: "get",
                    url: "{{ route('checkcoupon') }}",
                    data:{code},
                    success: function(data) {
                        console.log(data.data);
                         $('.side_content').addClass('d-none');
                         $(`.${content}`).removeClass('d-none');
                         alert("coupon applied");
                         let tprice=parseFloat($("#trailer-payment").attr('data-val'));
                         tprice=tprice-data.data;
                         $("#trailer-payment").text("$"+(tprice));
                         $("#total").text("$"+(parseInt(tprice)+parseInt(150)));
                         $("#paybutton").text('Pay $'+(parseInt(tprice)+parseInt(150)));
                         $("input[name='amount']").val(parseInt(tprice)+parseInt(150));
                         
                    },
                    error: function(err) {
                        console.log(err);
                       // $('.driving_licence_valid').text(err.responseJSON.message);
                    }
                });
                }
                else{
                     $('.side_content').addClass('d-none');
                     $(`.${content}`).removeClass('d-none');
                }
            }
            else{
              $('.side_content').addClass('d-none');
              $(`.${content}`).removeClass('d-none');   
            }
           
        }

        $('#flexCheckDefault').change(function(e) {
            if (e.target.checked) {
                $('#continue').css({
                    'opacity': '1',
                    'cursor': 'default'
                });
            } else {
                $('#continue').css({
                    'opacity': '0.7',
                    'cursor': 'not-allowed'
                });
            }
        });
        //driving licence submit form
        $('#driving_licence_form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('store-licence') }}",
                data: new FormData(this),
                datatype: "json",
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if(data.value)
                    {
                         let tprice=parseFloat($("#trailer-payment").attr('data-val'));
                         tprice=tprice-data.data;
                         $("#trailer-payment").text("$"+(tprice));
                         $("#total").text("$"+(parseInt(tprice)+parseInt(150)));
                         $("#paybutton").text('Pay $'+(parseInt(tprice)+parseInt(150)));
                         $("input[name='amount']").val(parseInt(tprice)+parseInt(150));

                    }
                    $('.side_content').addClass('d-none');
                    $('.content2').removeClass('d-none');
                },
                error: function(err) {
                    console.log(err.responseJSON);
                    $('.driving_licence_valid').text(err.responseJSON.message);
                }
            });
        });
    </script>
    <script>
        // $(document).ready(function() {
        //     var stripe = Stripe('pk_test_51H6zNfDIr4vVZ16GTMYDTcZb9IJpNuGaqT6b7oED9QQQ8cCtNqk0Nphoxo2p1YTT8ze35JGrjrtpiIOPIFxB2t22008OeJYgig');
        //     var elements = stripe.elements();
        //     // Custom styling can be passed to options when creating an Element.
        //     var style = {
        //         base: {
        //             color: "#32325d",
        //             fontFamily: 'Arial, sans-serif',
        //             fontSmoothing: "antialiased",
        //             fontSize: "16px",
        //             "::placeholder": {
        //                 color: "#32325d"
        //             }
        //         },
        //         invalid: {
        //             fontFamily: 'Arial, sans-serif',
        //             color: "#fa755a",
        //             iconColor: "#fa755a"
        //         }
        //     };

        //     // Create an instance of the card Element.
        //     var card = elements.create('card', {
        //         style: style
        //     });

        //     // Add an instance of the card Element into the `card-element` <div>.
        //     card.mount('#card-element');

        //     // Create a token or display an error when the form is submitted.
        //     var form = document.getElementById('payment-form');
        //     form.addEventListener('submit', function(event) {
        //         event.preventDefault();

        //         stripe.createToken(card).then(function(result) {
        //             if (result.error) {
        //                 // Inform the customer that there was an error.
        //                 var errorElement = document.getElementById('card-errors');
        //                 errorElement.textContent = result.error.message;
        //             } else {
        //                 // Send the token to your server.
        //                 stripeTokenHandler(result.token);
        //             }
        //         });
        //     });

        //     function stripeTokenHandler(token) {
        //         // Insert the token ID into the form so it gets submitted to the server
        //         var form = document.getElementById('payment-form');
        //         var hiddenInput = document.createElement('input');
        //         hiddenInput.setAttribute('type', 'hidden');
        //         hiddenInput.setAttribute('name', 'stripeToken');
        //         hiddenInput.setAttribute('value', token.id);
        //         hiddenInput.setAttribute('style', "border:1px");
        //         form.appendChild(hiddenInput);
        //         // Submit the form
        //         form.submit();
        //     }
        // })
    </script>
    <script>
        // paypal.Buttons({
        //     style: {
        //         layout: 'horizontal',
        //         fundingicons: 'true',
        //     },
        //     funding: {
        //         allowed: [paypal.FUNDING.CARD],

        //     },
        //     createOrder: function(data, actions) {
        //         return actions.order.create({
        //             purchase_units: [{
        //                 amount: {
        //                     value: '{{(float)$payment+150}}'
        //                 }
        //             }]
        //         });
        //     },
        //     onApprove: function(data, actions) {
        //         return actions.order.capture().then(function(details) {
        //             // Call your server to save the transaction
        //             return fetch('/paypal-transaction-complete', {
        //                 method: 'post',
        //                 headers: {
        //                     'content-type': 'application/json'
        //                 },
        //                 body: JSON.stringify({
        //                     amount:'{{(float)$payment+150}}',
        //                     trailerid:'{{$trailor->id}}',
        //                     _token: '{{csrf_token()}}'
        //                 })
        //             }).then(function() {
        //                 location.href = "{{url('booking/checkout')}}/1";
        //             });
        //         });
        //     }
        // }).render('#paypal-button-container');
        // $(window).scroll(function() {
        //     if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        //         if ($(".summary-bar-area").hasClass('open')) {
        //             $(".summary-bar-area").attr("style", "position:fixed;top:0px !important;z-index:999999");
        //         }
        //     } else {
        //         $(".summary-bar-area").attr("style", "");
        //     }
        //  });
    </script>
</body>

</html>