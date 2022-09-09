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
                    Legal <span class="text_yellow">Service</span> 
                </h1>
            </div>
        </div>
    </div>

    <div class="term_service_text py-5">
        <div class="container">
            <h2 class="section_title">
                Legal Service
            </h2>
            <p class="section_para w-100 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro veritatis, eligendi dicta esse dolorem magnam modi. Eos nobis illo placeat, doloremque est perferendis fugit libero provident alias magnam, officiis facilis.</p>
            <p class="section_para w-100 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro veritatis, eligendi dicta esse dolorem magnam modi. Eos nobis illo placeat, doloremque est perferendis fugit libero provident alias magnam, officiis facilis.</p>
            <p class="list mb-3 mt-4">
                <img src="http://127.0.0.1:8000/assets/img/dot.png" alt="dot">
                <span class="ms-3">Lorem ipsum dolor sit amet</span>
            </p>
            <p class="list mb-3 mt-4">
                <img src="http://127.0.0.1:8000/assets/img/dot.png" alt="dot">
                <span class="ms-3">Lorem ipsum dolor sit amet</span>
            </p>
            <p class="list mb-3 mt-4">
                <img src="http://127.0.0.1:8000/assets/img/dot.png" alt="dot">
                <span class="ms-3">Lorem ipsum dolor sit amet</span>
            </p>
            <p class="list mb-3 mt-4">
                <img src="http://127.0.0.1:8000/assets/img/dot.png" alt="dot">
                <span class="ms-3">Lorem ipsum dolor sit amet</span>
            </p>
            <p class="section_para w-100 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro veritatis, eligendi dicta esse dolorem magnam modi. Eos nobis illo placeat, doloremque est perferendis fugit libero provident alias magnam, officiis facilis.</p>
            <p class="section_para w-100 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro veritatis, eligendi dicta esse dolorem magnam modi. Eos nobis illo placeat, doloremque est perferendis fugit libero provident alias magnam, officiis facilis.</p>
            <p class="section_para w-100 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro veritatis, eligendi dicta esse dolorem magnam modi. Eos nobis illo placeat, doloremque est perferendis fugit libero provident alias magnam, officiis facilis.</p>
            <p class="section_para w-100 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro veritatis, eligendi dicta esse dolorem magnam modi. Eos nobis illo placeat, doloremque est perferendis fugit libero provident alias magnam, officiis facilis.</p>

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
                                <img src="{{asset('assets/img/instagram.png') }}" alt="instagram">
                            </a>
                            <a href="#" class="mx-1">
                                <img src="{{asset('assets/img/Social2.png') }}" alt="instagram">
                            </a>
                            <a href="#" class="mx-1">
                                <img src="{{asset('assets/img/Social3.png') }}" alt="instagram">
                            </a>
                            <a href="#" class="mx-1">
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