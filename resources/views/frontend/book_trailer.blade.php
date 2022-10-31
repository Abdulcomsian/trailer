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
                            @if(Auth::user()->hasRole('User'))
                            <li><a class="dropdown-item" href="{{ route('dashboard.profile') }}">Profile</a>
                                <hr class="mx-1 my-0">
                            </li>
                            <li><a class="dropdown-item" href="{{url('User/my_booking')}}">Return Trailer</a>
                                <hr class="mx-1 my-0">
                            </li>
                            @elseif(Auth::user()->hasRole('Admin'))
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                <hr class="mx-1 my-0">
                            </li>
                            @endif
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
                                        {{--@if($periodTimes['hire_period'] > 0)
                                        {{ $periodTimes['hire_period'] }} days
                                        @else--}}
                                        @if($periodTimes['hire_hours'] > 0)
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
                    <form id="driving_licence_form" action="{{route('store-licence')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">

                            @if($user->driving_licence == null)
                            <label for="exampleFormControlInput1" class="form-label">
                                <img src="{{asset('assets/img/label_icon1.png') }}" alt="label">
                                Driver’s Licence
                            </label>
                            <input type="file" class="form_control py-1" id="exampleFormControlInput1" name="driving_licence" placeholder="Upload Photo" accept="image/*">
                            <span class="text-danger driving_licence_valid">
                                {{$errors->first('driving_licence')}}
                            </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">
                                <!-- <img src="img/label_icon2.png" alt="label">  -->
                                <img src="{{asset('assets/img/label_icon2.png') }}" alt="label">
                                Promo code
                            </label>
                            <input type="text" class="form_control" name="code" id="exampleFormControlInput1" placeholder="Enter promo code (if any)">
                            <span class="text-danger code_valid">

                            </span>
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
                                @if($user->driving_licence == null)
                                <button type="submit" class="btn btn_yellow ms-2" style="cursor: not-allowed; opacity:0.7;" id="continue" disabled>CONTINUE</button>
                                @else
                               <button class="btn btn_yellow ms-2" style="cursor: not-allowed; opacity:0.7;" disabled id="continue" onclick="navigate('content2','checkcoupon')">CONTINUE</button>
                                @endif
                            </div>
                        </div>
                    </form>

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
    <!-- load jquery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script src="https://www.paypal.com/sdk/js?client-id=Aae4GB5knrVLrqV6EpSXQMJkNbM3kaa6bGLTbGX0vkRUWn19sH-pDWUgmY72qhsGBuU402gTwIppueK1&currency=EUR"></script>
    <script src="https://js.stripe.com/v3/"></script> -->
    <script>
        function navigate(content, $checkcoupon) {
            if ($checkcoupon == 'checkcoupon') {
                let code = $("input[name='code']").val();
                if (code) {
                    $.ajax({
                        type: "get",
                        url: "{{ route('checkcoupon') }}",
                        data: {
                            code
                        },
                        success: function(data) {
                            var reloadurl = "{{url('User/order-checkout')}}?trailer_id={{$trailor->id}}&start_time={{$pickup_time}}&end_time={{$dropoff_time}}&start_date={{$hire_time[0]}}&end_date={{$hire_time[1]}}&code=" + code;
                            window.location.href = reloadurl;

                        },
                        error: function(err) {
                            console.log(err);
                            $('.code_valid').text(err.responseJSON.message);
                        }
                    });
                } else {
                    var reloadurl = "{{url('User/order-checkout')}}?trailer_id={{$trailor->id}}&start_time={{$pickup_time}}&end_time={{$dropoff_time}}&start_date={{$hire_time[0]}}&end_date={{$hire_time[1]}}&code="
                    window.location.href = reloadurl;
                }
            }

        }
        $('#flexCheckDefault').change(function(e) {
            if (e.target.checked) {
                $('#continue').css({
                    'opacity': '1',
                    'cursor': 'default'
                });
                $("#continue").removeAttr('disabled');
            } else {
                $('#continue').css({
                    'opacity': '0.7',
                    'cursor': 'not-allowed'
                });
                $("#continue").attr('disabled','disabled');
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
                    var reloadurl = "{{url('User/order-checkout')}}?trailer_id={{$trailor->id}}&start_time={{$pickup_time}}&end_time={{$dropoff_time}}&start_date={{$hire_time[0]}}&end_date={{$hire_time[1]}}"
                    window.location.href = reloadurl;
                },
                error: function(err) {
                    $('.driving_licence_valid').text(err.responseJSON.message);
                }
            });
        });
    </script>
</body>

</html>