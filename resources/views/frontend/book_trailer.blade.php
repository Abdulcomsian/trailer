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

<body>

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
                    <a href="#" class="mx-2 me-3 btn btn_yellow">Contact</a>
                    <!-- <a href="#"><img src="img/user.png" alt="user"></a> -->
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- <img src="img/user.png" alt="user"> -->
                            <img src="{{asset('assets/img/user.png') }}" alt="user">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Profile</a>
                                <hr class="mx-1 my-0">
                            </li>
                            <li><a class="dropdown-item" href="#">Return Trailer</a>
                                <hr class="mx-1 my-0">
                            </li>
                            <li><a class="dropdown-item" href="#">Logout</a>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <main class="inquiry_main">
        <div class="row mx-0">
            <div class="col-lg-5">
                <div class="side_content">
                    <h2 class="head">Book your trailer</h2>
                    <div class="specifi">
                        <div class="row">
                            <div class="col-lg-6">
                                <p>Type: <span>2T</span></p>
                            </div>
                            <div class="col-lg-6">
                                <p>Hire Period: <span>24hrs (1 Day)</span></p>
                            </div>
                            <div class="col-lg-6">
                                <p>Pickup Time: <span>7am </span></p>
                            </div>
                            <div class="col-lg-6">
                                <p>Dropoff Time: <span>7am</span></p>
                            </div>
                        </div>
                    </div>
                    <p class="s_des mt-2">Note: The trailer address will be shared with you via email after booking
                        your trailer for rent.</p>
                    <form>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"> 
                                <!-- <img src="img/label_icon1.png" alt="label"> -->
                                <img src="{{asset('assets/img/label_icon1.png') }}" alt="label">
                                     Driver’s Licence</label>
                            <input type="file" class="form_control py-1" id="exampleFormControlInput1"
                                placeholder="Upload Photo">
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
                    </form>
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
                            <a href="#" class="btn btn_yellow ms-2">CONTINUE</a>
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
</body>

</html>