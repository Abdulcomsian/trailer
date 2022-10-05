<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trailer | Home</title>

    <!-- bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome 5 CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css">

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
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <!-- img --> <img src="{{asset('assets/img/menu.png') }}" alt="menu"> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex align-items-center ms-auto">
                    <a href="{{url('/contact_us')}}" class="mx-2 me-3 btn btn_yellow">Contact</a>
                    <!-- <a href="#"><img src="img/user.png" alt="user"></a> -->
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
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
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    >
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
                                    dd($start_time);
                                    $start_date = date('Y-m-d h:i A ', $start_time);
                                   
                                    $start_date = \Carbon\Carbon::parse($start_date);
                                    $end_date = date('Y-m-d h:i A ', $end_time);
                                    $end_date = \Carbon\Carbon::parse($end_date);
                                    // dd($start_date, $end_date);
                                    $hire_period = $start_date->diffInDays($end_date, false);
                                    $hire_hours = $start_date->diffInHours($end_date, false);
                                    $hire_mins = $start_date->diffInMinutes($end_date, false);

                                @endphp
                                <p>Hire Period: 
                                    <span>
                                        @if($hire_period > 0)
                                        {{ $hire_period }} days
                                        @elseif($hire_hours > 0)
                                        {{$hire_hours}} hrs
                                        @else
                                        {{$hire_mins}} mins
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
                    <form id="driving_licence_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- <input type="hidden" name="order_id" value="{{ $order->id }}" /> -->
                        <div class="mb-3">
                            
                            @if($user->driving_licence == null)
                            <label for="exampleFormControlInput1" class="form-label"> 
                                <!-- <img src="img/label_icon1.png" alt="label"> -->
                                <img src="{{asset('assets/img/label_icon1.png') }}" alt="label">
                                     Driver’s Licence
                            </label>
                            <input type="file" class="form_control py-1" id="exampleFormControlInput1" name="driving_licence" placeholder="Upload Photo" accept="image/*">
                            <span class="text-danger driving_licence_valid">{{$errors->first('driving_licence')}}</span>
                            {{-- @else --}}
                            <!-- <label for="exampleFormControlInput1" class="form-label"> 
                                
                                <img src="{{asset('assets/img/label_icon1.png') }}" alt="label">
                                     Driver’s Licence (Already Uploaded)
                            </label>
                            <input type="file" disabled class="form_control py-1" id="exampleFormControlInput1" name="driving_licence" placeholder="Upload Photo" accept="image/*">
                            <span class="text-danger driving_licence_valid">{{$errors->first('driving_licence')}}</span> -->
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"> 
                                <!-- <img src="img/label_icon2.png" alt="label">  -->
                                <img src="{{asset('assets/img/label_icon2.png') }}" alt="label">
                                Promo code</label>
                            <input type="email" class="form_control" id="exampleFormControlInput1"
                                placeholder="Enter promo code (if any)">
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
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span for="#">1/3</span>
                            </div>
                            <div class="btns d-flex align-items-center">
                                <a href="#" class="btn link text-white">GO BACK</a>
                                @if($user->driving_licence == null)
                                <button type="submit" class="btn btn_yellow ms-2" style="cursor: not-allowed; opacity:0.7;" id="continue" 
                                {{-- onclick="navigate('content2')" --}}
                                >CONTINUE</button>
                                @else
                                <a href="#" class="btn btn_yellow ms-2" style="cursor: not-allowed; opacity:0.7;" id="continue" 
                                onclick="navigate('content2')"
                                >CONTINUE</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <!-- 2 -->
                <div class="side_content content2 d-none">
                    <h2 class="head">Payment Method</h2>
                    <div class="payment_form">
                        <div class="d-flex justify-content-between">
                            <p>Trailer payment:</p>
                            <p>
                                @if($hire_hours == 0 || $hire_hours <= 6)
                                    $60
                                @elseif($hire_hours >= 6 || $hire_hours <= 12)
                                    $70
                                @elseif($hire_hours >= 12 || $hire_hours <= 24)
                                    $80
                                @elseif($hire_period == 2)
                                    $150
                                @elseif($hire_period == 3)
                                    $210
                                @elseif($hire_period == 4)
                                    $260
                                @elseif($hire_period == 5)
                                    $300
                                @elseif($hire_period >= 5)
                                    $500
                                @endif
                            </p>
                        </div>
                        <div class="d-flex justify-content-between borderBottom">
                            <p>Bond charges (Refundable):</p>
                            <p>$150</p>
                        </div>
                        <div class="d-flex mt-2 justify-content-between">
                            <p class="mb-0"><b>Total:</b></p>
                            <p class="mb-0"><b>$210</b></p>
                        </div>
                    </div>
                    <form>
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
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Card Name:</label>
                            <input type="email" class="form_control" id="exampleFormControlInput1"
                                placeholder="Enter card holder name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Card Number:</label>
                            <input type="email" class="form_control" id="exampleFormControlInput1"
                                placeholder="####-####-####-####">
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Expiration Date:</label>
                                    <input type="email" class="form_control" id="exampleFormControlInput1"
                                        placeholder="MM/YY">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">CCV:</label>
                                    <input type="email" class="form_control" id="exampleFormControlInput1"
                                        placeholder="###">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="buttons mt-5 d-flex align-items-start justify-content-between">
                        <div class="progress_bar text-center mt-2">
                            <div class="progress" style="width: 90px;height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span for="#">2/3</span>
                        </div>
                        <div class="btns d-flex align-items-center">
                            <a href="#" class="btn link text-white" onclick="navigate('content1')">GO BACK</a>
                            <a href="#" class="btn btn_yellow ms-2"  onclick="navigate('content3')">Pay $210</a>
                        </div>
                    </div>
                </div>
                <!-- 3 -->
                <div class="side_content content3 d-none">
                    <div class="congrats_box d-flex align-items-center justify-content-center flex-column">
                        <!-- <img src="img/congrats.png" alt="congrats"> -->
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
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span for="#">3/3</span>
                        </div>
                        <div class="btns d-flex align-items-center">
                            <a href="#" class="btn link text-white" onclick="navigate('content2')">GO BACK</a>
                            <a href="#" class="btn btn_yellow ms-2" >Pay $210</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 p-0">
                <div class="img">
                    <!-- <img src="img/car_main.png" class="w-100" alt="car"> -->
                    <img src="{{asset('assets/img/car_main.png') }}" class="w-100" alt="car">
                </div>
            </div>
        </div>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


   <!-- load jquery 3 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function navigate(content) {
            // alert(content);
            $('.side_content').addClass('d-none');
            $(`.${content}`).removeClass('d-none');
        }

        $('#flexCheckDefault').change(function(e) {  
            console.log(e.target.checked);
            if(e.target.checked)
            {
                $('#continue').css({'opacity':'1', 'cursor':'default'});
            }
            else{
                $('#continue').css({'opacity':'0.7', 'cursor':'not-allowed'});
            }
        });


        $('#driving_licence_form').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ route('store-licence') }}",
            data: new FormData(this),
            datatype: "json",
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                console.log("Success");
                $('.side_content').addClass('d-none');
                $('.content2').removeClass('d-none');
                

            },
            error: function (data) {
                    $('.driving_licence_valid').text(data?.responseJSON?.errors?.driving_licence);
            }
        });
    });

    </script>
</body>

</html>