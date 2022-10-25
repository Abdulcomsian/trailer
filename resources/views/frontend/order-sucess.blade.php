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
                            <li><a class="dropdown-item" href="{{url('User/my_booking')}}">Return Trailer</a>
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
                <!-- 3 -->
                <div class="side_content content3">
                    <div class="congrats_box d-flex align-items-center justify-content-center flex-column">
                        <!-- <img src="img/congrats.png" alt="congrats"> -->
                        <img src="{{asset('assets/img/congrats.png') }}" alt="congrats">
                        <h1>Congratulations!</h1>
                        <p>You have successfully made payment
                            of <b class="text-white">{{$orderData->trailer->trailer_name ?? ''}}</b> for <b class="text-white">{{$hours['hire_hours'] ?? ''}}hrs</b> . We have sent
                            further details to your email <b class="text-white">{{$orderData->user->email ?? ''}}</b>.
                            Please check your email</p>
                    </div>
                     <div class="buttons mt-5 d-flex align-items-start justify-content-between">
                        <div class="progress_bar text-center mt-2">
                            <div class="progress" style="width: 90px;height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span for="#">3/3</span>
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
    <!-- load jquery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>