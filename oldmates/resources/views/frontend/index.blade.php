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

      <!-- Link Swiper's CSS -->
      <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />

    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/media.css') }}">
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/img/logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                menu
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Home           About           Trailer          Pricing           Contact -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link mx-3 active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#">Trailer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#">Contact</a>
                    </li>
                </ul>
                <form class="d-flex align-items-center centerMobile">
                    <a href="#" class="btn btn-text">Login</a>
                    <a href="#" class="me-3 btn btn_yellow">Register</a>
                    <a href="#"><img src="{{asset('assets/img/setting.png') }}" alt="setting"></a>
                </form>
            </div>
        </div>
    </nav>

    <div class="hero_div">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- <img src="{{asset('assets/img/hero_Car.png') }}" class="w-100" alt="hero_Car"> -->
                      <!-- Swiper -->
                    <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{asset('assets/img/hero_Car.png') }}" class="w-100" alt="hero_Car">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('assets/img/hero_Car.png') }}" class="w-100" alt="hero_Car">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-lg-6 mt-5">
                    <div class="text">
                        <h1 class="hero_heading">
                            HIRE TRAILER FOR <span class="text_yellow">RENT!</span>
                        </h1>
                        <p class="hero_text text-white">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                        <form class="header_form mt-5">
                            <div class="input mb-5 position-relative">
                                <!-- <input type="text" class="d-block w-100" placeholder="Type of trailer"> -->
                                <select name="trailer" id="select" class="form_control w-100">
                                    <option value="1">Type of trailer</option>
                                    <option value="1">Trailer 1</option>
                                    <option value="1">Trailer 2</option>
                                </select>
                                <!-- <span class="icon">
                                    <img src="{{asset('assets/img/drop_arrow.png') }}" alt="drop_arrow">
                                </span> -->
                            </div>
                            <div class="input mb-5 position-relative">
                                <input type="text" class="d-block form_control w-100" id="datePut" placeholder="Hire Period">
                                <span class="icon">
                                    <!-- <img src="img/calendar-outline.png" alt="calendar-outline"> -->
                                    <!-- <img src="{{asset('assets/img/calendar-outline.png') }}" alt="calendar-outline"> -->
                                    <input type="date" name="datepicker" id="datePicker" class="datePicker" placeholder="test">
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="input mb-5 position-relative">
                                        <input type="text" class="d-block form_control w-100" id="picktimeinput" placeholder="Pickup time">
                                        <span class="icon">
                                            <input type="time" name="datepicker" id="picktime" class="datePicker" placeholder="test">
                                         </span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                <div class="input mb-5 position-relative">
                                        <select name="trailer" id="select" class="form_control w-100">
                                        <option value="1">AM</option>
                                        <option value="1">PM</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="input mb-5 position-relative">
                                        <input type="text" class="d-block form_control w-100" id="droptimeInput" placeholder="Dropoff time">
                                        <span class="icon">
                                            <input type="time" name="datepicker" id="droptime" class="datePicker" placeholder="test">
                                         </span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input mb-5 position-relative">
                                        <select name="trailer" id="select" class="form_control w-100">
                                        <option value="1">AM</option>
                                        <option value="1">PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="mx-2 me-3 btn btn_yellow">Search</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section_2">
        <div class="container">
            <div class="text text-center mx-auto">
                <h2 class="section_title">Things you need <span class="text_yellow">to do</span></h2>
                <p class="section_para mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis a
                    interdum
                    lacus.</p>
            </div>
            <div class="row px-lg-4 mt-5">
                <div class="col-lg-4">
                    <div class="box">
                        <!-- <img src="img/boximg1.png" alt="box"> -->
                        <img src="{{asset('assets/img/boximg1.png') }}" alt="box">
                        <h4 class="box_head">Choose Trailer</h4>
                        <p class="box_p">Lorem ipsum dolor sit amet, consec adipiscing.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box">
                        <!-- <img src="img/boximg2.png" alt="box"> -->
                        <img src="{{asset('assets/img/boximg2.png') }}" alt="box">
                        <h4 class="box_head">Make Payment</h4>
                        <p class="box_p">Lorem ipsum dolor sit amet, consec adipiscing.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box">
                        <!-- <img src="img/boximg3.png" alt="box"> -->
                        <img src="{{asset('assets/img/boximg3.png') }}" alt="box">
                        <h4 class="box_head">Pick Trailer</h4>
                        <p class="box_p">Lorem ipsum dolor sit amet, consec adipiscing.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section_3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text mb-5">
                        <h2 class="section_title">Features of <span class="text_yellow">2T</span></h2>
                        <p class="section_para text-start mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Mauris
                            quis a
                            interdum
                            lacus.</p>

                        <p class="list mb-3">
                            <!-- <img src="img/dot.png" alt="dot"> -->
                            <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                        <span class="ms-3">Lorem ipsum dolor sit
                                amet</span></p>
                        <p class="list mb-3">
                            <!-- <img src="img/dot.png" alt="dot"> -->
                            <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                            <span class="ms-3">Lorem ipsum dolor sit
                                amet</span></p>
                        <p class="list mb-3">
                            <!-- <img src="img/dot.png" alt="dot"> -->
                            <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                            <span class="ms-3">Lorem ipsum dolor sit
                                amet</span></p>
                        <p class="list mb-3">
                            <!-- <img src="img/dot.png" alt="dot"> -->
                            <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                            <span class="ms-3">Lorem ipsum dolor sit
                                amet</span></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- <img src="img/section3Img.png" class="img-fluid" alt="img"> -->
                    <img src="{{asset('assets/img/section3Img.png') }}" class="img-fluid" alt="img">
                </div>
            </div>
        </div>
    </div>

    <div class="section_5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="box text-center">
                        <h3>22+</h3>
                        <p>Equipments</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 borderLeft">
                    <div class="box text-center">
                        <h3>4000+</h3>
                        <p>happy Clients</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 borderLeft">
                    <div class="box text-center">
                        <h3>5 Years</h3>
                        <p>Service</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 borderLeft">
                    <div class="box text-center">
                        <h3>8000+</h3>
                        <p> Total users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section_6">
        <div class="top_head">
            <h2 class="section_title text-white text-center">Pricing for <span class="text_yellow">trailers</span></h2>
        </div>
        <div class="price_table">
            <div class="price_table_head">Price table</div>
            <div class="table_box">
                <div class="row mx-0 borderBottom">
                    <div class="col-lg-6 bg-white">
                        <div class="headbox">2T Trailer</div>
                    </div>
                    <div class="col-lg-6 mobileHide bg-white borderColLeft">
                        <div class="headbox">2.8T Trailer</div>
                    </div>
                </div>
                <div class="row mx-0">
                    <div class="col-lg-6 px-0">
                        <div class="priceBox d-flex justify-content-between align-items-center">
                            <p class="m-0"><b>Hours</b></p>
                            <p class="m-0"><b>Price</b></p>
                        </div>
                        <div class="priceBody">
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-lg-none bg-white borderColLeft">
                        <div class="headbox">2.8T Trailer</div>
                    </div>
                    <div class="col-lg-6 px-0">
                        <div class="priceBox d-flex justify-content-between align-items-center">
                            <p class="m-0"><b>Hours</b></p>
                            <p class="m-0"><b>Price</b></p>
                        </div>
                        <div class="priceBody">
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                            <div class="priceBox d-flex justify-content-between align-items-center">
                                <p class="m-0">3 - 6 hrs</p>
                                <p class="m-0">$60</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section_7">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text">
                        <h2 class="section_title">What people say <br>
                            <span class="text_yellow">about Us.</span>
                        </h2>
                        <p class="section_para text-start">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Mauris
                            quis a
                            interdum
                            lacus.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img">
                        <!-- <img src="img/client_feedback.png" class="w-100" alt="client_feedback"> -->
                        <img src="{{asset('assets/img/client_feedback.png') }}" class="w-100" alt="client_feedback">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="box d-flex align-items-center flex-column">
                        <div class="logo">
                            <!-- <img src="img/logo.png" alt="logo"> -->
                            <img src="{{asset('assets/img/logo.png') }}" alt="logo">
                        </div>
                        <div class="social mt-4">
                            <a href="#" class="mx-1">
                                <!-- <img src="img/instagram.png" alt="instagram"> -->
                                <img src="{{asset('assets/img/instagram.png') }}" alt="instagram">
                            </a>
                            <a href="#" class="mx-1">
                                <!-- <img src="img/instagram.png" alt="instagram"> -->
                                <img src="{{asset('assets/img/instagram.png') }}" alt="instagram">
                            </a>
                            <a href="#" class="mx-1">
                                <!-- <img src="img/instagram.png" alt="instagram"> -->
                                <img src="{{asset('assets/img/instagram.png') }}" alt="instagram">
                            </a>
                            <a href="#" class="mx-1">
                                <!-- <img src="img/instagram.png" alt="instagram"> -->
                                <img src="{{asset('assets/img/instagram.png') }}" alt="instagram">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box d-flex align-items-lg-end align-items-center justify-content-lg-center flex-column pe-lg-5">
                        <h3 class="footer_title">Company</h3>
                        <div class="links">
                            <a href="#" class="link d-block">About us</a>
                            <a href="#" class="link d-block">Blog</a>
                            <a href="#" class="link d-block">Contact us</a>
                            <a href="#" class="link d-block">Pricing</a>
                            <a href="#" class="link d-block">Testimonials</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box d-flex align-items-center flex-column">
                        <div>
                            <h3 class="footer_title me-lg-5">Support</h3>
                        </div>
                        <div class="links">
                            <a href="#" class="link d-block">Help center</a>
                            <a href="#" class="link d-block">Terms of service</a>
                            <a href="#" class="link d-block">Legal</a>
                            <a href="#" class="link d-block">Privacy policy</a>
                            <a href="#" class="link d-block">Status</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box flexmobile pe-lg-5 me-lg-5">
                        <h3 class="footer_title">Stay up to date</h3>
                        <div class="input position-relative">
                            <input type="email" placeholder="Your email address">
                            <span class="icon">
                                <!-- <img src="img/send.png" alt="send"> -->
                                <img src="{{asset('assets/img/send.png') }}" alt="send">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="copyright mb-0">Copyright © 2022 oldmatestrailer. All rights reserved</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        direction: "vertical",
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
    </script>

    <!-- load jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $('#datePicker').on('change', function () {
            $('#datePut').val(this.value);
        });

        $('#droptime').on('change', function () {
            $('#droptimeInput').val(this.value);
        });

        $('#picktime').on('change', function () {
            $('#picktimeinput').val(this.value);
        });
    </script>
</body>

</html>