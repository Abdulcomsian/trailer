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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

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
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Launch demo modal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-text">Login</a>
                    <a href="#" class="me-3 btn btn_yellow">Register</a>
                    <a href="#"><img src="{{asset('assets/img/setting.png') }}" alt="setting"></a>
                </form>
            </div>
        </div>
    </nav>

    <div class="hero_div about_us">
        <div class="container">
            <div class="about_hero">
                <h1 class="hero_heading">
                    About <span class="text_yellow">Us</span>
                </h1>
            </div>
        </div>
    </div>


    <div class="about_section_2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about_text text-start">
                        <h2 class="section_title">About Us</h2>
                        <p class="section_para text-start">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea
                            repellendus, ad sed dicta corporis ducimus voluptatum assumenda asperiores dolorum
                            accusantium doloribus. Suscipit laudantium dolor a. Ullam, ducimus. Blanditiis, eveniet
                            reprehenderit?</p>
                        <p class="section_para text-start">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea
                            repellendus, ad sed dicta corporis ducimus voluptatum assumenda asperiores dolorum
                            accusantium doloribus. Suscipit laudantium dolor a. Ullam, ducimus. Blanditiis, eveniet
                            reprehenderit?</p>
                        <p class="list mb-3 mt-4">
                            <!-- <img src="http://127.0.0.1:8000/assets/img/dot.png" alt="dot"> -->
                            <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                            <span class="ms-3">Lorem ipsum dolor sit
                                amet</span>
                        </p>
                        <p class="list mb-3">
                            <!-- <img src="http://127.0.0.1:8000/assets/img/dot.png" alt="dot"> -->
                            <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                            <span class="ms-3">Lorem ipsum dolor sit
                                amet</span>
                        </p>
                        <p class="list mb-3">
                            <!-- <img src="http://127.0.0.1:8000/assets/img/dot.png" alt="dot"> -->
                            <img src="{{asset('assets/img/dot.png') }}" alt="dot">
                            <span class="ms-3">Lorem ipsum dolor sit
                                amet</span>
                        </p>
                        <a href="#" class="btn btn_yellow mt-3">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_img">
                        <img src="{{asset('assets/img/car_main.png') }}" class="w-100" alt="about_img">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section_5 counters">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="box text-center">
                        <h3><span class="counter purecounter" data-purecounter-start="0" data-purecounter-end="22"
                                data-purecounter-duration="2" data-purecounter-once="true">22</span>+</h3>
                        <p>Equipments</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 borderLeft">
                    <div class="box text-center">
                        <h3><span class="counter purecounter" data-purecounter-start="0" data-purecounter-end="4000"
                                data-purecounter-duration="2" data-purecounter-once="true">4000</span>+</h3>
                        <p>happy Clients</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 borderLeft">
                    <div class="box text-center">
                        <h3><span class="counter purecounter" data-purecounter-start="0" data-purecounter-end="5"
                                data-purecounter-duration="2" data-purecounter-once="true">5</span> Years</h3>
                        <p>Service</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 borderLeft">
                    <div class="box text-center">
                        <h3><span class="counter purecounter" data-purecounter-start="0" data-purecounter-end="8000"
                                data-purecounter-duration="2" data-purecounter-once="true">8000</span>+</h3>
                        <p> Total users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our_blog d-none">
        <div class="container">
            <h2 class="section_title my-b text-center">Our <span class="text_yellow">Blog</span></h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog_box shadow p-4 rounded bg-white mt-5">
                        <div class="blog_img">
                            <img src="{{asset('assets/img/car_main.png') }}" class="w-100" alt="blog_img">
                        </div>
                        <div class="blog_text">
                            <h3 class="blog_heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. </h3>
                            <p class="blog_para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea
                                repellendus, ad sed dicta corporis ducimus voluptatum assumenda asperiores dolorum
                                accusantium doloribus. Suscipit laudantium dolor a. Ullam, ducimus. Blanditiis, eveniet
                                reprehenderit?</p>
                            <a href="#" class="btn btn_yellow mt-3">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_box shadow p-4 rounded bg-white mt-5">
                        <div class="blog_img">
                            <img src="{{asset('assets/img/car_main.png') }}" class="w-100" alt="blog_img">
                        </div>
                        <div class="blog_text">
                            <h3 class="blog_heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. </h3>
                            <p class="blog_para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea
                                repellendus, ad sed dicta corporis ducimus voluptatum assumenda asperiores dolorum
                                accusantium doloribus. Suscipit laudantium dolor a. Ullam, ducimus. Blanditiis, eveniet
                                reprehenderit?</p>
                            <a href="#" class="btn btn_yellow mt-3">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_box shadow p-4 rounded bg-white mt-5">
                        <div class="blog_img">
                            <img src="{{asset('assets/img/car_main.png') }}" class="w-100" alt="blog_img">
                        </div>
                        <div class="blog_text">
                            <h3 class="blog_heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. </h3>
                            <p class="blog_para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea
                                repellendus, ad sed dicta corporis ducimus voluptatum assumenda asperiores dolorum
                                accusantium doloribus. Suscipit laudantium dolor a. Ullam, ducimus. Blanditiis, eveniet
                                reprehenderit?</p>
                            <a href="#" class="btn btn_yellow mt-3">Read More</a>
                        </div>
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
                                <img src="{{asset('assets/img/Social2.png') }}" alt="instagram">
                            </a>
                            <a href="#" class="mx-1">
                                <!-- <img src="img/instagram.png" alt="instagram"> -->
                                <img src="{{asset('assets/img/Social3.png') }}" alt="instagram">
                            </a>
                            <a href="#" class="mx-1">
                                <!-- <img src="img/instagram.png" alt="instagram"> -->
                                <img src="{{asset('assets/img/Social4.png') }}" alt="instagram">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div
                        class="box d-flex align-items-lg-end align-items-center justify-content-lg-center flex-column pe-lg-5">
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

    <script src="{{asset('assets/js/purecounter.js') }}"></script>
</body>

</html>